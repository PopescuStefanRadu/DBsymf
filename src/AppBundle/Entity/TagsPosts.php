<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TagsPosts
 *
 * @ORM\Table(name="tags_posts", uniqueConstraints={@ORM\UniqueConstraint(name="tag_post_UNIQUE", columns={"post", "tag"})}, indexes={@ORM\Index(name="FK_TagP_P_post_idx", columns={"post"}), @ORM\Index(name="FK_TagP_Tag_tag_idx", columns={"tag"})})
 * @ORM\Entity
 */
class TagsPosts
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
     * @var \AppBundle\Entity\Tags
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tags")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tag", referencedColumnName="x", nullable=false)
     * })
     */
    private $tag;

    /**
     * @var \AppBundle\Entity\Posts
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Posts", inversedBy="postTagsList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="post", referencedColumnName="x", nullable=false)
     * })
     */
    private $post;



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
     * Set tag
     *
     * @param \AppBundle\Entity\Tags $tag
     *
     * @return TagsPosts
     */
    public function setTag(\AppBundle\Entity\Tags $tag = null)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return \AppBundle\Entity\Tags
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set post
     *
     * @param \AppBundle\Entity\Posts $post
     *
     * @return TagsPosts
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
}
