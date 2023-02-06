<?php

namespace App\Actions\BodyRecord;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\BodyRecordTransformer;
use App\Contracts\BodyRecordRepository;

class UpdateBodyRecordAction
{
    use HasTransformer;

    private BodyRecordRepository $bodyRecordRepository;

    public function __construct(BodyRecordRepository $repository)
    {
        $this->bodyRecordRepository = $repository;
    }

    /**
     * @param array $data
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data, int $id): JsonResponse
    {
        return DB::transaction(function () use ($id, $data) {
            $bodyRecord = $this->bodyRecordRepository->find($id);

            $bodyRecord->update($data);
            $bodyRecord->refresh();

            return $this->httpOK($bodyRecord, BodyRecordTransformer::class);
        });
    }
}
