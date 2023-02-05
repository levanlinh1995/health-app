<?php

namespace App\Supports\Traits;

trait HasPerPageRequest
{
    public function getPerPage()
    {
        return request('per_page', 50);
    }

    public function getOffset()
    {
        return (request('page', 1) - 1) * request('per_page', 50);
    }
}
