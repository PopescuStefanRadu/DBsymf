<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Comments
 *
 * @ORM\Table(name="comments", indexes={@ORM\Index(name="FK_C_U_user_idx", columns={"user"})})
 * @ORM\Entity
 */
class Comments {

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=10000, nullable=false)
     */
    private $content;

    /**
     * @var integer
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Comments", inversedBy="childcomment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parentcomment", referencedColumnName="x", nullable=true)
     * })
     */
    private $parentcomment;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Comments", mappedBy="parentcomment")
     */
    private $childcomment;

    public function getChildcomment() {
        return $this->childcomment;
    }

    public function __construct() {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getParentcomment() {
        return $this->parentcomment;
    }

    public function setParentcomment(\AppBundle\Entity\Comments $parentcomment = null) {
        $this->parentcomment = $parentcomment;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Comments
     */
    public function setContent($content) {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * Get x
     *
     * @return integer
     */
    public function getX() {
        return $this->x;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\Users $user
     *
     * @return Comments
     */
    public function setUser(\AppBundle\Entity\Users $user = null) {
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

}
