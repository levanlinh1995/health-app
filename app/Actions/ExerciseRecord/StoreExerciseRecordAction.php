<?php

namespace App\Actions\ExerciseRecord;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\ExerciseRecordTransformer;
use App\Contracts\ExerciseRecordRepository;

class StoreExerciseRecordAction
{
    use HasTransformer;

    private ExerciseRecordRepository $exerciseRecordRepository;

    public function __construct(ExerciseRecordRepository $repository)
    {
        $this->exerciseRecordRepository = $repository;
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data): JsonResponse
    {
        return DB::transaction(function () use ($data) {
            $exerciseRecord = $this->exerciseRecordRepository->create($data);

            return $this->httpOK($exerciseRecord, ExerciseRecordTransformer::class);
        });
    }
}
