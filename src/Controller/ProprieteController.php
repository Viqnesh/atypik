<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProprieteType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Propriete;


class ProprieteController extends AbstractController
{
    /**
     * @Route("/modifParam/{id}", name="modifParam")
     */
    public function modifParam($id, Request $request)
    {
                
        $propriete= $this->getDoctrine()
        ->getRepository(Propriete::class)
        ->find($id);

        $form = $this->createForm(ProprieteType::class, $propriete);
    
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $propriete = $form->getData();    
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
    
            return $this->redirectToRoute('gerant');
        }
    
        return $this->render('modifParam.html.twig' , [ 'propriete' => $propriete , 'form' => $form->createView(), ]);
    }

        /**
     * @Route("/supprParam/{id}", name="supprParam")
     */
    public function supprParam($id, Request $request)
    {
        $propriete= $this->getDoctrine()
        ->getRepository(Propriete::class)
        ->find($id);
        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($propriete);
        $entityManager->flush();
    
            return $this->redirectToRoute('gerant');
    }

        /**
     * @Route("/ajoutParam/{id}", name="ajoutParam")
     */
    public function ajouterUnParamètre($id, Request $request)
    {
        {
            $typehabitat= $this->getDoctrine()
            ->getRepository(TypeHabitat::class)
            ->find($id);
    
        if (!$typehabitat) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        $propriete = new Propriete();

        $form = $this->createForm(ProprieteType::class, $propriete);
    
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $propriete = $form->getData();
            $propriete->setIdTypeHabitat($typehabitat);
    
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($propriete);
            $entityManager->flush();


            return $this->redirectToRoute('gerant');
        }
        
            return $this->render('ajouter.html.twig' , ['typehabitat' => $typehabitat , 'form' => $form->createView(),]);
        }
        
    }

}
