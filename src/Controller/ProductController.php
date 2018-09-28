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

        /*
        $entityManager = $this->getDoctrine()->getManager();

        $car = new Car();
        $car->setType('Ford Mustang');
        $car->setNbSeats('2');
        $car->setPrice('20000');
        $car->setImage('mustang.jpeg');
        $car->setDescription('Vroum vroum vroum');

        $entityManager->persist($car);
        $entityManager->flush();

        #$carRepository = new CarRepository();
    */

        $car = $this->getDoctrine()->getRepository(Car::class)->find($productId);

        if (!$car) {
            var_dump($car);
            throw $this->createNotFoundException('No product with id ' . $productId);
        }

        $data = [
            'slug' => $productId,
            'car' => $car
        ];

        return $this->render('product.html.twig', $data);
    }

}