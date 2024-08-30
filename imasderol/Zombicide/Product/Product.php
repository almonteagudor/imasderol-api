<?php

declare(strict_types=1);

namespace Zombicide\Product;

use Shared\Domain\Exceptions\ValidationException;
use Shared\Domain\ValueObjects\Id;
use Zombicide\Product\ValueObjects\ProductName;

class Product
{
    /**
     * @throws ValidationException
     */
    public static function product(string $id, string $name): self
    {
        return self::fromValues($id, $name);
    }

    /**
     * @throws ValidationException
     */
    public static function newProduct(string $name): self
    {
        return self::fromValues(null, $name);
    }

    public function id(): string
    {
        return $this->id->getValue();
    }

    public function name(): string
    {
        return $this->name->value();
    }

    /**
     * @throws ValidationException
     */
    public function setName(string $name): void
    {
        $this->name = ProductName::fromValue($name);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->getValue(),
            'name' => $this->name->value(),
        ];
    }

    private function __construct(private readonly Id $id, private ProductName $name)
    {
    }

    /**
     * @throws ValidationException
     */
    private static function fromValues(?string $id, string $name): self
    {
        $validationException = ValidationException::empty();

        try {
            $id = $id ? Id::fromValue($id) : Id::random();

        } catch (ValidationException $e) {
            $validationException->addErrors($e->getErrors());
        }

        try {
            $name = ProductName::fromValue($name);
        } catch (ValidationException $e) {
            $validationException->addErrors($e->getErrors());
        }

        if ($validationException->hasErrors()) {
            throw $validationException;
        }

        return new self($id, $name);
    }
}