<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Posts
 *
 * @ORM\Table(name="posts", indexes={@ORM\Index(name="FK_P_U_user_idx", columns={"user"}), @ORM\Index(name="FK_P_NavL_navigationLink_idx", columns={"navigationLink"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostsRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"thread" = "Threads", "imagegallery" = "Imagegalleries"})
 */
abstract class Posts {

    /**
     * @var int
     *
     * @ORM\Column(name="x", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $x;

    /**
     * @var \AppBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="x", nullable=false)
     * })
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=false)
     */
    private $title;

    /**
     * @Assert\Range(
     *      min = "2016/02/01"
     * )
     * 
     * @var \DateTime
     *
     * @ORM\Column(name="dateTime", type="datetime", nullable=false)
     */
    private $dateTime;

    /**
     * @var \AppBundle\Entity\Navigationlinks
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Navigationlinks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="navigationLink", referencedColumnName="x")
     * })
     */
    private $navigationlink;

    /**
     * @var AppBundle\Entity\TagsPosts
     * 
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\TagsPosts", mappedBy="post")
     */
    private $postTagsList;
    
    private $tags;

    public function __construct() {
        $this->postTagsList = new ArrayCollection();
    }

    public function getPostTagsList() {
        return $this->postTagsList;
    }

    public function setTags($tags) {
        $this->tags = $tags;
    }

    public function getTags() {
        return $this->tags;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getX() {
        return $this->x;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\Users $user
     *
     * @return Posts
     */
    public function setUser($user) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\Users
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Posts
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set dateTime
     *
     * @param \DateTime $dateTime
     *
     * @return Posts
     */
    public function setDateTime($dateTime) {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get dateTime
     *
     * @return \DateTime
     */
    public function getDateTime() {
        return $this->dateTime;
    }

    /**
     * Set navigationLink
     *
     * @param \AppBundle\Entity\Navigationlinks $navigationlink
     *
     * @return Posts
     */
    public function setNavigationlink($navigationlink) {
        $this->navigationlink = $navigationlink;

        return $this;
    }

    /**
     * Get navigationlink
     *
     * @return \AppBundle\Entity\Navigationlinks
     */
    public function getNavigationlink() {
        return $this->navigationlink;
    }

}
