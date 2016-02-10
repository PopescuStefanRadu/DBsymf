<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsersRelationships
 *
 * @ORM\Table(name="users_relationships",uniqueConstraints={@ORM\UniqueConstraint(name="user_relationship_user_UNIQUE", columns={"userowner", "usertarget","relationship"})}, indexes={@ORM\Index(name="FK_UR_U_userOwner_idx", columns={"userOwner"}), @ORM\Index(name="FK_UR_U_userTarget_idx", columns={"userTarget"}), @ORM\Index(name="FK_UR_R_relationship_idx", columns={"relationship"})})
 * @ORM\Entity
 */
class UsersRelationships
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
     * @var \AppBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userTarget", referencedColumnName="x", nullable=false)
     * })
     */
    private $usertarget;

    /**
     * @var \AppBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userOwner", referencedColumnName="x", nullable=false)
     * })
     */
    private $userowner;

    /**
     * @var \AppBundle\Entity\Relationships
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Relationships")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="relationship", referencedColumnName="x", nullable=false)
     * })
     */
    private $relationship;



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
     * Set usertarget
     *
     * @param \AppBundle\Entity\Users $usertarget
     *
     * @return UsersRelationships
     */
    public function setUsertarget(\AppBundle\Entity\Users $usertarget = null)
    {
        $this->usertarget = $usertarget;

        return $this;
    }

    /**
     * Get usertarget
     *
     * @return \AppBundle\Entity\Users
     */
    public function getUsertarget()
    {
        return $this->usertarget;
    }

    /**
     * Set userowner
     *
     * @param \AppBundle\Entity\Users $userowner
     *
     * @return UsersRelationships
     */
    public function setUserowner(\AppBundle\Entity\Users $userowner = null)
    {
        $this->userowner = $userowner;

        return $this;
    }

    /**
     * Get userowner
     *
     * @return \AppBundle\Entity\Users
     */
    public function getUserowner()
    {
        return $this->userowner;
    }

    /**
     * Set relationship
     *
     * @param \AppBundle\Entity\Relationships $relationship
     *
     * @return UsersRelationships
     */
    public function setRelationship(\AppBundle\Entity\Relationships $relationship = null)
    {
        $this->relationship = $relationship;

        return $this;
    }

    /**
     * Get relationship
     *
     * @return \AppBundle\Entity\Relationships
     */
    public function getRelationship()
    {
        return $this->relationship;
    }
}
