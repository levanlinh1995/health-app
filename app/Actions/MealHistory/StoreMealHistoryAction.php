<?php

namespace App\Actions\MealHistory;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\MealHistoryTransformer;
use App\Contracts\MealHistoryRepository;

class StoreMealHistoryAction
{
    use HasTransformer;

    private MealHistoryRepository $mealHistoryRepository;

    public function __construct(MealHistoryRepository $repository)
    {
        $this->mealHistoryRepository = $repository;
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data): JsonResponse
    {
        return DB::transaction(function () use ($data) {
            $mealHistory = $this->mealHistoryRepository->create($data);

            return $this->httpOK($mealHistory, MealHistoryTransformer::class);
        });
    }
}
