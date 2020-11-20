<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Habitat;
use App\Entity\ActiviteHabitat;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class InternauteController extends AbstractController
{
    /**
     * @Route("/internaute", name="internaute")
     */
    public function index()
    {
        $habitat = new Habitat() ;
        $activite = new ActiviteHabitat();
        return $this->render('dashboard.html.twig', [
            'habitat' => $habitat , 'activite' => $activite
        ]);
    }


    /**
     * @Route("/historique", name="historique")
     */
    public function consulterHistorique($idHabitat)
    {
        $repository = $this->getDoctrine()->getRepository(Location::class);

        $historique = $repository->find($idHabitat);
        $historique = $repository->findByStatut('Validé');

    if (!$historique) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }
        return $this->render('historique.html.twig', [
            'controller_name' => 'InternauteController',
        ]);
    }
    /**
     * @Route("/historiqueUser", name="historiqueUser")
     */
    public function consulterHistoriqueUser($idUser)
    {
        $repository = $this->getDoctrine()->getRepository(Location::class);

        $historique = $repository->find($idUser);
        $historique = $repository->findByStatut('Validé');

    if (!$historique) {
        throw $this->createNotFoundException(
            'No product found for id '.$idUser
        );
    }
        return $this->render('historique.html.twig', [
            'controller_name' => 'InternauteController',
        ]);
    }

        /**
     * @Route("/gerer", name="gerer")
     */
    public function gererReservation($idHabitat)
    {
        $repository = $this->getDoctrine()->getRepository(Location::class);

        $historique = $repository->find($idHabitat);
        $historique = $repository->findByStatut('En Attente');

    if (!$location) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }
        return $this->render('gererLocation.html.twig', [
            'controller_name' => 'InternauteController',
        ]);
    }

    
        /**
     * @Route("/valider/", name="valider")
     */
    public function valider($idLocation)
    {
        $repository = $this->getDoctrine()->getManager();
        $location = $repository->getRepository(Location::class)->find($idLocation);
    
        if (!$location) {
            throw $this->createNotFoundException(
                'No product found for id '.$idLocation
            );
        }
    
        $location->setStatut('Validé');
        $repository->flush();
    
        return $this->redirectToRoute('gerer');
    }

    
}
