<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\BodyRecord\StoreBodyRecordRequest;
use App\Http\Requests\BodyRecord\UpdateBodyRecordRequest;
use App\Actions\BodyRecord\DeleteBodyRecordAction;
use App\Actions\BodyRecord\IndexBodyRecordAction;
use App\Actions\BodyRecord\ShowBodyRecordAction;
use App\Actions\BodyRecord\StoreBodyRecordAction;
use App\Actions\BodyRecord\UpdateBodyRecordAction;

class BodyRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Actions\BodyRecord\IndexBodyRecordAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexBodyRecordAction $action): JsonResponse
    {
        return ($action)();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\BodyRecord\StoreBodyRecordRequest $request
     * @param \App\Actions\BodyRecord\StoreBodyRecordAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreBodyRecordRequest $request, StoreBodyRecordAction $action): JsonResponse
    {
        return ($action)($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param \App\Actions\BodyRecord\ShowBodyRecordAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id, ShowBodyRecordAction $action): JsonResponse
    {
        return ($action)($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\BodyRecord\UpdateBodyRecordRequest $request
     * @param int $id
     * @param \App\Actions\BodyRecord\UpdateBodyRecordAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateBodyRecordRequest $request, int $id, UpdateBodyRecordAction $action): JsonResponse
    {
        return ($action)($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param \App\Actions\BodyRecord\DeleteBodyRecordAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id, DeleteBodyRecordAction $action): JsonResponse
    {
        return ($action)($id);
    }
}
