<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PostsComments
 *
 * @ORM\Table(name="posts_comments", uniqueConstraints={@ORM\UniqueConstraint(name="post_comment_UNIQUE", columns={"post", "comment"})}, indexes={@ORM\Index(name="FK_PC_P_post_idx", columns={"post"}), @ORM\Index(name="FK_PC_C_comment_idx", columns={"comment"})})
 * @ORM\Entity
 */
class PostsComments
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
     * @var \AppBundle\Entity\Posts
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Posts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="post", referencedColumnName="x", nullable=false)
     * })
     */
    private $post;

    /**
     * @var \AppBundle\Entity\Comments
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Comments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="comment", referencedColumnName="x", nullable=false)
     * })
     */
    private $comment;



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
     * Set post
     *
     * @param \AppBundle\Entity\Posts $post
     *
     * @return PostsComments
     */
    public function setPost(\AppBundle\Entity\Posts $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \AppBundle\Entity\Posts
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set comment
     *
     * @param \AppBundle\Entity\Comments $comment
     *
     * @return PostsComments
     */
    public function setComment(\AppBundle\Entity\Comments $comment = null)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return \AppBundle\Entity\Comments
     */
    public function getComment()
    {
        return $this->comment;
    }
}
