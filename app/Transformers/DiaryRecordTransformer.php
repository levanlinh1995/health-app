<?php

namespace App\Transformers;

use App\Models\DiaryRecord;
use Flugg\Responder\Transformers\Transformer;

class DiaryRecordTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
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
     * @param \App\Models\DiaryRecord
     * @return array
     */
    public function transform(DiaryRecord $record)
    {
        return $record->toArray();
    }
}
