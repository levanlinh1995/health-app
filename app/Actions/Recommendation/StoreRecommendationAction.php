<?php

namespace App\Actions\Recommendation;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\RecommendationTransformer;
use App\Contracts\RecommendationRepository;

class StoreRecommendationAction
{
    use HasTransformer;

    private RecommendationRepository $recommendationRepository;

    public function __construct(RecommendationRepository $repository)
    {
        $this->recommendationRepository = $repository;
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data): JsonResponse
    {
        return DB::transaction(function () use ($data) {
            $recommendation = $this->recommendationRepository->create($data);

            return $this->httpOK($recommendation, RecommendationTransformer::class);
        });
    }
}
