<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FcontactController extends AbstractController
{
    /**
     * @Route("/fcontact", name="fcontact")
     */
    public function index(): Response
    {
        return $this->render('fcontact/index.html.twig', [
            'controller_name' => 'FcontactController',
        ]);
    }
}
