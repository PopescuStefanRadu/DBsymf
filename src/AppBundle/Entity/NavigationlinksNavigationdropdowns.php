<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NavigationlinksNavigationdropdowns
 *
 * @ORM\Table(name="navigationlinks_navigationdropdowns", uniqueConstraints={@ORM\UniqueConstraint(name="navigationDropdown_navigationLink_UNIQUE", columns={"navigationDropdown", "navigationLink"})}, indexes={@ORM\Index(name="FK_NavLNavD_navidationDropdown_idx", columns={"navigationDropdown"}), @ORM\Index(name="FK_NavLNavD_NavL_navigationLink_idx", columns={"navigationLink"})})
 * @ORM\Entity
 */
class NavigationlinksNavigationdropdowns
{
    /**
     * @var integer
     *
     * @ORM\Column(name="succession", type="integer", nullable=false)
     */
    private $succession;

    /**
     * @var integer
     *
     * @ORM\Column(name="x", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $x;

    /**
     * @var \AppBundle\Entity\Navigationlinks
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Navigationlinks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="navigationLink", referencedColumnName="x", nullable=false)
     * })
     */
    private $navigationlink;

    /**
     * @var \AppBundle\Entity\Navigationdropdowns
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Navigationdropdowns", inversedBy="dropdownlinklist")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="navigationDropdown", referencedColumnName="x", nullable=false)
     * })
     */
    private $navigationdropdown;



    /**
     * Set succession
     *
     * @param integer $succession
     *
     * @return NavigationlinksNavigationdropdowns
     */
    public function setSuccession($succession)
    {
        $this->succession = $succession;

        return $this;
    }

    /**
     * Get succession
     *
     * @return integer
     */
    public function getSuccession()
    {
        return $this->succession;
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
     * Set navigationlink
     *
     * @param \AppBundle\Entity\Navigationlinks $navigationlink
     *
     * @return NavigationlinksNavigationdropdowns
     */
    public function setNavigationlink(\AppBundle\Entity\Navigationlinks $navigationlink = null)
    {
        $this->navigationlink = $navigationlink;

        return $this;
    }

    /**
     * Get navigationlink
     *
     * @return \AppBundle\Entity\Navigationlinks
     */
    public function getNavigationlink()
    {
        return $this->navigationlink;
    }

    /**
     * Set navigationdropdown
     *
     * @param \AppBundle\Entity\Navigationdropdowns $navigationdropdown
     *
     * @return NavigationlinksNavigationdropdowns
     */
    public function setNavigationdropdown(\AppBundle\Entity\Navigationdropdowns $navigationdropdown = null)
    {
        $this->navigationdropdown = $navigationdropdown;

        return $this;
    }

    /**
     * Get navigationdropdown
     *
     * @return \AppBundle\Entity\Navigationdropdowns
     */
    public function getNavigationdropdown()
    {
        return $this->navigationdropdown;
    }
}
