<?php

namespace App\Actions\MealHistory;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\MealHistoryTransformer;
use App\Contracts\MealHistoryRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class DeleteMealHistoryAction
{
    use HasTransformer;

    private MealHistoryRepository $mealHistoryRepository;

    public function __construct(MealHistoryRepository $repository)
    {
        $this->mealHistoryRepository = $repository;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        $mealHistory = $this->mealHistoryRepository->find($id);

        if (!$mealHistory) {
            throw new BadRequestHttpException;
        }

        if ($this->mealHistoryRepository->delete($id)) {
            return $this->httpNoContent();
        }
    }
}
