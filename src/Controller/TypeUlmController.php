<?php

namespace App\Controller;

use App\Entity\TypeUlm;
use App\Form\TypeUlmType;
use App\Repository\TypeUlmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/ulm")
 */
class TypeUlmController extends Controller
{
    /**
     * @Route("/", name="type_ulm_index", methods="GET")
     */
    public function index(TypeUlmRepository $typeUlmRepository): Response
    {
        return $this->render('type_ulm/index.html.twig', ['type_ulms' => $typeUlmRepository->findAll()]);
    }

    /**
     * @Route("/new", name="type_ulm_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $typeUlm = new TypeUlm();
        $form = $this->createForm(TypeUlmType::class, $typeUlm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeUlm);
            $em->flush();

            return $this->redirectToRoute('type_ulm_index');
        }

        return $this->render('type_ulm/new.html.twig', [
            'type_ulm' => $typeUlm,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_ulm_show", methods="GET")
     */
    public function show(TypeUlm $typeUlm): Response
    {
        return $this->render('type_ulm/show.html.twig', ['type_ulm' => $typeUlm]);
    }

    /**
     * @Route("/{id}/edit", name="type_ulm_edit", methods="GET|POST")
     */
    public function edit(Request $request, TypeUlm $typeUlm): Response
    {
        $form = $this->createForm(TypeUlmType::class, $typeUlm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_ulm_edit', ['id' => $typeUlm->getId()]);
        }

        return $this->render('type_ulm/edit.html.twig', [
            'type_ulm' => $typeUlm,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_ulm_delete", methods="DELETE")
     */
    public function delete(Request $request, TypeUlm $typeUlm): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeUlm->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeUlm);
            $em->flush();
        }

        return $this->redirectToRoute('type_ulm_index');
    }
}
