<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Navigationitems
 *
 * @ORM\Table(name="navigationitems")
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"dropdown" = "Navigationdropdowns", "link" = "Navigationlinks"})
 */
abstract class Navigationitems {

    /**
     * @var integer
     *
     * @ORM\Column(name="x", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $x;

    /**
     * Get x
     *
     * @return integer
     */
    public function getX() {
        return $this->x;
    }

}
