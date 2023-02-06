<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\RecommendationCategory\StoreRecommendationCategoryRequest;
use App\Http\Requests\RecommendationCategory\UpdateRecommendationCategoryRequest;
use App\Actions\RecommendationCategory\DeleteRecommendationCategoryAction;
use App\Actions\RecommendationCategory\IndexRecommendationCategoryAction;
use App\Actions\RecommendationCategory\ShowRecommendationCategoryAction;
use App\Actions\RecommendationCategory\StoreRecommendationCategoryAction;
use App\Actions\RecommendationCategory\UpdateRecommendationCategoryAction;

class RecommendationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Actions\RecommendationCategory\IndexRecommendationCategoryAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRecommendationCategoryAction $action): JsonResponse
    {
        return ($action)();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\RecommendationCategory\StoreRecommendationCategoryRequest $request
     * @param \App\Actions\RecommendationCategory\StoreRecommendationCategoryAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRecommendationCategoryRequest $request, StoreRecommendationCategoryAction $action): JsonResponse
    {
        return ($action)($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param \App\Actions\RecommendationCategory\ShowRecommendationCategoryAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id, ShowRecommendationCategoryAction $action): JsonResponse
    {
        return ($action)($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\RecommendationCategory\UpdateRecommendationCategoryRequest $request
     * @param int $id
     * @param \App\Actions\RecommendationCategory\UpdateRecommendationCategoryAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRecommendationCategoryRequest $request, int $id, UpdateRecommendationCategoryAction $action): JsonResponse
    {
        return ($action)($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param \App\Actions\RecommendationCategory\DeleteRecommendationCategoryAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id, DeleteRecommendationCategoryAction $action): JsonResponse
    {
        return ($action)($id);
    }
}
