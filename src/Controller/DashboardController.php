<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController 
{
    /**
     * @Route("/Dashboard", name="Dashboard_controller")
     */
    public function index(): Response
    {
       
        return new Response(
            '<html><h1>test</h1></html>'
        );
    }
}