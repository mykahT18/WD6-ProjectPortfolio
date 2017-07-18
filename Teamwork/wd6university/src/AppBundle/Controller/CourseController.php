<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\courses;
use AppBundle\Entity\User;

class CourseController extends Controller
{
    /**
     * @Route("/", name="course")
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();
        // $session->clear();
        $results = $this->getDoctrine()->getRepository('AppBundle:courses')->findAll();

        return $this->render('pages/index.html.twig', array('home' => '', 'results' => $results));
    }

    /**
     * @Route("/single/{id}", name="single-course")
     */
    public function singleAction($id, Request $request)
    {

   //      $em = $this->getDoctrine()->getManager();
        $course = $this->getDoctrine()->getRepository('AppBundle:courses')->find($id);
        // var_dump($course);

        return $this->render('pages/single.html.twig', array('course' => $course));
    }


    /**
     * @Route("/profile", name="profile")
     */
    public function profileAction(Request $request)
    {
        // $userId = $this->getUser()->getId();
        // $user = $this->getDoctrine()->getRepository('AppBundle:User')->findAll($userId);
        // var_dump($userId);
        // $user->getCourse();
        return $this->render('pages/profile.html.twig');
    }


}
