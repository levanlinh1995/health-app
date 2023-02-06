<?php

namespace App\Actions\Tag;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\TagTransformer;
use App\Contracts\TagRepository;

class StoreTagAction
{
    use HasTransformer;

    private TagRepository $tagRepository;

    public function __construct(TagRepository $repository)
    {
        $this->tagRepository = $repository;
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data): JsonResponse
    {
        return DB::transaction(function () use ($data) {
            $tag = $this->tagRepository->create($data);

            return $this->httpOK($tag, TagTransformer::class);
        });
    }
}
