<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Habitat;
use App\Form\HabitatType;
use App\Form\PlanningType;

use Symfony\Component\HttpFoundation\Request;


class HabitatController extends AbstractController
{
    /**
     * @Route("/gererhabitat/", name="gererhabitat")
     */
    public function index()
    {
        $this->addFlash(
            'notice',
            'Your changes were saved!'
        );
        return $this->render('habitatUser.html.twig', [
            
        ]);
    }

        /**
     * @Route("/ajoutHabitat", name="ajoutHabitat")
     */
    public function ajoutHabitat(Request $request)
    {        // 1) build the form
        $habitat = new Habitat();
        $form = $this->createForm(HabitatType::class, $habitat);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($habitat);
            $entityManager->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            
        }
        return $this->render('ajoutBien.html.twig', [
            'form' => $form->createView()
        ]);
    }


}
