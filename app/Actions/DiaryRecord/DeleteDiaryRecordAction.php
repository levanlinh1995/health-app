<?php

namespace App\Actions\DiaryRecord;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Contracts\DiaryRecordRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class DeleteDiaryRecordAction
{
    use HasTransformer;

    private DiaryRecordRepository $diaryRecordRepository;

    public function __construct(DiaryRecordRepository $repository)
    {
        $this->diaryRecordRepository = $repository;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        $data = $this->diaryRecordRepository->find($id);

        if (!$data) {
            throw new BadRequestHttpException;
        }

        if ($this->diaryRecordRepository->delete($id)) {
            return $this->httpNoContent();
        }
    }
}
