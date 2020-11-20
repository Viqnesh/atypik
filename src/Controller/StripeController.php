<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class StripeController extends AbstractController
{
    /**
     * @Route("/stripe", name="stripe")
     */
    public function index()
    {
        return $this->render('stripe/index.html.twig', [
            'controller_name' => 'StripeController',
        ]);
    }

        /**
     * @Route("/success", name="success")
     */
    public function success()
    {
        return $this->render('stripe/success.html.twig', [
            'controller_name' => 'StripeController',
        ]);
    }
        /**
     * @Route("/failed", name="failed")
     */
    public function failed()
    {
        return $this->render('stripe/failed.html.twig', [
            'controller_name' => 'StripeController',
        ]);
    }
        /**
     * @Route("/create-checkout", name="create-checkout")
     */
    public function checkout(Response $response)
    {
        \Stripe\Stripe::setApiKey('sk_test_51Hee2yJHgf7eKHPKBEGByNDQYoQVhXZico8knwYSOc3nfwxyiuAbzOLaVFSEY09JqMMaGlNNu6QJAQACN1nByybc00an0FeVe4');

        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
              'price_data' => [
                'currency' => 'usd',
                'unit_amount' => 2000,
                'product_data' => [
                  'name' => 'Stubborn Attachments',
                  'images' => ["https://i.imgur.com/EHyR2nP.png"],
                ],
              ],
              'quantity' => 1,
        ]],
    'mode' => 'payment',
    'success_url' => $this->generateUrl('success', [], UrlGeneratorInterface::ABSOLUTE_URL),
    'cancel_url' => $this->generateUrl('failed', [], UrlGeneratorInterface::ABSOLUTE_URL),
]);

$response->setContent(json_encode([
    'id' => $checkout_session
]));
$response->headers->set('Content-Type', 'application/json');
return $response ;

}
}
