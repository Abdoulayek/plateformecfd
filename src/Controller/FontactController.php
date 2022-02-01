<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FontactController extends AbstractController
{
    /**
     * @Route("/fontact", name="fontact")
     */
    public function index(): Response
    {
        return $this->render('fontact/traitement.php', [
            'controller_name' => 'FontactController',
        ]);
    }
}
