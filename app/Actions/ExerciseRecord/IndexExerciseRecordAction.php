<?php

namespace App\Actions\ExerciseRecord;


use App\Supports\Traits\HasPerPageRequest;
use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use App\Transformers\ExerciseRecordTransformer;
use App\Contracts\ExerciseRecordRepository;

class IndexExerciseRecordAction
{
    use HasTransformer, HasPerPageRequest;

    private ExerciseRecordRepository $exerciseRecordRepository;

    public function __construct(ExerciseRecordRepository $repository)
    {
        $this->exerciseRecordRepository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $data = $this->exerciseRecordRepository->queryBuilder();

        return $this->httpOK($data->paginate($this->getPerPage()), ExerciseRecordTransformer::class);
    }
}
