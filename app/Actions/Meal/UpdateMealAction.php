<?php

namespace App\Actions\Meal;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\MealTransformer;
use App\Contracts\MealRepository;

class UpdateMealAction
{
    use HasTransformer;

    private MealRepository $mealRepository;

    public function __construct(MealRepository $repository)
    {
        $this->mealRepository = $repository;
    }

    /**
     * @param array $data
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data, int $id): JsonResponse
    {
        return DB::transaction(function () use ($id, $data) {
            $meal = $this->mealRepository->find($id);

            $meal->update($data);
            $meal->refresh();

            return $this->httpOK($meal, MealTransformer::class);
        });
    }
}
