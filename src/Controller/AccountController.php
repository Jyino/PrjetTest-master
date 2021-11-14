<?php

namespace App\Controller;

use App\Entity\Registration;
use App\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="account")
     */
    public function index(): Response
    {
        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }
    //cette fonction casse mon symfony si c'est décommenté à cause du new RegistrationType()
    // public function registerAction()
    // {
    //     $form = $this->createForm(
    //         new RegistrationType()
    //         new Registration()
    //     );

    //     $form = $this->createForm(TaskType::RegistrationType, $task);

    //     return $this->render(
    //         'account/register.html.twig',
    //         array('form' => $form->createView())
    //     );
    // }
    
}
