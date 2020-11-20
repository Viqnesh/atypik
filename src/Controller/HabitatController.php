<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Habitat;
use App\Entity\User;
use App\Entity\TypeHabitat;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Validator\Constraints\DateTime ;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use App\Form\HabitatType;
use App\Form\PlanningType;

use Symfony\Component\HttpFoundation\Request;


class HabitatController extends AbstractController
{
    /**
     * @Route("/gererHabitat", name="gererHabitat")
     */
    public function index()
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($this->getUser()->getId());
        $repository = $this->getDoctrine()->getRepository(Habitat::class);
        $historique = $repository->findById('Validé');

        $habitat = $repository->findByProprietaire(
            ['proprietaire' => $user ]
        );
        return $this->render('habitatUser.html.twig', [ 'habitats' => $habitat

        ]);
    }

        /**
     * @Route("/ajoutHabitat", name="ajoutHabitat")
     */
    public function ajoutHabitat(Request $request)
    {        // 1) build the form
        $user = $this->getDoctrine()->getRepository(User::class)->find($this->getUser()->getId());
        $type = $this->getDoctrine()->getRepository(TypeHabitat::class)->find(11);

        $habitat = new Habitat();
        $habitat->setProprietaire($user);
        $habitat->setidTypeHabitat($type);
        $habitat->setDatePublication(date_create(date('Y-m-d H:00:00')));
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
            $this->addFlash(
                'notice',
                'Vous avez ajouté un habitat'
            );
            return $this->redirectToRoute('internaute');

            
        }
        return $this->render('ajoutBien.html.twig', [
            'form' => $form->createView()
        ]);
    }


}
