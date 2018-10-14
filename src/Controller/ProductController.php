<?php

namespace App\Controller;

use App\Entity\Car;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController {

    /**
     * @Route("/product/{productId}", name="product")
     */
    public function index(int $productId) {

        $entityManager = $this->getDoctrine()->getManager();

        $car = $this->getDoctrine()
            ->getRepository(Car::class)
            ->find($productId);

        $car->incrementNbViews();

        $entityManager->persist($car);
        $entityManager->flush();

        dump($car);

        if (!$car) {
            throw $this->createNotFoundException('No product with id ' . $productId);
        }

        return $this->render('product.html.twig', [
            'car' => $car
        ]);
    }

}