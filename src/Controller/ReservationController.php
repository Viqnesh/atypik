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

use App\Entity\Habitat;
use App\Entity\ActiviteHabitat;

use App\Form\HabitatType;

class ReservationController extends AbstractController
{
    /**
     * @Route("/ajoutBien", name="ajoutBien")
     */
    public function index(Request $request)
    {

        {
        
        $habitat = new Habitat();
        $idProprietaire = 1 ;
        $form = $this->createForm(HabitatType::class, $habitat);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $habitat = $form->getData();
            $habitat->setIdProprietaire($idProprietaire);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($habitat);
            $entityManager->flush();
    

        }
        return $this->render('ajoutBien.html.twig' , ['habitat' => $habitat , 'form' => $form->createView(),  'controller_name' => 'ReservationController']);

        }

}

}
