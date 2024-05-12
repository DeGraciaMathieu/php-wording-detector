<?php

namespace App\Domain\ValueObjects;

class Path
{
    public function __construct(
        private string $value,
    ) {}

    public static function from(string $value): self
    {
        static::guard($value);

        return new self($value);
    }

    private static function guard(string $value): void
    {
        //
    }

    public function value(): string
    {
        return $this->value;
    }
}
