<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController {

    /**
     * @Route("/produit/{productId}", name="product")
     */
    public function home(int $productId) {

        $data = [
            'slug' => $productId
        ];
        return $this->render('product.html.twig', $data);
    }

}