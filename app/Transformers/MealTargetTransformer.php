<?php

namespace App\Transformers;

use App\Models\MealTarget;
use Flugg\Responder\Transformers\Transformer;

class MealTargetTransformer extends Transformer
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
     * @param \App\Models\MealTarget
     * @return array
     */
    public function transform(MealTarget $meal)
    {
        return $meal->toArray();
    }
}
