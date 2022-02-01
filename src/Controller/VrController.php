<?php

namespace App\Controller;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VrController extends AbstractController
{
    /**
     * @Route("/vr", name="vr")
     */
    public function contact()
    {
        $form = $this->createForm(ContactType::class);
        return $this->render('vr/index.html.twig', [
            'our_form' => $form->createView()
        ]);
    }
}
