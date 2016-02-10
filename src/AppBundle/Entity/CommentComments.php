<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommentComments
 *
 * @ORM\Table(name="comment_comments", uniqueConstraints={@ORM\UniqueConstraint(name="commentChild_commentParent_UNIQUE", columns={"commentChild", "commentParent"})}, indexes={@ORM\Index(name="FK_CC_C_commentChild_idx", columns={"commentChild"}), @ORM\Index(name="FK_CC_C_commentParent_idx", columns={"commentParent"})})
 * @ORM\Entity
 */
class CommentComments
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
     * @var \AppBundle\Entity\Comments
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Comments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="commentParent", referencedColumnName="x", nullable=false)
     * })
     */
    private $commentparent;

    /**
     * @var \AppBundle\Entity\Comments
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Comments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="commentChild", referencedColumnName="x", nullable=false)
     * })
     */
    private $commentchild;



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
     * Set commentparent
     *
     * @param \AppBundle\Entity\Comments $commentparent
     *
     * @return CommentComments
     */
    public function setCommentparent(\AppBundle\Entity\Comments $commentparent = null)
    {
        $this->commentparent = $commentparent;

        return $this;
    }

    /**
     * Get commentparent
     *
     * @return \AppBundle\Entity\Comments
     */
    public function getCommentparent()
    {
        return $this->commentparent;
    }

    /**
     * Set commentchild
     *
     * @param \AppBundle\Entity\Comments $commentchild
     *
     * @return CommentComments
     */
    public function setCommentchild(\AppBundle\Entity\Comments $commentchild = null)
    {
        $this->commentchild = $commentchild;

        return $this;
    }

    /**
     * Get commentchild
     *
     * @return \AppBundle\Entity\Comments
     */
    public function getCommentchild()
    {
        return $this->commentchild;
    }
}
