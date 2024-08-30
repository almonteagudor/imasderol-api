<?php

declare(strict_types=1);

namespace Shared\Domain;

readonly final class ValidationError
{
    public static function create(string $className, string $message): self
    {
        return new self($className, $message);
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    private function __construct(private string $className, private string $message)
    {
    }
}