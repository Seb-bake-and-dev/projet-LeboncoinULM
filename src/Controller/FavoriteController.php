<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Announce;
use App\Entity\Favorite;
use App\Repository\FavoriteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

        return $this->redirectToRoute('announce_show', ['id' => $announce->getId(),'_fragment' => 'msg_anchor']);

    }

    /**
     * @Route("/deleteFav/{id}", name="favorite_defav", methods="GET")
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */
    public function delfav(Favorite $favorite)
    {
        $em = $this->getDoctrine()->getManager();
        $favorite->setActive(0);
        $announce = $favorite->getAnnounce();
        $em->flush();
        return $this->redirectToRoute('announce_show', ['id' => $announce->getId(), '_fragment' => 'msg_anchor']);
    }

}
