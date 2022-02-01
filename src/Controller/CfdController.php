<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CfdController extends AbstractController
{
    /**
     * @Route("/cfd", name="cfd")
     */
    public function index(): Response
    {
        return $this->render('cfd/index.html.twig', [
            'controller_name' => 'CfdController',
        ]);
    }
}
