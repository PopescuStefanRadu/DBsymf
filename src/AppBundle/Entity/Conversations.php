<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Conversations
 *
 * @ORM\Table(name="conversations", indexes={@ORM\Index(name="FK_Conv_U_user1_idx", columns={"user1"}), @ORM\Index(name="FK_Conv_U_user2_idx", columns={"user2"})})
 * @ORM\Entity
 */
class Conversations
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     */
    private $title;

    /**
     * @Assert\Range(
     *      min = "2016/02/01"
     * )
     * @var \DateTime
     *
     * @ORM\Column(name="dateTime", type="datetime", nullable=false)
     */
    private $datetime;

    /**
     * @var integer
     *
     * @ORM\Column(name="user1unseen", type="integer", nullable=true)
     */
    private $user1unseen;

    /**
     * @var integer
     *
     * @ORM\Column(name="user2unseen", type="integer", nullable=true)
     */
    private $user2unseen;

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
     *   @ORM\JoinColumn(name="user2", referencedColumnName="x", nullable=false)
     * })
     */
    private $user2;

    /**
     * @var \AppBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user1", referencedColumnName="x", nullable=false)
     * })
     */
    private $user1;



    /**
     * Set title
     *
     * @param string $title
     *
     * @return Conversations
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return Conversations
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set user1unseen
     *
     * @param integer $user1unseen
     *
     * @return Conversations
     */
    public function setUser1unseen($user1unseen)
    {
        $this->user1unseen = $user1unseen;

        return $this;
    }

    /**
     * Get user1unseen
     *
     * @return integer
     */
    public function getUser1unseen()
    {
        return $this->user1unseen;
    }

    /**
     * Set user2unseen
     *
     * @param integer $user2unseen
     *
     * @return Conversations
     */
    public function setUser2unseen($user2unseen)
    {
        $this->user2unseen = $user2unseen;

        return $this;
    }

    /**
     * Get user2unseen
     *
     * @return integer
     */
    public function getUser2unseen()
    {
        return $this->user2unseen;
    }

    /**
     * Get x
     *
     * @return integer
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Set user2
     *
     * @param \AppBundle\Entity\Users $user2
     *
     * @return Conversations
     */
    public function setUser2(\AppBundle\Entity\Users $user2 = null)
    {
        $this->user2 = $user2;

        return $this;
    }

    /**
     * Get user2
     *
     * @return \AppBundle\Entity\Users
     */
    public function getUser2()
    {
        return $this->user2;
    }

    /**
     * Set user1
     *
     * @param \AppBundle\Entity\Users $user1
     *
     * @return Conversations
     */
    public function setUser1(\AppBundle\Entity\Users $user1 = null)
    {
        $this->user1 = $user1;

        return $this;
    }

    /**
     * Get user1
     *
     * @return \AppBundle\Entity\Users
     */
    public function getUser1()
    {
        return $this->user1;
    }
}
