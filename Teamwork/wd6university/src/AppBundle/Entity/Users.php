<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;


/**
 * Users
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsersRepository")
 */
class Users extends BaseUser
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Many User have Many Courses.
     * @ORM\ManyToMany(targetEntity="courses")
     * @ORM\JoinTable(name="users_courses",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="courses_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $course_id;


    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255, nullable=true)
     */
    private $picture;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }




    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return Users
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->course = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add course
     *
     * @param \AppBundle\Entity\courses $course
     *
     * @return Users
     */
    public function addCourse(\AppBundle\Entity\courses $course)
    {
        $this->course[] = $course;

        return $this;
    }

    /**
     * Remove course
     *
     * @param \AppBundle\Entity\courses $course
     */
    public function removeCourse(\AppBundle\Entity\courses $course)
    {
        $this->course->removeElement($course);
    }

    /**
     * Get course
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCourse()
    {
        return $this->course;
    }
}
