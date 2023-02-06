<?php

namespace App\Transformers;

use App\Models\BodyRecord;
use Flugg\Responder\Transformers\Transformer;

class BodyRecordTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'user' => UserTransformer::class,
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
     * @param \App\Models\BodyRecord
     * @return array
     */
    public function transform(BodyRecord $record)
    {
        return $record->toArray();
    }
}
