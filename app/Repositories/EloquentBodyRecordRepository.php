<?php

namespace App\Repositories;

use App\Contracts\BodyRecordRepository;
use App\Models\BodyRecord;
use Illuminate\Container\Container as Application;
use Spatie\QueryBuilder\AllowedFilter;

class EloquentBodyRecordRepository extends EloquentBaseRepository implements BodyRecordRepository
{
    public function model(): string
    {
        return BodyRecord::class;
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
