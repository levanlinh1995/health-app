<?php

namespace App\Transformers;

use App\Models\ExerciseRecord;
use Flugg\Responder\Transformers\Transformer;

class ExerciseRecordTransformer extends Transformer
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
     * @param \App\Models\ExerciseRecord
     * @return array
     */
    public function transform(ExerciseRecord $record)
    {
        return $record->toArray();
    }
}
