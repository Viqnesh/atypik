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

    
}
