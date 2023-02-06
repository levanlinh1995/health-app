<?php

namespace App\Repositories;

use App\Contracts\MealTargetRepository;
use App\Models\MealTarget;
use Illuminate\Container\Container as Application;
use Spatie\QueryBuilder\AllowedFilter;

class EloquentMealTargetRepository extends EloquentBaseRepository implements MealTargetRepository
{
    public function model(): string
    {
        return MealTarget::class;
    }

    public function __construct(Application $app)
    {
        parent::__construct($app);

        $this->allowedIncludes = [
            'user'
        ];

        $this->addExtraFilters([
            AllowedFilter::exact('id'),
            AllowedFilter::exact('user_id'),
            AllowedFilter::exact('date'),
        ]);
    }
}
