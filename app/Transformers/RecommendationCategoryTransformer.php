<?php

namespace App\Transformers;

use App\Models\RecommendationCategory;
use Flugg\Responder\Transformers\Transformer;

class RecommendationCategoryTransformer extends Transformer
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
     * @param \App\Models\RecommendationCategory
     * @return array
     */
    public function transform(RecommendationCategory $cate)
    {
        return $cate->toArray();
    }
}
