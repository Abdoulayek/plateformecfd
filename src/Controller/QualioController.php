<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QualioController extends AbstractController
{
    /**
     * @Route("/qualio", name="qualio")
     */
    public function index(): Response
    {
        return $this->render('qualio/index.html.twig', [
            'controller_name' => 'QualioController',
        ]);
    }
}
