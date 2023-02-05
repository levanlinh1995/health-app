<?php

namespace App\Repositories;

use App\Contracts\RecommendationCategoryRepository;
use App\Models\RecommendationCategory;
use Illuminate\Container\Container as Application;
use Spatie\QueryBuilder\AllowedFilter;

class EloquentRecommendationCategoryRepository extends EloquentBaseRepository implements RecommendationCategoryRepository
{
    public function model(): string
    {
        return RecommendationCategory::class;
    }

    public function __construct(Application $app)
    {
        parent::__construct($app);
        
        $this->allowedIncludes = [
        ];

        $this->addExtraFilters([
        ]);
    }
}
