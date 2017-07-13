<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CourseController extends Controller
{
    /**
     * @Route("/", name="course")
     */
    public function indexAction(Request $request)
    {
      return $this->render('pages/index.html.twig', array('home' => ''));
    }

    /**
     * @Route("/single", name="single-course")
     */
    public function singleAction(Request $request)
    {
        return $this->render('pages/single.html.twig');
    }


    /**
     * @Route("/cart", name="cart")
     */
    public function cartAction(Request $request)
    {
        return $this->render('pages/cart.html.twig');
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function profileAction(Request $request)
    {
        return $this->render('pages/profile.html.twig');
    }


}
