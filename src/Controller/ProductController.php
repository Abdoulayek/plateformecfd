<?php
namespace App\Controller;

use App\Entity\Product;
use App\Entity\Document;
use App\Entity\User;
use App\Service;
use App\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Request\hash_file;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\String\Slugger\SluggerInterface;

class ProductController extends AbstractController
{
    /**
     * Creates a new user entity.
     * @Route("/product/new", name="app_product_new")
     * @Method({"GET", "POST"})
     */
public function new(Request $request) {
  
    $user = new User();
    $form = $this->createForm('AppBundle\Form\UserType', $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        $attachments = $user->getFiles();

        if ($attachments) {
            foreach($attachments as $attachment)
            {
                $file = $attachment->getFile();

                var_dump($attachment);
                $filename = md5(uniqid()) . '.' .$file->guessExtension();

                $file->move(
                        $this->getParameter('upload_path'), $filename
                );
                var_dump($filename);
                $attachment->setFile($filename);
            }
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('user_show', array('id' => $user->getId()));
    }

    return $this->render('user/new.html.twig', array(
                'user' => $user,
                'form' => $form->createView(),
    ));

}

}