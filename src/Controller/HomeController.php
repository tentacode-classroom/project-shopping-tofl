<?php

namespace App\Controller;

use App\Entity\Car;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController {

    /**
     * @Route("/", name="home")
     */
    public function home() {

        #$carRepository = new CarRepository();

        $cars = $this->getDoctrine()
            ->getRepository(Car::class)
            ->findBy([], ['type' => 'DESC']);

        if (!$cars) {
            throw $this->createNotFoundException('There is no product in the database');
        }

        return $this->render('home.html.twig', ['cars' => $cars]);
    }

}