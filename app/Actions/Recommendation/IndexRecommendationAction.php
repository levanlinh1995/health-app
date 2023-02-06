<?php

namespace App\Actions\Recommendation;


use App\Supports\Traits\HasPerPageRequest;
use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use App\Transformers\RecommendationTransformer;
use App\Contracts\RecommendationRepository;

class IndexRecommendationAction
{
    use HasTransformer, HasPerPageRequest;

    private RecommendationRepository $recommendationRepository;

    public function __construct(RecommendationRepository $repository)
    {
        $this->recommendationRepository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $data = $this->recommendationRepository->queryBuilder();

        return $this->httpOK($data->paginate($this->getPerPage()), RecommendationTransformer::class);
    }
}
