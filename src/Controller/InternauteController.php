<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Habitat;
use App\Entity\ActiviteHabitat;
use App\Entity\User;
use App\Entity\Location;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
     * @Route("/historique/{id}", name="historique")
     */
    public function consulterHistorique()
    {
        $repository = $this->getDoctrine()->getRepository(Location::class);
        $historique = $repository->findBy(['statut' => 'En Attente' , 'idHabitat' => $id]
        );

    if (!$historique) {
        throw $this->createNotFoundException(
            'No product found for id '
        );
    }
        return $this->render('historique.html.twig', [
            'controller_name' => 'InternauteController', ['locations' => $historique]
        ]);
    }
    /**
     * @Route("/historiqueUser", name="historiqueUser")
     */
    public function consulterHistoriqueUser()
    {

        $repository = $this->getDoctrine()->getRepository(Location::class);
        $user = $this->getDoctrine()->getRepository(User::class)->find($this->getUser()->getId());
        $historique = $repository->findByIdUser($user);

    if (!$historique) {
        throw $this->createNotFoundException('No product found for id ');
    }
        return $this->render('reservationUser.html.twig', [
            'controller_name' => 'InternauteController', 'locations' => $historique  
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
