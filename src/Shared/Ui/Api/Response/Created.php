<?php

declare(strict_types=1);

namespace App\Shared\Ui\Api\Response;

use Symfony\Component\HttpFoundation\Response;

final class Created extends ApiResponse
{
    public function __construct(null|array|object $data = null)
    {
        parent::__construct($data, Response::HTTP_CREATED);
    }
}
