<?php

namespace App\Actions\RecommendationCategory;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\RecommendationCategoryTransformer;
use App\Contracts\RecommendationCategoryRepository;

class ShowRecommendationCategoryAction
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
        $data = $this->recommendationCategoryRepository->find($id);

        return $this->httpOK($data, RecommendationCategoryTransformer::class);
    }
}
