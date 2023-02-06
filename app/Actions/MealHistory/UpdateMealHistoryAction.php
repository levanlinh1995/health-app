<?php

namespace App\Actions\MealHistory;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\MealHistoryTransformer;
use App\Contracts\MealHistoryRepository;

class UpdateMealHistoryAction
{
    use HasTransformer;

    private MealHistoryRepository $mealHistoryRepository;

    public function __construct(MealHistoryRepository $repository)
    {
        $this->mealHistoryRepository = $repository;
    }

    /**
     * @param array $data
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data, int $id): JsonResponse
    {
        return DB::transaction(function () use ($id, $data) {
            $mealHistory = $this->mealHistoryRepository->find($id);

            $mealHistory->update($data);
            $mealHistory->refresh();

            return $this->httpOK($mealHistory, MealHistoryTransformer::class);
        });
    }
}
