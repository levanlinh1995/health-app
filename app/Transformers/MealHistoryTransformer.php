<?php

namespace App\Transformers;

use App\Models\MealHistory;
use Flugg\Responder\Transformers\Transformer;

class MealHistoryTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'user' => UserTransformer::class,
        'meal' => MealTransformer::class,
    ];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [
    ];

    /**
     * Transform the model.
     *
     * @param \App\Models\MealHistory
     * @return array
     */
    public function transform(MealHistory $mealHistory)
    {
        return $mealHistory->toArray();
    }
}
