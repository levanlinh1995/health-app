<?php

namespace App\Repositories;

use App\Contracts\ExerciseRecordRepository;
use App\Models\ExerciseRecord;
use Illuminate\Container\Container as Application;
use Spatie\QueryBuilder\AllowedFilter;

class EloquentExerciseRecordRepository extends EloquentBaseRepository implements ExerciseRecordRepository
{
    public function model(): string
    {
        return ExerciseRecord::class;
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
