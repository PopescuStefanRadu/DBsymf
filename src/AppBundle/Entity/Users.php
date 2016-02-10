<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="username_UNIQUE", columns={"username"})});
 * @ORM\Entity
 */
class Users extends BaseUser
{

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registrationDateTime", type="datetime", nullable=false)
     */
    private $registrationdatetime;


    /**
     * @var string
     *
     * @ORM\Column(name="signature", type="string", length=300, nullable=true)
     */
    private $signature;

    /**
     * @var string
     *
     * @ORM\Column(name="nickname", type="string", length=45, nullable=true)
     */
    private $nickname;


    /**
     * @var integer
     *
     * @ORM\Column(name="x", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * Set registrationdatetime
     *
     * @param \DateTime $registrationdatetime
     *
     * @return Users
     */
    public function setRegistrationdatetime($registrationdatetime)
    {
        $this->registrationdatetime = $registrationdatetime;

        return $this;
    }

    /**
     * Get registrationdatetime
     *
     * @return \DateTime
     */
    public function getRegistrationdatetime()
    {
        return $this->registrationdatetime;
    }

    /**
     * Set signature
     *
     * @param string $signature
     *
     * @return Users
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * Get signature
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct() {
        parent::__construct();
        $this->registrationdatetime=new \DateTime();
    }
}
