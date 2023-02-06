<?php

namespace App\Actions\Tag;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\TagTransformer;
use App\Contracts\TagRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class DeleteTagAction
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
        $tag = $this->tagRepository->find($id);

        if (!$tag) {
            throw new BadRequestHttpException;
        }

        if ($this->tagRepository->delete($id)) {
            return $this->httpNoContent();
        }
    }
}
