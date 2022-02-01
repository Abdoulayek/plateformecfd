<?php

namespace App\Controller;

use App\Form\ContType;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class ContController extends AbstractController
{
    /**
     * @Route("/cont", name="cont")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContType::class);
        $form->handleRequest($request);
 
         //var_dump($form); die();
        
         //Si formulaire soumis
         if ($form->isSubmitted() && $form->isValid()) {
             
             //Récupération des données
             $data = $form->getData();
             
             //var_dump($data["email"]);die();
 
             //Contenu à envoyer
 
             $email = (new TemplatedEmail())
             ->from($data["email"])
             ->to('organismecfd@gmail.com')
             ->subject($data["objet"])
             ->htmlTemplate('verifpermis/en.html.twig')
             ->context([
                'message' => $data["message"],
                'telephone' => $data["telephone"],
            ])
             ;
            //var_dump($data["email"]);die();

             $mailer->send($email);
 
             $this->addFlash('success', 'Mail envoyé, Nous vous recontacterons!');
             
             
             
             //  Vider après envoi du formulaire 
 
             unset($form);
             $form = $this->createForm(ContType::class);
 
             return $this->render('verifpermis/cont.html.twig', [
                 
                 'form' => $form->createView(),
             ]);
    }
    return $this->render('verifpermis/cont.html.twig', [
        'form' => $form->createView(),
    ]);
    }
}