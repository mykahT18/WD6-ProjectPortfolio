<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\courses;

class CourseController extends Controller
{
    /**
     * @Route("/", name="course")
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();
        $results = $this->getDoctrine()->getRepository('AppBundle:courses')->findAll();

        return $this->render('pages/index.html.twig', array('home' => '', 'results' => $results));
    }

    /**
     * @Route("/single", name="single-course")
     */
    public function singleAction(Request $request)
    {
        return $this->render('pages/single.html.twig');
    }


    /**
     * @Route("/profile", name="profile")
     */
    public function profileAction(Request $request)
    {
        return $this->render('pages/profile.html.twig');
    }


}
