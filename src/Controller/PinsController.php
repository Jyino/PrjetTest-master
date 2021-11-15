<?php

namespace App\Controller;

use App\Entity\Pin;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PinsController extends AbstractController
{
    /**
     * @Route("/pins", name="pins")
     */
    public function index(): Response
    {
        $pin = new Pin; 

        
         


        return $this ->render('pins/index.html.twig');
        
    }


}
