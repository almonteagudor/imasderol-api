<?php

declare(strict_types=1);

namespace Zombicide\Product;

use ArrayIterator;
use IteratorAggregate;
use Traversable;

class ProductCollection implements IteratorAggregate
{
    /** @var Product[] */
    private array $products = [];

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->products);
    }

    public function add(Product $product): void
    {
        $this->products[] = $product;
    }

    public function toArray(): array
    {
        $products = [];

        foreach ($this->products as $product) {
            $products[] = $product->toArray();
        }

        return $products;
    }
}