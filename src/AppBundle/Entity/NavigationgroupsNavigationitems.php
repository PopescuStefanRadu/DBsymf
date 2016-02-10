<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NavigationgroupsNavigationitems
 *
 * @ORM\Table(name="navigationgroups_navigationitems", uniqueConstraints={@ORM\UniqueConstraint(name="navigationGroup_order", columns={"navigationGroup", "succession"})}, indexes={@ORM\Index(name="FK_NavGNavI_NavG_naviagtionGroup_idx", columns={"navigationGroup"}), @ORM\Index(name="FK_NavGNavI_NavI_navigationItem_idx", columns={"navigationItem"})})
 * @ORM\Entity
 */
class NavigationgroupsNavigationitems
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
     * @var \AppBundle\Entity\Navigationitems
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Navigationitems")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="navigationItem", referencedColumnName="x", nullable=false)
     * })
     */
    private $navigationitem;

    /**
     * @var \AppBundle\Entity\Navigationgroups
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Navigationgroups")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="navigationGroup", referencedColumnName="x", nullable=false)
     * })
     */
    private $navigationgroup;



    /**
     * Set succession
     *
     * @param integer $succession
     *
     * @return NavigationgroupsNavigationitems
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
     * Set navigationitem
     *
     * @param \AppBundle\Entity\Navigationitems $navigationitem
     *
     * @return NavigationgroupsNavigationitems
     */
    public function setNavigationitem(\AppBundle\Entity\Navigationitems $navigationitem = null)
    {
        $this->navigationitem = $navigationitem;

        return $this;
    }

    /**
     * Get navigationitem
     *
     * @return \AppBundle\Entity\Navigationitems
     */
    public function getNavigationitem()
    {
        return $this->navigationitem;
    }

    /**
     * Set navigationgroup
     *
     * @param \AppBundle\Entity\Navigationgroups $navigationgroup
     *
     * @return NavigationgroupsNavigationitems
     */
    public function setNavigationgroup(\AppBundle\Entity\Navigationgroups $navigationgroup = null)
    {
        $this->navigationgroup = $navigationgroup;

        return $this;
    }

    /**
     * Get navigationgroup
     *
     * @return \AppBundle\Entity\Navigationgroups
     */
    public function getNavigationgroup()
    {
        return $this->navigationgroup;
    }
}
