<?php

declare(strict_types=1);

namespace App\Shared\Ui\Api\Response;

use Symfony\Component\HttpFoundation\Response;

final class NotFound extends ApiResponse
{
    public function __construct()
    {
        parent::__construct(null, Response::HTTP_NOT_FOUND);
    }
}
