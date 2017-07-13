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

		$cartList[] = $id;

		$session->set('cart', $cartList);
		
        $url = $_SERVER['REQUEST_URI'];
    	$results = $this->getDoctrine()->getRepository('AppBundle:courses')->findAll();
        return $this->render('pages/index.html.twig', array('url' => $url, 'results' => $results ));
    }


}
