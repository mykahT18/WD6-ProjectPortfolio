<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Courses;

class LoadCourseData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
    	// 1
       	$course = new courses();

       	$course->setTitle('React 101');
       	$course->setDescription('This is a beginners React course!');
       	$course->setAuthor('Wes Bos');
        $course->setImg('http://127.0.0.1:8000/images/es6.png');
        $course->setPrice(10.00);

        $manager->persist($course);
        // 2
        $course = new courses();

       	$course->setTitle('Javascript ES6');
       	$course->setDescription('This course shows you the new features of ES6!');
       	$course->setAuthor('Jake Wendom');
        $course->setImg('http://127.0.0.1:8000/images/RFB1.png');
        $course->setPrice(12.00);

        $manager->persist($course);

        //3
        $course = new courses();

       	$course->setTitle('Getting started with Redux');
       	$course->setDescription('Managing state in an application is critical, and is often done haphazardly. Redux provides a state container for JavaScript applications that will help your applications behave consistently.');
       	$course->setAuthor('Dan Abramov');
        $course->setImg('http://127.0.0.1:8000/images/redux.png');
        $course->setPrice(11.00);

        $manager->persist($course);

        // 4
        $course = new courses();

       	$course->setTitle('Learn Git');
       	$course->setDescription('This course will show you basic workflow and core features, different ways to undo changes or save multiple versions of a project, and how to collaborate with other developers.');
       	$course->setAuthor('Code Acdemy');
        $course->setImg('http://127.0.0.1:8000/images/git.jpg');
        $course->setPrice(12.50);

        $manager->persist($course);
        // 5
        $course = new courses();

       	$course->setTitle('Learn Ruby on Rails');
       	$course->setDescription('Build 8 full-fledged web applications with Rails, one of the most popular and easy to use web application development frameworks. By the end of the course, you will get familiarity around Rails core concepts, like the MVC design pattern, and how to communicate with databases to persist data. Rails is a Ruby-based framework, and builds off knowledge from the Ruby course.');
       	$course->setAuthor('Code Acdemy');
        $course->setImg('http://127.0.0.1:8000/images/ruby.jpg');
        $course->setPrice(15.61);

        $manager->persist($course);
        // 6
        $course = new courses();

       	$course->setTitle('IOS Development Immersive');
       	$course->setDescription('Our new iOS Development Immersive program trains you in the code, design, and iteration skills you need to break into this competitive field.');
       	$course->setAuthor('Sarah Joan');
        $course->setImg('http://127.0.0.1:8000/images/ios.jpg');
        $course->setPrice(14.00);

        $manager->persist($course);
        // End
        $manager->flush();
    }
}