<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Meal\StoreMealRequest;
use App\Http\Requests\Meal\UpdateMealRequest;
use App\Actions\Meal\DeleteMealAction;
use App\Actions\Meal\IndexMealAction;
use App\Actions\Meal\ShowMealAction;
use App\Actions\Meal\StoreMealAction;
use App\Actions\Meal\UpdateMealAction;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Actions\Meal\IndexMealAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexMealAction $action): JsonResponse
    {
        return ($action)();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Meal\StoreMealRequest $request
     * @param \App\Actions\Meal\StoreMealAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreMealRequest $request, StoreMealAction $action): JsonResponse
    {
        return ($action)($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param \App\Actions\Meal\ShowMealAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id, ShowMealAction $action): JsonResponse
    {
        return ($action)($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Meal\UpdateMealRequest $request
     * @param int $id
     * @param \App\Actions\Meal\UpdateMealAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateMealRequest $request, int $id, UpdateMealAction $action): JsonResponse
    {
        return ($action)($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param \App\Actions\Meal\DeleteMealAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id, DeleteMealAction $action): JsonResponse
    {
        return ($action)($id);
    }
}
