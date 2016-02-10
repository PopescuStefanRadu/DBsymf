<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imagegalleries
 *
 * @ORM\Table(name="imagegalleries")
 * @ORM\Entity
 */
class Imagegalleries extends Posts

{

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Imagegalleries
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
}
