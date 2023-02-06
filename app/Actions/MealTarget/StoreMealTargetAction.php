<?php

namespace App\Actions\MealTarget;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\MealTargetTransformer;
use App\Contracts\MealTargetRepository;

class StoreMealTargetAction
{
    use HasTransformer;

    private MealTargetRepository $mealTargetRepository;

    public function __construct(MealTargetRepository $repository)
    {
        $this->mealTargetRepository = $repository;
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data): JsonResponse
    {
        return DB::transaction(function () use ($data) {
            $mealTarget = $this->mealTargetRepository->create($data);

            return $this->httpOK($mealTarget, MealTargetTransformer::class);
        });
    }
}
