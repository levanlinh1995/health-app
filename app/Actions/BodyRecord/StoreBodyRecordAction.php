<?php

namespace App\Actions\BodyRecord;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\BodyRecordTransformer;
use App\Contracts\BodyRecordRepository;

class StoreBodyRecordAction
{
    use HasTransformer;

    private BodyRecordRepository $bodyRecordRepository;

    public function __construct(BodyRecordRepository $repository)
    {
        $this->bodyRecordRepository = $repository;
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data): JsonResponse
    {
        return DB::transaction(function () use ($data) {
            $bodyRecord = $this->bodyRecordRepository->create($data);

            return $this->httpOK($bodyRecord, BodyRecordTransformer::class);
        });
    }
}
