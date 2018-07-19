<?php

namespace App\Controller;

use App\Entity\Announce;
use App\Entity\Favorite;
use App\Repository\FavoriteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/favorite")
 */
class FavoriteController extends Controller
{

    /**
     * @Route("/new/{id}", name="favorite_new", methods="GET|POST")
     */
    public function new(Request $request, Announce $announce): Response
    {
        $favorite = new Favorite();
        $em = $this->getDoctrine()->getManager();
        $favorite->setUser($this->getUser());
        $favorite->setAnnounce($announce);
        $favorite->setActive(1);

        $em->persist($favorite);
        $em->flush();

        return $this->redirectToRoute('announce_show', ['id' => $announce->getId()]);

    }

    /**
     * @Route("/delete/{id}", name="favorite_delete", methods="GET|POST")
     */
    public function deleteFav(Announce $announce): Response
    {
        $favorite = new Favorite();
        $em = $this->getDoctrine()->getManager();
        $favorite->setUser($this->getUser());
        $favorite->setAnnounce($announce);
        $favorite->setActive(0);
        $em->persist($favorite);
        $em->flush();

        return $this->redirectToRoute('announce_show', ['id' => $announce->getId()]);
    }
}
