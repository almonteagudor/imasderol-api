<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObjects;

use Shared\Domain\Exceptions\ValidationException;

readonly final class Id
{
    private const CLASS_NAME = 'Id';

    public static function random(): self
    {
        return new self(Uuid::v7());
    }

    /**
     * @throws ValidationException
     */
    public static function fromValue(string $value): self
    {
        if (!Uuid::isValid($value)) {
            throw ValidationException::create(self::CLASS_NAME, 'The value is not a valid uuid');
        }

        return new self(Uuid::fromString($value));
    }

    public function getValue(): string
    {
        return $this->value->toString();
    }

    private function __construct(private Uuid $value) {}
}