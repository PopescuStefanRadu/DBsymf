<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Threads
 *
 * @ORM\Table(name="threads")
 * @ORM\Entity
 */
class Threads extends Posts
{

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastEditDateTime", type="datetime", nullable=true)
     */
    private $lasteditdatetime;

    /**
     * @var integer
     *
     * @ORM\Column(name="previousThreadVersion", type="integer", nullable=true)
     */
    private $previousthreadversion;

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Threads
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
     * Set lasteditdatetime
     *
     * @param \DateTime $lasteditdatetime
     *
     * @return Threads
     */
    public function setLasteditdatetime($lasteditdatetime)
    {
        $this->lasteditdatetime = $lasteditdatetime;

        return $this;
    }

    /**
     * Get lasteditdatetime
     *
     * @return \DateTime
     */
    public function getLasteditdatetime()
    {
        return $this->lasteditdatetime;
    }

    /**
     * Set previousthreadversion
     *
     * @param integer $previousthreadversion
     *
     * @return Threads
     */
    public function setPreviousthreadversion($previousthreadversion)
    {
        $this->previousthreadversion = $previousthreadversion;

        return $this;
    }

    /**
     * Get previousthreadversion
     *
     * @return integer
     */
    public function getPreviousthreadversion()
    {
        return $this->previousthreadversion;
    }
}
