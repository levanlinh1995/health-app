<?php

namespace App\Actions\Recommendation;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\RecommendationTransformer;
use App\Contracts\RecommendationRepository;

class UpdateRecommendationAction
{
    use HasTransformer;

    private RecommendationRepository $recommendationRepository;

    public function __construct(RecommendationRepository $repository)
    {
        $this->recommendationRepository = $repository;
    }

    /**
     * @param array $data
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data, int $id): JsonResponse
    {
        return DB::transaction(function () use ($id, $data) {
            $recommendation = $this->recommendationRepository->find($id);

            $recommendation->update($data);
            $recommendation->refresh();

            return $this->httpOK($recommendation, RecommendationTransformer::class);
        });
    }
}
