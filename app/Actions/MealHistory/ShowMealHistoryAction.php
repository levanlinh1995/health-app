<?php

namespace App\Actions\MealHistory;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\MealHistoryTransformer;
use App\Contracts\MealHistoryRepository;

class ShowMealHistoryAction
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

        return $this->httpOK($mealHistory, MealHistoryTransformer::class);
    }
}
