<?php

declare(strict_types=1);

namespace Shared\Application\Services;

interface SluggerServiceInterface
{
    public function slug(string $value): string;
}