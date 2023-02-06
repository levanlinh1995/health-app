<?php

namespace App\Actions\DiaryRecord;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\DiaryRecordTransformer;
use App\Contracts\DiaryRecordRepository;

class UpdateDiaryRecordAction
{
    use HasTransformer;

    private DiaryRecordRepository $diaryRecordRepository;

    public function __construct(DiaryRecordRepository $repository)
    {
        $this->diaryRecordRepository = $repository;
    }

    /**
     * @param array $data
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data, int $id): JsonResponse
    {
        return DB::transaction(function () use ($id, $data) {
            $diaryRecord = $this->diaryRecordRepository->find($id);

            $diaryRecord->update($data);
            $diaryRecord->refresh();

            return $this->httpOK($diaryRecord, DiaryRecordTransformer::class);
        });
    }
}
