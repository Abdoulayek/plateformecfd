<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class VerifpermisController extends AbstractController
{
    /**
     * @Route("/", name="verifpermis")
     */
    public function index(): Response
    {
        return $this->render('verifpermis/vosbesoins.html.twig', [
            'navactivebesoins' => 'active',

        ]);
    }

    /**
     * @Route("/vosbesoins", name="verifpermis_vosbesoins")
     */
    public function vosbesoins(): Response
    {
        return $this->render('verifpermis/vosbesoins.html.twig', [
            'navactivebesoins' => 'active',

        ]);
    }

    /**
     * @Route("/nossolutions", name="verifpermis_nossolutions")
     */
    public function nossolutions(): Response
    {
        return $this->render('verifpermis/nossolutions.html.twig', [
            'navactivesolutions' => 'active',

        ]);
    }

    /**
     * @Route("/apropos", name="verifpermis_apropos")
     */
    public function apropos(): Response
    {
        return $this->render('verifpermis/apropos.html.twig', [
            'navactiveapropos' => 'active',
        ]);
    }
}

