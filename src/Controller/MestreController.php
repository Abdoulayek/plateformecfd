<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MestreController extends AbstractController
{
    /**
     * @Route("/mestre", name="mestre")
     */
    public function index(): Response
    {
        return $this->render('mestre/index.html.twig', [
            'controller_name' => 'MestreController',
        ]);
    }
}
