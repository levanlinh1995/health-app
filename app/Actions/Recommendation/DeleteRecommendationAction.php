<?php

namespace App\Actions\Recommendation;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\RecommendationTransformer;
use App\Contracts\RecommendationRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class DeleteRecommendationAction
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
        $recommendation = $this->recommendationRepository->find($id);

        if (!$recommendation) {
            throw new BadRequestHttpException;
        }

        if ($this->recommendationRepository->delete($id)) {
            return $this->httpNoContent();
        }
    }
}
