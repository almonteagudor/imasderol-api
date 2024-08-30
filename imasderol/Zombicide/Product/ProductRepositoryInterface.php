<?php

declare(strict_types=1);

namespace Zombicide\Product;

interface ProductRepositoryInterface
{
    public function getProducts(): ProductCollection;
}