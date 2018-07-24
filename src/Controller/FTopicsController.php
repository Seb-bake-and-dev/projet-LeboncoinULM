<?php

namespace App\Controller;

use App\Entity\FTopics;
use App\Form\FTopicsType;
use App\Repository\FTopicsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/f/topics")
 */
class FTopicsController extends Controller
{
    /**
     * @Route("/", name="f_topics_index", methods="GET")
     */
    public function index(FTopicsRepository $fTopicsRepository): Response
    {
        return $this->render('f_topics/index.html.twig', ['f_topics' => $fTopicsRepository->findAll()]);
    }

    /**
     * @Route("/new", name="f_topics_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $fTopic = new FTopics();
        $form = $this->createForm(FTopicsType::class, $fTopic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $fTopic->setCreator($this->getUser());
            $fTopic->setDatePost(new \DateTime('NOW'));
            $em->persist($fTopic);
            $em->flush();

            return $this->redirectToRoute('f_topics_index');
        }

        return $this->render('f_topics/new.html.twig', [
            'f_topic' => $fTopic,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="f_topics_show", methods="GET")
     */
    public function show(FTopics $fTopic): Response
    {
        return $this->render('f_topics/show.html.twig', ['f_topic' => $fTopic]);
    }

    /**
     * @Route("/{id}/edit", name="f_topics_edit", methods="GET|POST")
     */
    public function edit(Request $request, FTopics $fTopic): Response
    {
        $form = $this->createForm(FTopicsType::class, $fTopic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('f_topics_edit', ['id' => $fTopic->getId()]);
        }

        return $this->render('f_topics/edit.html.twig', [
            'f_topic' => $fTopic,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="f_topics_delete", methods="DELETE")
     */
    public function delete(Request $request, FTopics $fTopic): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fTopic->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fTopic);
            $em->flush();
        }

        return $this->redirectToRoute('f_topics_index');
    }
}
