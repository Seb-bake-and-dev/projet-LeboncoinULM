<?php

namespace App\Controller;

use App\Entity\FMessage;
use App\Form\FMessageType;
use App\Repository\FMessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/f/message")
 */
class FMessageController extends Controller
{
    /**
     * @Route("/", name="f_message_index", methods="GET")
     */
    public function index(FMessageRepository $fMessageRepository): Response
    {
        return $this->render('f_message/index.html.twig', ['f_messages' => $fMessageRepository->findAll()]);
    }

    /**
     * @Route("/new", name="f_message_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $fMessage = new FMessage();
        $form = $this->createForm(FMessageType::class, $fMessage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fMessage);
            $em->flush();

            return $this->redirectToRoute('f_message_index');
        }

        return $this->render('f_message/new.html.twig', [
            'f_message' => $fMessage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="f_message_show", methods="GET")
     */
    public function show(FMessage $fMessage): Response
    {
        return $this->render('f_message/show.html.twig', ['f_message' => $fMessage]);
    }

    /**
     * @Route("/{id}/edit", name="f_message_edit", methods="GET|POST")
     */
    public function edit(Request $request, FMessage $fMessage): Response
    {
        $form = $this->createForm(FMessageType::class, $fMessage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('f_message_edit', ['id' => $fMessage->getId()]);
        }

        return $this->render('f_message/edit.html.twig', [
            'f_message' => $fMessage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="f_message_delete", methods="DELETE")
     */
    public function delete(Request $request, FMessage $fMessage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fMessage->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fMessage);
            $em->flush();
        }

        return $this->redirectToRoute('f_message_index');
    }
}
