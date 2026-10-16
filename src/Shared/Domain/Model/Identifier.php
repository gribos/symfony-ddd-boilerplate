<?php

declare(strict_types=1);

namespace App\Shared\Domain\Model;

/** UUID-based identity. The domain only validates ids; generating them is the application layer's job. */
abstract readonly class Identifier implements \Stringable
{
    final public function __construct(public string $value)
    {
        if (preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i', $value) !== 1) {
            throw new \InvalidArgumentException(\sprintf('"%s" is not a valid %s (UUID expected).', $value, static::class));
        }
    }

    public function equals(self $other): bool
    {
        return $other::class === static::class && $other->value === $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
