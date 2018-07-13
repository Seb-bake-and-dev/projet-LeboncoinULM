<?php

namespace App\Controller;

use App\Entity\Announce;
use App\Entity\TypeUlm;
use App\Form\AnnounceType;
use App\Form\SearchPriceType;
use App\Form\SearchType;
use App\Repository\AnnounceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/announce")
 */
class AnnounceController extends Controller
{
    /**
     * @Route("/pendulaires", name="announce_pendulaires", methods="GET|POST")
     */
    public function index(AnnounceRepository $announceRepository, Request $request): Response
    {
        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $pendulaires = $em->getRepository(TypeUlm::class)->findBy(['Type' => 'Pendulaires']);
        $announces = $em->getRepository(Announce::class)->findBy(['Type' => $pendulaires]);

        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $announces,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 5)
        );

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $data = $form->getData();
            $modelSearch = $data['search'];
            $announces = $em->getRepository(Announce::class)->findAnnouncementsByModel($modelSearch);
            $paginator = $this->get('knp_paginator');
            $result = $paginator->paginate(
                $announces,
                $request->query->getInt('page', 1),
                $request->query->getInt('limit', 5));

            return $this->render('announce/pendulaires/index.html.twig', [
                'announces' => $result,
                'modelSearch' => $modelSearch,
                'form' => $form->createView(),
            ]);
        }

        return $this->render(
            'announce/pendulaires/index.html.twig',
            ['announces' => $result,
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/new", name="announce_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $announce = new Announce();
        $form = $this->createForm(AnnounceType::class, $announce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $announce->setDatePost(NEW \DateTime ('NOW'));
            $em->persist($announce);
            $em->flush();

            return $this->redirectToRoute('announce_pendulaires');
        }

        return $this->render('user/new.html.twig', [
            'announce' => $announce,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="announce_show", methods="GET")
     */
    public function show(Announce $announce): Response
    {
        return $this->render('announce/pendulaires/show.html.twig', ['announce' => $announce]);
    }

    /**
     * @Route("/{id}/edit", name="announce_edit", methods="GET|POST")
     */
    public function edit(Request $request, Announce $announce): Response
    {
        $form = $this->createForm(AnnounceType::class, $announce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('announce_edit', ['id' => $announce->getId()]);
        }

        return $this->render('announce/edit.html.twig', [
            'announce' => $announce,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="announce_delete", methods="DELETE")
     */
    public function delete(Request $request, Announce $announce): Response
    {
        if ($this->isCsrfTokenValid('delete' . $announce->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($announce);
            $em->flush();
        }

        return $this->redirectToRoute('announce_index');
    }
}
