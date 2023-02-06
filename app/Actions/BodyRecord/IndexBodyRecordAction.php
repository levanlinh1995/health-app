<?php

namespace App\Actions\BodyRecord;


use App\Supports\Traits\HasPerPageRequest;
use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use App\Transformers\BodyRecordTransformer;
use App\Contracts\BodyRecordRepository;

class IndexBodyRecordAction
{
    use HasTransformer, HasPerPageRequest;

    private BodyRecordRepository $bodyRecordRepository;

    public function __construct(BodyRecordRepository $repository)
    {
        $this->bodyRecordRepository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $data = $this->bodyRecordRepository->queryBuilder();

        return $this->httpOK($data->paginate($this->getPerPage()), BodyRecordTransformer::class);
    }
}
