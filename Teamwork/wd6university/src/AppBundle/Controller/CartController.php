<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\courses;
use AppBundle\Entity\Users;
use Symfony\Component\HttpFoundation\Session\Session;

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
        // $session->clear();

    	$cartList = $session->get('cart');
        // var_dump($cartList);
    	$total = 0.00;
    	$i = 0;
    	foreach ($cartList as $value) {

    		$results[$value] = $this->getDoctrine()->getRepository('AppBundle:courses')->findOneBy(array('id' => $value));


    		// $total += $results->price;
    	}

        foreach ($results as $item) {
            $total += $item->getPrice();
        }

            // var_dump($results);

    		// get_object_var($results);

        $url = $_SERVER['REQUEST_URI'];
        return $this->render('pages/cart.html.twig', array('url' => $url, 'results' => $results, 'total' => $total));
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

}
