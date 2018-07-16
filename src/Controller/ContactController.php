<?php

namespace App\Controller;

use App\Entity\Announce;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact/{id}", name="contact" , methods="GET|POST")
     */
    public function index(Request $request, \Swift_Mailer $mailer, Announce $announce)
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);
        $contact = $this->getUser()->getEmail();

        if ($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();
            $message = (new \Swift_Message('You Got Mail!'))
                ->setFrom($contactFormData['from'])
                ->setTo($contact)
                ->setBody(
                    $contactFormData['message'],
                    'text/plain'
                );

            $mailer->send($message);

            return $this->redirectToRoute('contact', ['id' => $announce->getId()]);
        }

        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView(),
            'announce'=>$announce,
        ]);
    }

}
