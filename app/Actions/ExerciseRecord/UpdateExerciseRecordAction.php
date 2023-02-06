<?php

namespace App\Actions\ExerciseRecord;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\ExerciseRecordTransformer;
use App\Contracts\ExerciseRecordRepository;

class UpdateExerciseRecordAction
{
    use HasTransformer;

    private ExerciseRecordRepository $exerciseRecordRepository;

    public function __construct(ExerciseRecordRepository $repository)
    {
        $this->exerciseRecordRepository = $repository;
    }

    /**
     * @param array $data
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data, int $id): JsonResponse
    {
        return DB::transaction(function () use ($id, $data) {
            $exerciseRecord = $this->exerciseRecordRepository->find($id);

            $exerciseRecord->update($data);
            $exerciseRecord->refresh();

            return $this->httpOK($exerciseRecord, ExerciseRecordTransformer::class);
        });
    }
}
