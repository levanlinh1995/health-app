<?php

namespace App\Actions\DiaryRecord;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\DiaryRecordTransformer;
use App\Contracts\DiaryRecordRepository;

class StoreDiaryRecordAction
{
    use HasTransformer;

    private DiaryRecordRepository $diaryRecordRepository;

    public function __construct(DiaryRecordRepository $repository)
    {
        $this->diaryRecordRepository = $repository;
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data): JsonResponse
    {
        return DB::transaction(function () use ($data) {
            $diaryRecord = $this->diaryRecordRepository->create($data);

            return $this->httpOK($diaryRecord, DiaryRecordTransformer::class);
        });
    }
}
