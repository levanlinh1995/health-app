<?php

namespace App\Actions\Meal;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\MealTransformer;
use App\Contracts\MealRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class DeleteMealAction
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
        $meal = $this->mealRepository->find($id);

        if (!$meal) {
            throw new BadRequestHttpException;
        }

        if ($this->mealRepository->delete($id)) {
            return $this->httpNoContent();
        }
    }
}
