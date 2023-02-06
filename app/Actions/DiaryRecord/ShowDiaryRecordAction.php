<?php

namespace App\Actions\DiaryRecord;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\DiaryRecordTransformer;
use App\Contracts\DiaryRecordRepository;

class ShowDiaryRecordAction
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

        return $this->httpOK($data, DiaryRecordTransformer::class);
    }
}
