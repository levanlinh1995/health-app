<?php

namespace App\Repositories;

use App\Contracts\DiaryRecordRepository;
use App\Models\DiaryRecord;
use Illuminate\Container\Container as Application;
use Spatie\QueryBuilder\AllowedFilter;

class EloquentDiaryRecordRepository extends EloquentBaseRepository implements DiaryRecordRepository
{
    public function model(): string
    {
        return DiaryRecord::class;
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
        ]);
    }
}
