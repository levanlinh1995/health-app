<?php

namespace App\Actions\MealTarget;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\MealTargetTransformer;
use App\Contracts\MealTargetRepository;

class ShowMealTargetAction
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
        $data = $this->mealTargetRepository->find($id);

        return $this->httpOK($data, MealTargetTransformer::class);
    }
}
