<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewCarController extends AbstractController
{
    /**
     * @Route("/new/car", name="new-car")
     */
    public function index()
    {
        return $this->render('new_car/index.html.twig', [
            'controller_name' => 'NewCarController',
        ]);
    }
}
