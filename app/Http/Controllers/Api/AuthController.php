<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use App\Supports\Traits\HasTransformer;
use App\Transformers\UserTransformer;

class AuthController extends Controller
{
    use HasTransformer;
    /**
     * Register
     * @param Request $request
     */
    public function register(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users,email',
                    'password' => 'required|string|min:8',
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors(),
                ], JsonResponse::HTTP_UNAUTHORIZED);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return $this->httpCreated([
                'token' => $user->createToken('auth_token')->plainTextToken,
                'token_type' => 'Bearer',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Login
     * @param Request $request
     */
    public function login(Request $request)
    {
        try {
            if (!Auth::attempt($request->only(['email', 'password']))) {
                return $this->httpUnauthorized('Invalid login details');
            }

            $user = User::where('email', $request->email)->first();

            return $this->httpOK([
                'token' => $user->createToken('auth_token')->plainTextToken,
                'token_type' => 'Bearer',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function me(Request $request)
    {
        $currentUser = $request->user();
        return $this->httpOK($currentUser, UserTransformer::class);
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        return $this->httpNoContent();
    }
}
