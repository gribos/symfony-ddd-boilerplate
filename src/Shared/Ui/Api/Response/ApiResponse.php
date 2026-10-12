<?php

declare(strict_types=1);

namespace App\Shared\Ui\Api\Response;

use Symfony\Component\HttpFoundation\JsonResponse;

abstract class ApiResponse extends JsonResponse
{
    /**
     * @var array<mixed>|object|null
     */
    protected mixed $data;

    /**
     * @param array<mixed>|object $data
     */
    public function __construct(array|object|null $data, int $status)
    {
        parent::__construct(null, $status);
        $this->setData($data);
    }

    /**
     * @param array<mixed>|object|null $data
     */
    public function setData(mixed $data = []): static
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array<mixed>|object|null $data
     */
    public function getData(): array|object|null
    {
        return $this->data;
    }
}
