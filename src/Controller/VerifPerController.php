<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VerifPerController extends AbstractController
{
    /**
     * @Route("/verif/per", name="verif_per")
     */
    public function index(): Response
    {
        return $this->render('verif_per/index.html.twig', [
            'controller_name' => 'VerifPerController',
        ]);
    }
}
