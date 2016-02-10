<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Navigationlinks
 *
 * @ORM\Table(name="navigationlinks", uniqueConstraints={@ORM\UniqueConstraint(name="navlink_URL_UNIQUE",columns={"url"})})
 * @ORM\Entity
 */
class Navigationlinks extends Navigationitems {

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="URL", type="string", length=100, nullable=false)
     */
    private $url;

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Navigationlinks
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
     * @return Navigationlinks
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
