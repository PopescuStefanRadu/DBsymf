<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Relationships
 *
 * @ORM\Table(name="relationships",uniqueConstraints={@ORM\UniqueConstraint(name="relationship_title_UNIQUE",columns={"title"})})
 * @ORM\Entity
 */
class Relationships
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=300, nullable=true)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bidirectional", type="boolean", nullable=false)
     */
    private $bidirectional;

    /**
     * @var integer
     *
     * @ORM\Column(name="x", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $x;



    /**
     * Set title
     *
     * @param string $title
     *
     * @return Relationships
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
     * Set description
     *
     * @param string $description
     *
     * @return Relationships
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set bidirectional
     *
     * @param boolean $bidirectional
     *
     * @return Relationships
     */
    public function setBidirectional($bidirectional)
    {
        $this->bidirectional = $bidirectional;

        return $this;
    }

    /**
     * Get bidirectional
     *
     * @return boolean
     */
    public function getBidirectional()
    {
        return $this->bidirectional;
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
}
