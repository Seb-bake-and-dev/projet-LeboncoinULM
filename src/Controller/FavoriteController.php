<?php

namespace App\Controller;

use App\Entity\Favorite;
use App\Form\Favorite1Type;
use App\Form\FavoriteType;
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
     * @Route("/", name="favorite_index", methods="GET")
     */
    public function index(FavoriteRepository $favoriteRepository): Response
    {
        return $this->render('favorite/index.html.twig', ['favorites' => $favoriteRepository->findAll()]);
    }

    /**
     * @Route("/new/{id}", name="favorite_new", methods="GET|POST")
     */
    public function new(Request $request, $id): Response
    {


        $em = $this->getDoctrine()->getManager();
        $favorite = $em->getRepository(Favorite::class)->findAll();

        $favorite = new Favorite();
        $favorite->setUser($this->getUser());
        $favorite->setAnnounce($id);
        $favorite->setActive(true);

        $em->persist($favorite);
        $em->flush();

        return $this->redirectToRoute('favorite_index');

    }

    /**
     * @Route("/{id}", name="favorite_show", methods="GET")
     */
    public function show(Favorite $favorite): Response
    {
        return $this->render('favorite/show.html.twig', ['favorite' => $favorite]);
    }

    /**
     * @Route("/{id}/edit", name="favorite_edit", methods="GET|POST")
     */
    public function edit(Request $request, Favorite $favorite): Response
    {
        $form = $this->createForm(FavoriteType::class, $favorite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('favorite_edit', ['id' => $favorite->getId()]);
        }

        return $this->render('favorite/edit.html.twig', [
            'favorite' => $favorite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="favorite_delete", methods="DELETE")
     */
    public function delete(Request $request, Favorite $favorite): Response
    {
        if ($this->isCsrfTokenValid('delete' . $favorite->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($favorite);
            $em->flush();
        }

        return $this->redirectToRoute('favorite_index');
    }
}
