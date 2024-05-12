<?php

namespace App\Application\UseCases;

use App\Domain\ValueObjects\Path;

interface InspectInput 
{
    public function path(): Path;
    public function withMethod(): bool;
}
