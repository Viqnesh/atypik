<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PaiementController extends AbstractController
{
    /**
     * @Route("/paiement", name="paiement")
     */
    public function index()
    {

        $stripe = new \Stripe\StripeClient('sk_test_51Hee2yJHgf7eKHPKBEGByNDQYoQVhXZico8knwYSOc3nfwxyiuAbzOLaVFSEY09JqMMaGlNNu6QJAQACN1nByybc00an0FeVe4');
        $customer = $stripe->customers->create([
        'description' => 'example customer',
        'email' => 'email@example.com',
        'payment_method' => 'pm_card_visa',
]);

        return $this->render('paiement/index.html.twig', [
            'controller_name' => 'PaiementController', 'customer' => $customer
        ]);
    }
}
