<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Commentaire ;
use App\Form\CommentaireType;



class CommentaireController extends AbstractController
{
    /**
     * @Route("/commentaire", name="commentaire")
     */
    public function index()
    {
       // 1) build the form
       $commentaire = new Commentaire();
       $form = $this->createForm(CommentaireType::class, $commentaire);

       // 2) handle the submit (will only happen on POST)
       $form->handleRequest($request);
       if ($form->isSubmitted() && $form->isValid()) {

           $commentaire = $form->getData();
           $entityManager = $this->getDoctrine()->getManager();
           $entityManager->persist($commentaire);
           $entityManager->flush();

           return $this->redirectToRoute('dashboard');
       }
        return $this->render('commentaire/index.html.twig', [
            'controller_name' => 'CommentaireController',
        ]);
    }
}
