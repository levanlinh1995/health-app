<?php

namespace App\Actions\Meal;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\MealTransformer;
use App\Contracts\MealRepository;

class ShowMealAction
{
    use HasTransformer;

    private MealRepository $mealRepository;

    public function __construct(MealRepository $repository)
    {
        $this->mealRepository = $repository;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        $data = $this->mealRepository->find($id);

        return $this->httpOK($data, MealTransformer::class);
    }
}
