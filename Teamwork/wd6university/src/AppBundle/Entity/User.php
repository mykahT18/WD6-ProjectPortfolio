<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Many User have Many Courses.
     * @ORM\ManyToMany(targetEntity="courses")
     * @ORM\JoinTable(name="user_courses",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="courses_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $course;

     /**
     * Many User have Many Courses.
     * @ORM\ManyToMany(targetEntity="courses")
     * @ORM\JoinTable(name="user_favorites",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="courses_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $favorie;



    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255, nullable=true)
     */
    private $picture;




    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return User
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
     * Add course
     *
     * @param \AppBundle\Entity\courses $course
     *
     * @return User
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

    /**
     * Add favorie
     *
     * @param \AppBundle\Entity\courses $favorie
     *
     * @return User
     */
    public function addFavorie(\AppBundle\Entity\courses $favorie)
    {
        $this->favorie[] = $favorie;

        return $this;
    }

    /**
     * Remove favorie
     *
     * @param \AppBundle\Entity\courses $favorie
     */
    public function removeFavorie(\AppBundle\Entity\courses $favorie)
    {
        $this->favorie->removeElement($favorie);
    }

    /**
     * Get favorie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFavorie()
    {
        return $this->favorie;
    }
}
