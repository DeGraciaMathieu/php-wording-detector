<?php

namespace App\Presenter\Commands;

use App\Application\UseCases\InspectInput;
use App\Domain\ValueObjects\Path;

class InspectCommandInput implements InspectInput
{
    public function __construct(
        private string $path,
        private bool $withMethod,
    ){}

    public function path(): Path
    {
        return Path::from($this->path);
    }

    public function withMethod(): bool
    {
        return $this->withMethod;
    }
}
