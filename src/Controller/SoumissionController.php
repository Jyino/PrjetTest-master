<?php

namespace App\Controller;

use App\Entity\Registration;
use App\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SoumissionController extends AbstractController
{
    /**
     * @Route("/soumission", name="soumission")
     */
    public function index(): Response
    {
        return $this->render('soumission/index.html.twig', [
            'controller_name' => 'SoumissionController',
        ]);
    }

    public function createAction()
{
    $em = $this->getDoctrine()->getEntityManager();

    $form = $this->createForm(new RegistrationType(), new Registration());

    $form->bind($this->getRequest());

    if ($form->isValid()) {
        $registration = $form->getData();

        $em->persist($registration->getUser());
        $em->flush();

        return $this->redirect('');
    }

    return $this->render(
        'account/register.html.twig',
        array('form' => $form->createView())
    );
}
}
