<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Card;
use App\Form\CardType;
use App\Form\ContactType;
use App\Form\ProductType;
use App\Manager\ContactManager;
use App\Repository\CardRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormulaireController extends AbstractController
{
    /**
     * @Route("/formulaire", name="formulaire")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @param ContactManager $contactManager
     * @param MailerService $mailerService
     * @return Response
     */
    public function contact(
        Request $request,
       MessageService $messageService,
       MailerService $mailerService
    ): Response
    {
        
        $formContact = $this->createForm(ContactType::class, $contact);
        $formContact->handleRequest($request);

        if ($formContact->isSubmitted() && $formContact->isValid()) {
            $data = $formContact->getData();
            $messageService->addSuccess('bien envoyé');
            dd($data);
        }

        return $this->render('formulaire/contact.html.twig', [
            'formContact' => $formContact->createView()
        ]);
    }
}