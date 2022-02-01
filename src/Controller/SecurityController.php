<?php

namespace App\Controller;

use DateTime;
use App\Entity\Users;
use App\Form\SecurityType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/franceConnect", name="security_fc")
     */
    public function franceConnect(): Response
    {
        return $this->redirectToRoute('app_login');
    }

    /**
     * @Route("/singin", name="security_singin")
     */
    public function singin(Request $request, UserPasswordHasherInterface $passwordHasher)
    {
        $user = new Users();
        $formSingin = $this->createForm(SecurityType::class, $user);
        $formSingin->handleRequest($request);

        if ($formSingin->isSubmitted() && $formSingin->isValid()) {

            $user->setPassword($passwordHasher->hashPassword($user, $user->getPassword()));
            //$user->setPassword(password_hash($user->getPassword(), PASSWORD_BCRYPT));

            $user->setDateInscription(new \DateTime());

            $siretInit = $user->getNumSiret();
            $homepage = file_get_contents("https://entreprise.data.gouv.fr/api/sirene/v3/etablissements/" . $siretInit);
            $infoEntreprise = json_decode($homepage);
            $nomEntreprise = $infoEntreprise->{'etablissement'}->{'unite_legale'}->{'denomination'};

            if (!empty($nomEntreprise)) {
                $user->setUsernames($nomEntreprise);
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($user);
                $manager->flush();

                return $this->render('security/index.html.twig', [
                    'login_singin' => 'connexion',
                    'class_nav_login' => "choix-login-singin-active",
                    'class_nav_singin' => "choix-login-singin",
                    'link_login' => "link-login-singin-active",
                    'link_singin' => "link-login-singin",
                    'success' => 'Inscription réussie, Merci de vous connecter'
                ]);
            } else {
                /**
                 * message d'erreur (warning)
                 */
                return $this->render('security/index.html.twig', [
                    'formSingin' => $formSingin->createView(),
                    'login_singin' => 'inscription',
                    'class_nav_login' => "choix-login-singin-active",
                    'class_nav_singin' => "choix-login-singin",
                    'link_login' => "link-login-singin-active",
                    'link_singin' => "link-login-singin",
                    'warning' => "Numéro de siret non valide",
                ]);
            }
        } //end if submitted & isValid


        return $this->render('security/index.html.twig', [
            'formSingin' => $formSingin->createView(),
            'login_singin' => 'inscription',
            'class_nav_login' => "choix-login-singin-active",
            'class_nav_singin' => "choix-login-singin",
            'link_login' => "link-login-singin-active",
            'link_singin' => "link-login-singin",
            'warning' => "",
        ]);
    }

    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('apps_verifpermis_moncompte');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        //return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
        if ($error) {
            return $this->render('security/index.html.twig', [
                'last_username' => $lastUsername,
                'error' => "email ou mot de passe invalide",
                'login_singin' => 'connexion',
                'class_nav_login' => "choix-login-singin-active",
                'class_nav_singin' => "choix-login-singin",
                'link_login' => "link-login-singin-active",
                'link_singin' => "link-login-singin",
            ]);
        } else {
            return $this->render('security/index.html.twig', [
                'last_username' => $lastUsername,
                'login_singin' => 'connexion',
                'class_nav_login' => "choix-login-singin-active",
                'class_nav_singin' => "choix-login-singin",
                'link_login' => "link-login-singin-active",
                'link_singin' => "link-login-singin",
            ]);
        }
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
