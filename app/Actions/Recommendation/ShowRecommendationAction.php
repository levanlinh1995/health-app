<?php

namespace App\Actions\Recommendation;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\RecommendationTransformer;
use App\Contracts\RecommendationRepository;

class ShowRecommendationAction
{
    use HasTransformer;

    private RecommendationRepository $recommendationRepository;

    public function __construct(RecommendationRepository $repository)
    {
        $this->recommendationRepository = $repository;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        $data = $this->recommendationRepository->find($id);

        return $this->httpOK($data, RecommendationTransformer::class);
    }
}
