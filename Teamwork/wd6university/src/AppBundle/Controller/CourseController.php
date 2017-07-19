<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\courses;
use AppBundle\Entity\User;
use FOS\UserBundle\Doctrine\UserManager;

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
     * @Route("/proasdasdfile", name="profiasdasdle")
     */
    // public function profileAction(Request $request)
    // {
    //     // $userManager = $container->get('fos_user.user_manager');

    //     $userId = $this->getUser()->getId();

    //     // $user = $this->findUserBy(array('id'=>$userId));
    //     $user = $this->getDoctrine()->getRepository('AppBundle:User')->findAll($userId);

    //     // var_dump($user);

    //    $user->getFavorite();
    //         // var_dump($fav);

    //     // $user->getFavorite();
    //     return $this->render('pages/dumbie.html.twig');
    // }


}
