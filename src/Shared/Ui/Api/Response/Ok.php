<?php

declare(strict_types=1);

namespace App\Shared\Ui\Api\Response;

use Symfony\Component\HttpFoundation\Response;

final class Ok extends ApiResponse
{
    /**
     * @param array<mixed>|object|null $data
     */
    public function __construct(array|object|null $data = null)
    {
        parent::__construct($data, Response::HTTP_OK);
    }
}
