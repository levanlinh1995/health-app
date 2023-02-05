<?php

namespace App\Transformers;

use App\Models\Meal;
use Flugg\Responder\Transformers\Transformer;

class MealTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param \App\Models\Meal
     * @return array
     */
    public function transform(Meal $meal)
    {
        return $meal->toArray();
    }
}
