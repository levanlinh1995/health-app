<?php

namespace App\Actions\MealTarget;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\MealTargetTransformer;
use App\Contracts\MealTargetRepository;

class UpdateMealTargetAction
{
    use HasTransformer;

    private MealTargetRepository $mealTargetRepository;

    public function __construct(MealTargetRepository $repository)
    {
        $this->mealTargetRepository = $repository;
    }

    /**
     * @param array $data
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data, int $id): JsonResponse
    {
        return DB::transaction(function () use ($id, $data) {
            $mealTarget = $this->mealTargetRepository->find($id);

            $mealTarget->update($data);
            $mealTarget->refresh();

            return $this->httpOK($mealTarget, MealTargetTransformer::class);
        });
    }
}
