<?php

namespace App\Actions\Tag;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\TagTransformer;
use App\Contracts\TagRepository;

class UpdateTagAction
{
    use HasTransformer;

    private TagRepository $tagRepository;

    public function __construct(TagRepository $repository)
    {
        $this->tagRepository = $repository;
    }

    /**
     * @param array $data
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data, int $id): JsonResponse
    {
        return DB::transaction(function () use ($id, $data) {
            $tag = $this->tagRepository->find($id);

            $tag->update($data);
            $tag->refresh();

            return $this->httpOK($tag, TagTransformer::class);
        });
    }
}
