<?php

namespace App\Domain\Entities;

use App\Domain\ValueObjects\Path;

class FileEntity
{
    public function __construct(
        public Path $fullPath,
        public Path $displayPath,
        public string $contents,
    ) {}

    public static function from(array $attributes): self
    {
        return new self(
            fullPath: Path::from($attributes['fullPath']),
            displayPath: Path::from($attributes['displayPath']),
            contents: $attributes['contents'],
        );
    }
}
