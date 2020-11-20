<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BraintreeController extends AbstractController
{
    /**
     * @Route("/checkout", name="checkout")
     */
    public function index()
    {



        return $this->render('braintree/index.html.twig', [
            'controller_name' => 'BraintreeController',
        ]);
    }
}
