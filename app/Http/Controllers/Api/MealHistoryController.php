<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\MealHistory\StoreMealHistoryRequest;
use App\Http\Requests\MealHistory\UpdateMealHistoryRequest;
use App\Actions\MealHistory\DeleteMealHistoryAction;
use App\Actions\MealHistory\IndexMealHistoryAction;
use App\Actions\MealHistory\ShowMealHistoryAction;
use App\Actions\MealHistory\StoreMealHistoryAction;
use App\Actions\MealHistory\UpdateMealHistoryAction;

class MealHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Actions\MealHistory\IndexMealHistoryAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexMealHistoryAction $action): JsonResponse
    {
        return ($action)();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\MealHistory\StoreMealHistoryRequest $request
     * @param \App\Actions\MealHistory\StoreMealHistoryAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreMealHistoryRequest $request, StoreMealHistoryAction $action): JsonResponse
    {
        return ($action)($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param \App\Actions\MealHistory\ShowMealHistoryAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id, ShowMealHistoryAction $action): JsonResponse
    {
        return ($action)($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\MealHistory\UpdateMealHistoryRequest $request
     * @param int $id
     * @param \App\Actions\MealHistory\UpdateMealHistoryAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateMealHistoryRequest $request, int $id, UpdateMealHistoryAction $action): JsonResponse
    {
        return ($action)($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param \App\Actions\MealHistory\DeleteMealHistoryAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id, DeleteMealHistoryAction $action): JsonResponse
    {
        return ($action)($id);
    }
}
