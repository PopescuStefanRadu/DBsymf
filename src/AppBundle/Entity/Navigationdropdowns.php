<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Navigationdropdowns
 *
 * @ORM\Table(name="navigationdropdowns")
 * @ORM\Entity
 */
class Navigationdropdowns extends Navigationitems {

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="URL", type="string", length=300, nullable=true)
     */
    private $url;

    /**
     * @var AppBundle\Entity\NavigationlinksNavigationdropdowns 
     * 
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\NavigationlinksNavigationdropdowns", mappedBy="navigationdropdown")
     */
    private $dropdownlinklist;

    public function __construct() {
        $this->dropdownlinklist = new ArrayCollection();
    }

    public function getDropdownlinklist() {
        return $this->dropdownlinklist;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Navigationdropdowns
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
     * Set url
     *
     * @param string $url
     *
     * @return Navigationdropdowns
     */
    public function setUrl($url) {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

}
