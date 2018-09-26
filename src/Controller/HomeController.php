<?php

namespace App\Controller;

use App\Entity\CarRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController {

    /**
     * @Route("/", name="home")
     */
    public function home() {

        $carRepository = new CarRepository();

        return $this->render('home.html.twig', ['cars' => $carRepository->findAll()]);
    }

}