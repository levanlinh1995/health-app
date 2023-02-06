<?php

namespace App\Actions\Tag;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\TagTransformer;
use App\Contracts\TagRepository;

class ShowTagAction
{
    use HasTransformer;

    private TagRepository $tagRepository;

    public function __construct(TagRepository $repository)
    {
        $this->tagRepository = $repository;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        $data = $this->tagRepository->find($id);

        return $this->httpOK($data, TagTransformer::class);
    }
}
