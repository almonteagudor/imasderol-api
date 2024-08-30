<?php

declare(strict_types=1);

namespace Shared\Domain\Exceptions;

use Exception;
use Shared\Domain\ValidationError;

class ValidationException extends Exception
{
    public static function empty(): self
    {
        return new ValidationException([]);
    }

    public static function create(string $className, string $message): self
    {
        $error = ValidationError::create($className, $message);

        return new ValidationException([$error]);
    }

    /**
     * @param ValidationError[] $errors
     */
    public static function fromErrors(array $errors): self
    {
        return new ValidationException($errors);
    }

    /**
     * @return ValidationError[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    public function addError(string $className, string $message): void
    {
        $error = ValidationError::create($className, $message);

        $this->errors[] = $error;
    }

    /**
     * @param ValidationError[] $errors
     */
    public function addErrors(array $errors): void
    {
        $this->errors = array_merge($this->errors, $errors);
    }

    public function hasErrors(): bool
    {
        return count($this->errors) > 0;
    }

    public function toArray(): array
    {
        $errors = [];

        foreach ($this->errors as $error) {
            if (!array_key_exists($error->getClassName(), $errors)) {
                $errors[$error->getClassName()] = [];
            }

            $errors[$error->getClassName()][] = $error->getMessage();
        }

        return $errors;
    }

    /**
     * @param ValidationError[] $errors
     */
    private function __construct(private array $errors)
    {
        parent::__construct();
    }
}