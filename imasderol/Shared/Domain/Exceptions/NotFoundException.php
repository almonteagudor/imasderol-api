<?php

declare(strict_types=1);

namespace Shared\Domain\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    public static function create(string $id, string $entityName): self
    {
        return new self($id, $entityName);
    }

    private function __construct(private readonly string $id, private readonly string $entityName)
    {
        parent::__construct("Entity $this->entityName with id $this->id not found");
    }
}