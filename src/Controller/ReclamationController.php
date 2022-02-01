<?php

namespace App\Controller;
use App\Entity\Student; 
use AppBundle\Form\FormValidationType; 
use App\Form\ReclamType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class ReclamationController extends AbstractController
{
    /**
     * @Route("/reclamation", name="reclamation")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
       
        $form = $this->createForm(ReclamType::class);
        
        $form->handleRequest($request);
 
        //var_dump($form); die();
       
        //Si formulaire soumis
        if ($form->isSubmitted() && $form->isValid())
         {
            
            //Récupération des données
            $data = $form->getData();
            
            //var_dump($data["email"]);die();

            //Contenu à envoyer

            $email = (new TemplatedEmail())
            ->from($data["email"])
            ->to('organismecfd@gmail.com')
            ->subject($data["objet"])
            ->htmlTemplate('verifpermis/reclam.html.twig')
            ->context([
               'message' => $data["message"],
               'telephone' => $data["telephone"],
               'Probleme' => $data["Probleme"],
           ])
            ;
           //var_dump($data["email"]);die();

            $mailer->send($email);

            $this->addFlash('success', 'Mail envoyé, Nous vous recontacterons!');
            
            
            
            //  Vider après envoi du formulaire 

            unset($form);
            $form = $this->createForm(ReclamType::class);

            return $this->render('verifpermis/ReclamContact.html.twig', [
                
                'form' => $form->createView(),
            ]);
   }
 
        // var_dump($form); die();
         return $this->render('verifpermis/ReclamContact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
