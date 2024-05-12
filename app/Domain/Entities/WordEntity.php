<?php

namespace App\Domain\Entities;

class WordEntity
{
    public function __construct(
        private string $value,
    ) {}

    public static function from(string $word): self
    {
        $word = strtolower($word);

        return new self($word);
    }

    public function canBeIgnored(): bool
    {
        return $this->value === 'this';
    }

    public function value(): string
    {
        return $this->value;
    }
}
