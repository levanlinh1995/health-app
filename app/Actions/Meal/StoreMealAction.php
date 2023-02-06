<?php

namespace App\Actions\Meal;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\MealTransformer;
use App\Contracts\MealRepository;

class StoreMealAction
{
    use HasTransformer;

    private MealRepository $mealRepository;

    public function __construct(MealRepository $repository)
    {
        $this->mealRepository = $repository;
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data): JsonResponse
    {
        return DB::transaction(function () use ($data) {
            $meal = $this->mealRepository->create($data);

            return $this->httpOK($meal, MealTransformer::class);
        });
    }
}
