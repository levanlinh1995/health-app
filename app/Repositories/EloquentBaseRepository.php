<?php

namespace App\Repositories;

use App\Contracts\BaseRepository;
use Spatie\QueryBuilder\QueryBuilder;

abstract class EloquentBaseRepository extends \Prettus\Repository\Eloquent\BaseRepository implements BaseRepository
{
    protected string $defaultSort = '-created_at';

    protected array $allowedFilters = [];

    protected array $defaultSelect = ['*'];

    protected array $allowedSorts = [];

    protected array $allowedIncludes = [];

    protected array $allowedFields = ['*'];

    protected function addExtraFilters($filter)
    {
        $this->allowedFilters = array_merge($this->allowedFilters, $filter);
    }

    public function queryBuilder(): self
    {
        $model = parent::makeModel();
        $this->model = QueryBuilder::for($model)
                                   ->select($this->defaultSelect)
                                   ->allowedFilters($this->allowedFilters)
                                   ->allowedFields($this->allowedFields)
                                   ->allowedIncludes($this->allowedIncludes)
                                   ->allowedSorts($this->allowedSorts)
                                   ->defaultSort($this->defaultSort);

        return $this;
    }
}
