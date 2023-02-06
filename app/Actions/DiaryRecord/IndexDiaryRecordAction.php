<?php

namespace App\Actions\DiaryRecord;


use App\Supports\Traits\HasPerPageRequest;
use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use App\Transformers\DiaryRecordTransformer;
use App\Contracts\DiaryRecordRepository;

class IndexDiaryRecordAction
{
    use HasTransformer, HasPerPageRequest;

    private DiaryRecordRepository $diaryRecordRepository;

    public function __construct(DiaryRecordRepository $repository)
    {
        $this->diaryRecordRepository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $data = $this->diaryRecordRepository->queryBuilder();

        return $this->httpOK($data->paginate($this->getPerPage()), DiaryRecordTransformer::class);
    }
}
