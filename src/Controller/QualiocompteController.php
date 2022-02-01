<?php

namespace App\Controller;
use App\Form\ContType; 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class QualiocompteController extends AbstractController
{
    /**
     * @Route("/qualiocompte", name="qualiocompte")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
         {
            
            //Récupération des données
            $data = $form->getData();
            
            //var_dump($data["email"]);die();

            //Contenu à envoyer

            $email = (new TemplatedEmail())
            ->from($data["email"])
            ->to('organismecfd@gmail.com')
            ->subject("Qualiopi")
            ->htmlTemplate('upload/up.html.twig')
            ->context([
               'el1' => $data["el1"],
               'Nom' => $data["Nom"],
               'prenom' => $data["probleme"],
               'Raison_sociale' => $data["Raison_sociale"],
               'SIRET' => $data["SIRET"],
               'Adresse' => $data["Adresse"],
               'siteweb' => $data["siteweb"],
               'dossierdecandidature' => $data["dossierdecandidature"],
               'element1' => $data["element1"],
               'element3' => $data["element3"],
               'element4' => $data["element4"],
               'element5' => $data["element5"],
               'element6' => $data["element6"],
               'element7' => $data["element7"],
               'element8' => $data["element8"],
               'element9' => $data["element9"],
               'element10' => $data["element10"],
               'element11' => $data["element11"],
               'element12' => $data["element12"],
               'element13' => $data["element13"],
               'element14' => $data["element14"],
           ])
            ;
           //var_dump($data["email"]);die();

            $mailer->send($email);

            $this->addFlash('success', 'Mail envoyé, Nous vous recontacterons!');
            
            
            
            //  Vider après envoi du formulaire 

            unset($form);
            $form = $this->createForm(ContType::class);

            return $this->render('qualiocompte/index.html.twig', [
                
                'form' => $form->createView(),
            ]);
   }
   return $this->render('qualiocompte/index.html.twig', [
    'form' => $form->createView(),
]);
}
}



 
        //var_dump($form); die();
       
        //Si formulaire soumis
        
        // var_dump($form); die();
        
