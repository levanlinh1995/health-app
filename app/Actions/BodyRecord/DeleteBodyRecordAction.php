<?php

namespace App\Actions\BodyRecord;

use App\Supports\Traits\HasTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Contracts\BodyRecordRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class DeleteBodyRecordAction
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

        if (!$data) {
            throw new BadRequestHttpException;
        }

        if ($this->bodyRecordRepository->delete($id)) {
            return $this->httpNoContent();
        }
    }
}
