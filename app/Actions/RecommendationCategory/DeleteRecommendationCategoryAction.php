<?php

namespace App\Actions\RecommendationCategory;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Contracts\RecommendationCategoryRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class DeleteRecommendationCategoryAction
{
    use HasTransformer;

    private RecommendationCategoryRepository $recommendationCategoryRepository;

    public function __construct(RecommendationCategoryRepository $repository)
    {
        $this->recommendationCategoryRepository = $repository;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        $recommendationCategory = $this->recommendationCategoryRepository->find($id);

        if (!$recommendationCategory) {
            throw new BadRequestHttpException;
        }

        if ($this->recommendationCategoryRepository->delete($id)) {
            return $this->httpNoContent();
        }
    }
}
