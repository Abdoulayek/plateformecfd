<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PoleController extends AbstractController
{
    /**
     * @Route("/pole", name="pole")
     */
    public function index(): Response
    {
        return $this->render('pole/index.html.twig', [
            'controller_name' => 'PoleController',
        ]);
    }
}
