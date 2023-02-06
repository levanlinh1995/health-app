<?php

namespace App\Actions\MealTarget;


use App\Supports\Traits\HasPerPageRequest;
use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use App\Transformers\MealTargetTransformer;
use App\Contracts\MealTargetRepository;

class IndexMealTargetAction
{
    use HasTransformer, HasPerPageRequest;

    private MealTargetRepository $mealTargetRepository;

    public function __construct(MealTargetRepository $repository)
    {
        $this->mealTargetRepository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $data = $this->mealTargetRepository->queryBuilder();

        return $this->httpOK($data->paginate($this->getPerPage()), MealTargetTransformer::class);
    }
}
