<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\MealTarget\StoreMealTargetRequest;
use App\Http\Requests\MealTarget\UpdateMealTargetRequest;
use App\Actions\MealTarget\DeleteMealTargetAction;
use App\Actions\MealTarget\IndexMealTargetAction;
use App\Actions\MealTarget\ShowMealTargetAction;
use App\Actions\MealTarget\StoreMealTargetAction;
use App\Actions\MealTarget\UpdateMealTargetAction;

class MealTargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Actions\MealTarget\IndexMealTargetAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexMealTargetAction $action): JsonResponse
    {
        return ($action)();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\MealTarget\StoreMealTargetRequest $request
     * @param \App\Actions\MealTarget\StoreMealTargetAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreMealTargetRequest $request, StoreMealTargetAction $action): JsonResponse
    {
        return ($action)($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param \App\Actions\MealTarget\ShowMealTargetAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id, ShowMealTargetAction $action): JsonResponse
    {
        return ($action)($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\MealTarget\UpdateMealTargetRequest $request
     * @param int $id
     * @param \App\Actions\MealTarget\UpdateMealTargetAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateMealTargetRequest $request, int $id, UpdateMealTargetAction $action): JsonResponse
    {
        return ($action)($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param \App\Actions\MealTarget\DeleteMealTargetAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id, DeleteMealTargetAction $action): JsonResponse
    {
        return ($action)($id);
    }
}
