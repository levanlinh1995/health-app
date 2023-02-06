<?php

namespace App\Actions\ExerciseRecord;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\ExerciseRecordTransformer;
use App\Contracts\ExerciseRecordRepository;

class ShowExerciseRecordAction
{
    use HasTransformer;

    private ExerciseRecordRepository $exerciseRecordRepository;

    public function __construct(ExerciseRecordRepository $repository)
    {
        $this->exerciseRecordRepository = $repository;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        $data = $this->exerciseRecordRepository->find($id);

        return $this->httpOK($data, ExerciseRecordTransformer::class);
    }
}
