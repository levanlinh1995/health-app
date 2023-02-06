<?php

namespace App\Actions\Tag;


use App\Supports\Traits\HasPerPageRequest;
use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use App\Transformers\TagTransformer;
use App\Contracts\TagRepository;

class IndexTagAction
{
    use HasTransformer, HasPerPageRequest;

    private TagRepository $tagRepository;

    public function __construct(TagRepository $repository)
    {
        $this->tagRepository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $data = $this->tagRepository->queryBuilder();

        return $this->httpOK($data->paginate($this->getPerPage()), TagTransformer::class);
    }
}
