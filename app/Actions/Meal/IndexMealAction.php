<?php

namespace App\Actions\Meal;


use App\Supports\Traits\HasPerPageRequest;
use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use App\Transformers\MealTransformer;
use App\Contracts\MealRepository;

class IndexMealAction
{
    use HasTransformer, HasPerPageRequest;

    private MealRepository $mealRepository;

    public function __construct(MealRepository $repository)
    {
        $this->mealRepository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $data = $this->mealRepository->queryBuilder();

        return $this->httpOK($data->paginate($this->getPerPage()), MealTransformer::class);
    }
}
