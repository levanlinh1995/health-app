<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Tag\StoreTagRequest;
use App\Http\Requests\Tag\UpdateTagRequest;
use App\Actions\Tag\DeleteTagAction;
use App\Actions\Tag\IndexTagAction;
use App\Actions\Tag\ShowTagAction;
use App\Actions\Tag\StoreTagAction;
use App\Actions\Tag\UpdateTagAction;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Actions\Tag\IndexTagAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexTagAction $action): JsonResponse
    {
        return ($action)();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Tag\StoreTagRequest $request
     * @param \App\Actions\Tag\StoreTagAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTagRequest $request, StoreTagAction $action): JsonResponse
    {
        return ($action)($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param \App\Actions\Tag\ShowTagAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id, ShowTagAction $action): JsonResponse
    {
        return ($action)($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Tag\UpdateTagRequest $request
     * @param int $id
     * @param \App\Actions\Tag\UpdateTagAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateTagRequest $request, int $id, UpdateTagAction $action): JsonResponse
    {
        return ($action)($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param \App\Actions\Tag\DeleteTagAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id, DeleteTagAction $action): JsonResponse
    {
        return ($action)($id);
    }
}
