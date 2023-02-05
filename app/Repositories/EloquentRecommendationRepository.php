<?php

namespace App\Repositories;

use App\Contracts\RecommendationRepository;
use App\Models\Recommendation;
use Illuminate\Container\Container as Application;
use Spatie\QueryBuilder\AllowedFilter;

class EloquentRecommendationRepository extends EloquentBaseRepository implements RecommendationRepository
{
    public function model(): string
    {
        return Recommendation::class;
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
