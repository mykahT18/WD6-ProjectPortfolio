<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\courses;



class ProfileController extends BaseController
{

  public function showAction()
  {


      $user = $this->getUser();
      if (!is_object($user) || !$user instanceof UserInterface) {
          throw new AccessDeniedException('This user does not have access to this section.');
      }
      $course = new courses();

      $userId = $this->getUser()->getId();
      $user = $this->getDoctrine()->getRepository('AppBundle:User')->findOneById($userId);
      
      $result = $user->getFavorite();
      // var_dump($result);
       // foreach ($result as $value) {

       //          $result[$value] = $this->getDoctrine()->getRepository('AppBundle:courses')->findOneBy(array('id' => $value));
       //  }

      // var_dump($user);
      return $this->render('@FOSUser/Profile/show.html.twig', array('user' => $user, 'result' => $result) );
  }
}
