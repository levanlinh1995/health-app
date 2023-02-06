<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ExerciseRecord\StoreExerciseRecordRequest;
use App\Http\Requests\ExerciseRecord\UpdateExerciseRecordRequest;
use App\Actions\ExerciseRecord\DeleteExerciseRecordAction;
use App\Actions\ExerciseRecord\IndexExerciseRecordAction;
use App\Actions\ExerciseRecord\ShowExerciseRecordAction;
use App\Actions\ExerciseRecord\StoreExerciseRecordAction;
use App\Actions\ExerciseRecord\UpdateExerciseRecordAction;

class ExerciseRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Actions\ExerciseRecord\IndexExerciseRecordAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexExerciseRecordAction $action): JsonResponse
    {
        return ($action)();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ExerciseRecord\StoreExerciseRecordRequest $request
     * @param \App\Actions\ExerciseRecord\StoreExerciseRecordAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreExerciseRecordRequest $request, StoreExerciseRecordAction $action): JsonResponse
    {
        return ($action)($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param \App\Actions\ExerciseRecord\ShowExerciseRecordAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id, ShowExerciseRecordAction $action): JsonResponse
    {
        return ($action)($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\ExerciseRecord\UpdateExerciseRecordRequest $request
     * @param int $id
     * @param \App\Actions\ExerciseRecord\UpdateExerciseRecordAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateExerciseRecordRequest $request, int $id, UpdateExerciseRecordAction $action): JsonResponse
    {
        return ($action)($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param \App\Actions\ExerciseRecord\DeleteExerciseRecordAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id, DeleteExerciseRecordAction $action): JsonResponse
    {
        return ($action)($id);
    }
}
