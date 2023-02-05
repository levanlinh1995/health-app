<?php

namespace App\Repositories;

use App\Contracts\MealHistoryRepository;
use App\Models\MealHistory;
use Illuminate\Container\Container as Application;
use Spatie\QueryBuilder\AllowedFilter;

class EloquentMealHistoryRepository extends EloquentBaseRepository implements MealHistoryRepository
{
    public function model(): string
    {
        return MealHistory::class;
    }

    public function __construct(Application $app)
    {
        parent::__construct($app);
        
        $this->allowedIncludes = [
            'user',
            'meal'
        ];

        $this->addExtraFilters([
        ]);
    }
}
