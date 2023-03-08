<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\DiaryRecord\StoreDiaryRecordRequest;
use App\Http\Requests\DiaryRecord\UpdateDiaryRecordRequest;
use App\Actions\DiaryRecord\DeleteDiaryRecordAction;
use App\Actions\DiaryRecord\IndexDiaryRecordAction;
use App\Actions\DiaryRecord\ShowDiaryRecordAction;
use App\Actions\DiaryRecord\StoreDiaryRecordAction;
use App\Actions\DiaryRecord\UpdateDiaryRecordAction;


class DiaryRecordController extends Controller
{

    /**
     *
     * @OA\Put(
     *     path="/users/{id}",
     *     summary="Updates a user",
     *     @OA\Parameter(
     *         description="Parameter with mutliple examples",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *         @OA\Examples(example="uuid", value="0006faf6-7a61-426c-9034-579f2cfcfa83", summary="An UUID value."),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     *
     * Display a listing of the resource.
     *
     * @param \App\Actions\DiaryRecord\IndexDiaryRecordAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexDiaryRecordAction $action): JsonResponse
    {
        return ($action)();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\DiaryRecord\StoreDiaryRecordRequest $request
     * @param \App\Actions\DiaryRecord\StoreDiaryRecordAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreDiaryRecordRequest $request, StoreDiaryRecordAction $action): JsonResponse
    {
        return ($action)($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param \App\Actions\DiaryRecord\ShowDiaryRecordAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id, ShowDiaryRecordAction $action): JsonResponse
    {
        return ($action)($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\DiaryRecord\UpdateDiaryRecordRequest $request
     * @param int $id
     * @param \App\Actions\DiaryRecord\UpdateDiaryRecordAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateDiaryRecordRequest $request, int $id, UpdateDiaryRecordAction $action): JsonResponse
    {
        return ($action)($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param \App\Actions\DiaryRecord\DeleteDiaryRecordAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id, DeleteDiaryRecordAction $action): JsonResponse
    {
        return ($action)($id);
    }
}
