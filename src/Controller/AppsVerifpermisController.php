<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppsVerifpermisController extends AbstractController
{
    /**
     * @Route("/apps/verifpermis/home", name="apps_verifpermis_home")
     */
    public function home(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('apps_verifpermis/index.html.twig', [
            'navactivehome' => 'active',
        ]);
    }

    /**
     * @Route("/apps/verifpermis/moncompte", name="apps_verifpermis_moncompte")
     */
    public function moncompte(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('apps_verifpermis/moncompte.html.twig', [
            'navactivecompte' => 'active',
        ]);
    }

    /**
     * @Route("/apps/verifpermis/resultat", name="apps_verifpermis_resultat")
     */
    public function resultatapp(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('apps_verifpermis/resultat.html.twig', [
            'controller_name' => 'AppsVerifpermisController',
        ]);
    }
}
