<?php

namespace App\Actions\MealHistory;


use App\Supports\Traits\HasPerPageRequest;
use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use App\Transformers\MealHistoryTransformer;
use App\Contracts\MealHistoryRepository;

class IndexMealHistoryAction
{
    use HasTransformer, HasPerPageRequest;

    private MealHistoryRepository $mealhistoryRepository;

    public function __construct(MealHistoryRepository $repository)
    {
        $this->mealhistoryRepository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $mealHistory = $this->mealhistoryRepository->queryBuilder();

        return $this->httpOK($mealHistory->paginate($this->getPerPage()), MealHistoryTransformer::class);
    }
}
