<?php

namespace App\Repositories;

use App\Contracts\TagRepository;
use App\Models\Tag;
use Illuminate\Container\Container as Application;
use Spatie\QueryBuilder\AllowedFilter;

class EloquentTagRepository extends EloquentBaseRepository implements TagRepository
{
    public function model(): string
    {
        return Tag::class;
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
