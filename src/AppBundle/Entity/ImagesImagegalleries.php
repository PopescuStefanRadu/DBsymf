<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImagesImagegalleries
 *
 * @ORM\Table(name="images_imagegalleries", uniqueConstraints={@ORM\UniqueConstraint(name="image_imagegallery_UNIQUE", columns={"imagegallery", "image"})}, indexes={@ORM\Index(name="FK_IIG_IG_imageGallery_idx", columns={"imageGallery"}), @ORM\Index(name="FK_IIG_I_image_idx", columns={"image"})})
 * @ORM\Entity
 */
class ImagesImagegalleries
{
    /**
     * @var integer
     *
     * @ORM\Column(name="x", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $x;

    /**
     * @var \AppBundle\Entity\Images
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Images")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="image", referencedColumnName="x", nullable=false)
     * })
     */
    private $image;

    /**
     * @var \AppBundle\Entity\Imagegalleries
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Imagegalleries")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="imageGallery", referencedColumnName="x", nullable=false)
     * })
     */
    private $imagegallery;



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
     * Set image
     *
     * @param \AppBundle\Entity\Images $image
     *
     * @return ImagesImagegalleries
     */
    public function setImage(\AppBundle\Entity\Images $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \AppBundle\Entity\Images
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set imagegallery
     *
     * @param \AppBundle\Entity\Imagegalleries $imagegallery
     *
     * @return ImagesImagegalleries
     */
    public function setImagegallery(\AppBundle\Entity\Imagegalleries $imagegallery = null)
    {
        $this->imagegallery = $imagegallery;

        return $this;
    }

    /**
     * Get imagegallery
     *
     * @return \AppBundle\Entity\Imagegalleries
     */
    public function getImagegallery()
    {
        return $this->imagegallery;
    }
}
