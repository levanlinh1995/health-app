<?php

namespace App\Actions\RecommendationCategory;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\RecommendationCategoryTransformer;
use App\Contracts\RecommendationCategoryRepository;

class StoreRecommendationCategoryAction
{
    use HasTransformer;

    private RecommendationCategoryRepository $recommendationCategoryRepository;

    public function __construct(RecommendationCategoryRepository $repository)
    {
        $this->recommendationCategoryRepository = $repository;
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data): JsonResponse
    {
        return DB::transaction(function () use ($data) {
            $recommendationCategory = $this->recommendationCategoryRepository->create($data);

            return $this->httpOK($recommendationCategory, RecommendationCategoryTransformer::class);
        });
    }
}
