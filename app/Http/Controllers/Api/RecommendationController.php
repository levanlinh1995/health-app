<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Recommendation\StoreRecommendationRequest;
use App\Http\Requests\Recommendation\UpdateRecommendationRequest;
use App\Actions\Recommendation\DeleteRecommendationAction;
use App\Actions\Recommendation\IndexRecommendationAction;
use App\Actions\Recommendation\ShowRecommendationAction;
use App\Actions\Recommendation\StoreRecommendationAction;
use App\Actions\Recommendation\UpdateRecommendationAction;

class RecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Actions\Recommendation\IndexRecommendationAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRecommendationAction $action): JsonResponse
    {
        return ($action)();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Recommendation\StoreRecommendationRequest $request
     * @param \App\Actions\Recommendation\StoreRecommendationAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRecommendationRequest $request, StoreRecommendationAction $action): JsonResponse
    {
        return ($action)($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param \App\Actions\Recommendation\ShowRecommendationAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id, ShowRecommendationAction $action): JsonResponse
    {
        return ($action)($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Recommendation\UpdateRecommendationRequest $request
     * @param int $id
     * @param \App\Actions\Recommendation\UpdateRecommendationAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRecommendationRequest $request, int $id, UpdateRecommendationAction $action): JsonResponse
    {
        return ($action)($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param \App\Actions\Recommendation\DeleteRecommendationAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id, DeleteRecommendationAction $action): JsonResponse
    {
        return ($action)($id);
    }
}
