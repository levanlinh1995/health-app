<?php

namespace App\Actions\RecommendationCategory;


use App\Supports\Traits\HasPerPageRequest;
use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use App\Transformers\RecommendationCategoryTransformer;
use App\Contracts\RecommendationCategoryRepository;

class IndexRecommendationCategoryAction
{
    use HasTransformer, HasPerPageRequest;

    private RecommendationCategoryRepository $recommendationCategoryRepository;

    public function __construct(RecommendationCategoryRepository $repository)
    {
        $this->recommendationCategoryRepository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $data = $this->recommendationCategoryRepository->queryBuilder();

        return $this->httpOK($data->paginate($this->getPerPage()), RecommendationCategoryTransformer::class);
    }
}
