<?php

namespace App\Controller;

use App\Entity\FCategorie;
use App\Form\FCategorieType;
use App\Repository\FCategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/f/categorie")
 */
class FCategorieController extends Controller
{
    /**
     * @Route("/", name="f_categorie_index", methods="GET")
     */
    public function index(FCategorieRepository $fCategorieRepository): Response
    {
        return $this->render('f_categorie/index.html.twig', ['f_categories' => $fCategorieRepository->findAll()]);
    }

    /**
     * @Route("/new", name="f_categorie_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $fCategorie = new FCategorie();
        $form = $this->createForm(FCategorieType::class, $fCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fCategorie);
            $em->flush();

            return $this->redirectToRoute('f_categorie_index');
        }

        return $this->render('f_categorie/new.html.twig', [
            'f_categorie' => $fCategorie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="f_categorie_show", methods="GET")
     */
    public function show(FCategorie $fCategorie): Response
    {
        return $this->render('f_categorie/show.html.twig', ['f_categorie' => $fCategorie]);
    }

    /**
     * @Route("/{id}/edit", name="f_categorie_edit", methods="GET|POST")
     */
    public function edit(Request $request, FCategorie $fCategorie): Response
    {
        $form = $this->createForm(FCategorieType::class, $fCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('f_categorie_edit', ['id' => $fCategorie->getId()]);
        }

        return $this->render('f_categorie/edit.html.twig', [
            'f_categorie' => $fCategorie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="f_categorie_delete", methods="DELETE")
     */
    public function delete(Request $request, FCategorie $fCategorie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fCategorie->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fCategorie);
            $em->flush();
        }

        return $this->redirectToRoute('f_categorie_index');
    }
}
