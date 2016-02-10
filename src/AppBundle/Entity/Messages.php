<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Messages
 *
 * @ORM\Table(name="messages", indexes={@ORM\Index(name="FK_Msg_Conv_conversation_idx", columns={"conversation"}), @ORM\Index(name="FK_Msg_U_user_idx", columns={"user"})})
 * @ORM\Entity
 */
class Messages
{
    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=500, nullable=false)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateTime", type="datetime", nullable=false)
     */
    private $datetime;

    /**
     * @Assert\Range(
     *      min = "2016/02/01"
     * )
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
     * @var \AppBundle\Entity\Conversations
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Conversations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="conversation", referencedColumnName="x", nullable=false)
     * })
     */
    private $conversation;



    /**
     * Set content
     *
     * @param string $content
     *
     * @return Messages
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return Messages
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
     * Get x
     *
     * @return integer
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\Users $user
     *
     * @return Messages
     */
    public function setUser(\AppBundle\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\Users
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set conversation
     *
     * @param \AppBundle\Entity\Conversations $conversation
     *
     * @return Messages
     */
    public function setConversation(\AppBundle\Entity\Conversations $conversation = null)
    {
        $this->conversation = $conversation;

        return $this;
    }

    /**
     * Get conversation
     *
     * @return \AppBundle\Entity\Conversations
     */
    public function getConversation()
    {
        return $this->conversation;
    }
}
