<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    
    #[Route('', name: 'app_home')]
    public function index(): Response
    {

        return $this->render('home/index.html.twig', [
            'products' => $this->productRepository->findBy([], null, 4, null),
        ]);
    }
}
