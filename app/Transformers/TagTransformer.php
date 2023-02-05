<?php

namespace App\Transformers;

use App\Models\Tag;
use Flugg\Responder\Transformers\Transformer;

class TagTransformer extends Transformer
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
     * @param \App\Models\Tag
     * @return array
     */
    public function transform(Tag $tag)
    {
        return $tag->toArray();
    }
}
