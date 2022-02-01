<?php

namespace App\Controller;

use App\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class VeriController extends AbstractController
{
    /**
     * @Route("/veri", name="veri")
     */
 
public function index(Request $request, \Swift_Mailer $mailer)
    {

    return $this->render('contact/contact.html.twig', [
            'our_form' => $form->createView(),
        ]);
    }
}