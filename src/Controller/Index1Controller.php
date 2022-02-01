<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Index1Controller extends AbstractController
{
    /**
     * @Route("/index1", name="index1")
     */
    public function index(): Response
    {
        return $this->render('index1/index.html.twig', [
            'controller_name' => 'Index1Controller',
        ]);
    }
}
