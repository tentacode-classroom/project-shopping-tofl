<?php

namespace App\Controller;

use App\Entity\CarRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController {

    /**
     * @Route("/product/{productId}", name="product")
     */
    public function home(int $productId) {

        $carRepository = new CarRepository();

        $data = [
            'slug' => $productId,
            'cars' => $carRepository->findOneById($productId)
        ];

        return $this->render('product.html.twig', $data);
    }

}