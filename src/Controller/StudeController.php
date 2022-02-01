<?php

namespace App\Controller;


use App\Entity\Student; 
use AppBundle\Form\FormValidationType; 
use Symfony\Bundle\FrameworkBundle\Controller\Controller; 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route; 
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType; 
use Symfony\Component\Form\Extension\Core\Type\FileType; 
use Symfony\Component\Form\Extension\Core\Type\SubmitType; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class StudeController extends AbstractController
{
    /**
     * @Route("/stude", name="stude")
     */
    public function index(Request $request): Response
    {
        $student = new Student(); 
        $form = $this->createFormBuilder($student) 
           ->add('photo', FileType::class, array('label' => 'Documents(png, jpeg, pdf)')) 
           ->add('save', SubmitType::class, array('label' => 'Envoyer')) 
           ->getForm(); 
           
        $form->handleRequest($request); 
        if ($form->isSubmitted() && $form->isValid()) { 
           $file = $student->getPhoto(); 
           $fileName = md5(uniqid()).'.'.$file->guessExtension(); 
           $file->move($this->getParameter('photos_directory'), $fileName); 
           $student->setPhoto($fileName); 
           return new Response("User photo is successfully uploaded."); 
        } else { 
           return $this->render('upload/index.html.twig', array( 
              'form' => $form->createView(), 
           )); 
        } 
     }   
    
}


