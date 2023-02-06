<?php

namespace App\Actions\BodyRecord;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\BodyRecordTransformer;
use App\Contracts\BodyRecordRepository;

class ShowBodyRecordAction
{
    use HasTransformer;

    private BodyRecordRepository $bodyRecordRepository;

    public function __construct(BodyRecordRepository $repository)
    {
        $this->bodyRecordRepository = $repository;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        $data = $this->bodyRecordRepository->find($id);

        return $this->httpOK($data, BodyRecordTransformer::class);
    }
}
