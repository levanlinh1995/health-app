<?php

namespace App\Repositories;

use App\Contracts\MealRepository;
use App\Models\Meal;
use Illuminate\Container\Container as Application;
use Spatie\QueryBuilder\AllowedFilter;

class EloquentMealRepository extends EloquentBaseRepository implements MealRepository
{
    public function model(): string
    {
        return Meal::class;
    }

    public function __construct(Application $app)
    {
        parent::__construct($app);

        $this->allowedIncludes = [
            'name'
        ];

        $this->addExtraFilters([
            AllowedFilter::exact('id'),
        ]);
    }
}
