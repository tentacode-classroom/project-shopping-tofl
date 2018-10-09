<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use App\Form\RegistrationType;
use Symfony\Component\Messenger\MessageBusInterface;
use App\Message\RegistrationNotification;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/signup", name="registration")
     */
    public function index(Request $request, MessageBusInterface $bus)
    {
        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() AND $form->isValid()) {
            $user = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $bus->dispatch(new RegistrationNotification("L'utilisateur a bien été inscrit"));

            return $this->redirectToRoute('registration_validated');
        }

        return $this->render('registration.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/confirmation/confirm", name="registration_validated")
     */
    public function confirmation() {
        // Renvoyer l'utilisateur à la page d'inscription (une fois l'inscription validée) tout en lui retirant la possibilité
        // de rafraîchir la page pour envoyer plusieurs fois de suite les informations dans la base de données
        return $this->redirectToRoute('registration');
    }
}
