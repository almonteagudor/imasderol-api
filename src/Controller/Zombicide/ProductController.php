<?php

namespace App\Controller\Zombicide;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/products', name: '_products')]
class ProductController extends AbstractController
{
    #[Route('', name: '_index')]
    public function index(): JsonResponse
    {
        return new JsonResponse("Product Index");
    }
}