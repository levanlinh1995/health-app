<?php

namespace App\Transformers;

use App\Models\Recommendation;
use Flugg\Responder\Transformers\Transformer;

class RecommendationTransformer extends Transformer
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
     * @param \App\Models\Recommendation
     * @return array
     */
    public function transform(Recommendation $recommendation)
    {
        return $recommendation->toArray();
    }
}
