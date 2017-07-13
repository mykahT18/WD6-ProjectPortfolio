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
        // $session->clear();
        $url = $_SERVER['REQUEST_URI'];
        $results = $this->getDoctrine()->getRepository('AppBundle:courses')->findAll();

        return $this->render('pages/index.html.twig', array('url' => $url, 'results' => $results));
    }

    /**
     * @Route("/single", name="single-course")
     */
    public function singleAction(Request $request)
    {
        $url = $_SERVER['REQUEST_URI'];
        return $this->render('pages/single.html.twig', array('url' => $url));
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $url = $_SERVER['REQUEST_URI'];
        return $this->render('pages/login.html.twig', array('url' => $url));
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function profileAction(Request $request)
    {
        $url = $_SERVER['REQUEST_URI'];
        return $this->render('pages/profile.html.twig', array('url' => $url));
    }


}
