<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EdofController extends AbstractController
{
    /**
     * @Route("/edof", name="edof")
     */
    public function index(): Response
    {
        return $this->render('edof/index.html.twig', [
            'controller_name' => 'EdofController',
        ]);
    }
}
