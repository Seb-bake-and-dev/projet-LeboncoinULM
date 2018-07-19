<?php
/**
 * Created by PhpStorm.
 * User: wilder18
 * Date: 11/07/18
 * Time: 15:40
 */

namespace App\Controller;

use App\Entity\Announce;
use App\Entity\Favorite;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="security_login")
     */
    public function login(AuthenticationUtils $helper): Response
    {
        return $this->render('Security/login.html.twig', [
            // dernier username saisi (si il y en a un)
            'last_username' => $helper->getLastUsername(),
            // La derniere erreur de connexion (si il y en a une)
            'error' => $helper->getLastAuthenticationError(),
        ]);
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function profile(AuthenticationUtils $helper): Response
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $announces = $em->getRepository(Announce::class)->findBy(['user' => $user ], ['DatePost' => 'DESC']);
        $fav = $em->getRepository(Favorite::class)->findBy(['user'=>$user]);
        return $this->render('user/profile.html.twig', [
            'announces'=> $announces,
            'fav' => $fav,
        ]);
    }

    /**
     * La route pour se deconnecter.
     *
     * Mais celle ci ne doit jamais être executé car symfony l'interceptera avant.
     *
     *
     * @Route("/logout", name="security_logout")
     */
    public function logout(): void
    {
        throw new \Exception('This should never be reached!');
    }
}
