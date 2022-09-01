<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    #[Route('/category/{id}', name: 'app_category')]
    public function index($id, Category $category): Response
    {
        return $this->render('category/index.html.twig', [
            'category' => $category,
            'products' => $this->productRepository->findBy(['category' => $id]),
        ]);
    }
}
