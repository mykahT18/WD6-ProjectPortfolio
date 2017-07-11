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
        // replace this example code with whatever you need
        return $this->render('pages/index.html.twig');
    }

    /**
     * @Route("/single", name="single-course")
     */
    public function singleAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('pages/single.html.twig');
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('pages/login.html.twig');
    }
}
