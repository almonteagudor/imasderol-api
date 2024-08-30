<?php

declare(strict_types=1);

namespace Zombicide\Product\ValueObjects;

use Shared\Domain\Exceptions\ValidationException;

readonly final class ProductName
{
    private const CLASS_NAME = 'ProductName';

    private const MIN_LENGTH = 3;
    private const MAX_LENGTH = 50;

    /**
     * @throws ValidationException
     */
    public static function fromValue(string $value): self
    {
        self::validate($value);

        return new self($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    private function __construct(private string $value) {}

    /**
     * @throws ValidationException
     */
    private static function validate(string $value): void
    {
        if (strlen($value) < self::MIN_LENGTH) {
            throw ValidationException::create(self::CLASS_NAME, 'Minimum length is ' . self::MIN_LENGTH);
        }

        if (strlen($value) > self::MAX_LENGTH) {
            throw ValidationException::create(self::CLASS_NAME, 'Maximum length is ' . self::MAX_LENGTH);
        }
    }
}