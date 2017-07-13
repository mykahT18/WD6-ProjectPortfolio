<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use AppBundle\Entity\courses;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
      // example user
        $user = new User();
        $course = new courses();

        //$oneItemResult = $course->getDoctrine()->getRepository('AppBundle:courses')->find(38);

        $user->setUsername('master');
        $user->setPassword('password');
        $user->setEmail('master@gmail.com');

        $user->setPicture('http://127.0.0.1:8000/images/Grant_Gustin.png');

        // $user->addCourse($oneItemResult);

        $manager->persist($user);
        $manager->flush();
    }
}
