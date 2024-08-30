<?php

declare(strict_types=1);

namespace Shared\Application\Services;

interface HasherServiceInterface
{
    public function hash(string $value): string;
}