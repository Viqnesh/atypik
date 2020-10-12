<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\TypeHabitat;
use App\Entity\Propriete;
use App\Form\ProprieteType;


class GerantController extends AbstractController
{
    /**
     * @Route("/gerant", name="gerant")
     */
    public function index()
    {
        {

            return $this->render('backoff.html.twig');
        }
        
    }


        /**
     * @Route("/gererType/{id}", name="gererType")
     */
    public function gererType($id)
    {
        {

            $typehabitat= $this->getDoctrine()
            ->getRepository(TypeHabitat::class)
            ->find($id);

            $repository = $this->getDoctrine()->getRepository(Propriete::class);
            $proprietes = $repository->findBy(
                ['idTypeHabitat' => $id ]
            );

        if (!$typehabitat) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );


        }
            return $this->render('gerer.html.twig' , ['proprietes' => $proprietes , 'typehabitat' => $typehabitat ]);
        }
        
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