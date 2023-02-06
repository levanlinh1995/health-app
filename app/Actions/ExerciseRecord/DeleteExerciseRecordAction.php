<?php

namespace App\Actions\ExerciseRecord;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Contracts\ExerciseRecordRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class DeleteExerciseRecordAction
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

        if (!$data) {
            throw new BadRequestHttpException;
        }

        if ($this->exerciseRecordRepository->delete($id)) {
            return $this->httpNoContent();
        }
    }
}
