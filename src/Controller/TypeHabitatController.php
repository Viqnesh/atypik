<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\TypeHabitat;


class TypeHabitatController extends AbstractController
{
    /**
     * @Route("/typehabitat", name="typehabitat")
     */
    public function habitat()
    {
        {

        $typehabitat = $this->getDoctrine()->getRepository(TypeHabitat::class)->findAll();
        return $this->render('habitat.html.twig' , [ 'typehabitat' => $typehabitat ]);

        }
        
    }

    
}
