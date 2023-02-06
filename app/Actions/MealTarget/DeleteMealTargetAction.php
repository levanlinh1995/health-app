<?php

namespace App\Actions\MealTarget;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\MealTargetTransformer;
use App\Contracts\MealTargetRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class DeleteMealTargetAction
{
    use HasTransformer;

    private MealTargetRepository $mealTargetRepository;

    public function __construct(MealTargetRepository $repository)
    {
        $this->mealTargetRepository = $repository;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        $mealTarget = $this->mealTargetRepository->find($id);

        if (!$mealTarget) {
            throw new BadRequestHttpException;
        }

        if ($this->mealTargetRepository->delete($id)) {
            return $this->httpNoContent();
        }
    }
}
