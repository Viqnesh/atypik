<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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





}