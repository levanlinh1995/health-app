<?php

namespace App\Actions\RecommendationCategory;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\RecommendationCategoryTransformer;
use App\Contracts\RecommendationCategoryRepository;

class UpdateRecommendationCategoryAction
{
    use HasTransformer;

    private RecommendationCategoryRepository $recommendationCategoryRepository;

    public function __construct(RecommendationCategoryRepository $repository)
    {
        $this->recommendationCategoryRepository = $repository;
    }

    /**
     * @param array $data
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data, int $id): JsonResponse
    {
        return DB::transaction(function () use ($id, $data) {
            $recommendationCategory = $this->recommendationCategoryRepository->find($id);

            $recommendationCategory->update($data);
            $recommendationCategory->refresh();

            return $this->httpOK($recommendationCategory, RecommendationCategoryTransformer::class);
        });
    }
}
