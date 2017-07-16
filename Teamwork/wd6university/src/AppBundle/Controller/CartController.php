<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\courses;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\Form\Extension\Core\Type\HiddenType;

/**
 * Cart Controller
 *
 * @Route("cart")
 */
class CartController extends Controller
{
    /**
     * @Route("/addCart/{id}", name="add_cart")
     */
    public function indexAction($id, Request $request)
    {
   //      $user = new Users();
   //      $em = $this->getDoctrine()->getManager();
 		// $courseId = $this->getDoctrine()->getRepository('AppBundle:courses')->find($id);
   //      var_dump($courseId);
   //      $user->addCourseId($courseId);
   //      $em->persist($user);
   //      $em->flush();
 		// Getting session
		$session = $request->getSession();

		$cartList = $session->get('cart');

		$cartList[$id] = $id;

		$session->set('cart', $cartList);


        return $this->redirect('/');

    }
     /**
     * @Route("/", name="cart_view")
     */
    public function cartAction(Request $request)
    {
    	$session = $request->getSession();

    	$cartList = $session->get('cart');
        // var_dump($cartList);
    	$total = 0.00;
    	$i = 0;
    	foreach ($cartList as $value) {
    		$results[$value] = $this->getDoctrine()->getRepository('AppBundle:courses')->findOneBy(array('id' => $value));
    	}

      foreach ($results as $item) {
          $total += $item->getPrice();
      }

      $session->set('total', $total);

      $url = $_SERVER['REQUEST_URI'];
      return $this->render('pages/cart.html.twig', array('url' => $url, 'results' => $results, 'total' => $session->get('total') ) );
    }
    /**
     * @Route("/del/{id}", name="cart_delete")
     */
    public function deleteAction($id, Request $request){
    	$session = $request->getSession();
    	$cartList = $session->get('cart');

    	unset($cartList[$id]);
        var_dump($cartList);
         return $this->redirectToRoute('cart_view');
    }


    /**
     * @Route("/checkout", name="checkout")
     */
    public function checkoutAction(Request $request){

      var_dump($request->get('total'));
      return $this->render('pages/checkout.html.twig');


    }

    /**
     * @Route("/charge", name="charge")
     */
    public function charge(Request $request){
      $stripeClient = $this->get('flosch.stripe.client');

      /**
       * $chargeAmount (int)              : The charge amount in cents, for instance 1000 for 10.00 (of the currency)
       * $chargeCurrency (string)         : The charge currency (for instance, "eur")
       * $paymentToken (string)           : The payment token obtained using the Stripe.js library
       * $stripeAccountId (string|null)   : (optional) The connected string account ID, default null (--> charge to the platform)
       * $applicationFee (int)            : The amount of the application fee (in cents), default to 0
       * $chargeDescription (string)      : (optional) The charge description for the customer
       */


        $chargeAmount = $request->get('total');
        $chargeCurrency = 'USD';
        $paymentToken = $request->get('StripeToken');
        // $stripeAccountId = "ca_B1FLHhIXQiD5QkHDwHbF9Os5emNjIHUN";
        $chargeDescription = 'Payment TEST';



      $stripeClient->createCharge($chargeAmount, $chargeCurrency, $paymentToken, $chargeDescription);

      var_dump($request->get('total'));

    }

}
