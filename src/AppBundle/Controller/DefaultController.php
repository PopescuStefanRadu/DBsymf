<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Navigationitems;
use AppBundle\Entity\Navigationgroups;
use AppBundle\Entity\NavigationgroupsNavigationitems;
use AppBundle\Entity\Navigationdropdowns;
use AppBundle\Entity\Navigationlinks;
use AppBundle\Entity\NavigationlinksNavigationdropdowns;
use AppBundle\Entity\Tags;
use AppBundle\Entity\TagsPosts;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $qu = $em->createQuery('SELECT posts FROM AppBundle:Posts posts JOIN posts.postTagsList ptl ORDER BY posts.dateTime  DESC');
        $posts = $qu->getResult();
        return $this->render('default/index.html.twig', array('posts' => $posts));
    }

    /**
     * @route("/r/{groupid}/{page}", name="group", defaults={"page"=1}, requirements={
     *      "groupid": "\d+",
     *      "page": "\d+"
     * })
     * @Route("/r/{groupid}/{groupt}/{page}", name="group_title", defaults={"page"=1}, requirements={
     *      "groupid": "\d+",
     *      "page": "\d+"
     * })
     */
    public function showgroupAction($groupid, $groupt = null, $page) {
        return $this->showgroup($groupid, $groupt, null, $page);
    }

    /**
     * @Route("/r/{groupid}/{groupt}/{subgroupt}/{page}", name="group_subgroup", defaults={"page"=1}, requirements={
     *      "groupid": "\d+",
     *      "page": "\d+"
     * })
     */
    public function showgroupsubgroupAction($groupid, $groupt, $subgroupt, $page) {
        return $this->showgroup($groupid, $groupt, $subgroupt, $page);
    }

    /**
     * @Route("/r/p/{pid}", name="post", requirements={"pid": "\d+"})
     * @Route("/r/p/{pid}/{ptitle}", name="post_title", requirements={"pid": "\d+"})
     * @Route("/r/{groupid}/p/{pid}", name="post_gid", requirements={
     *      "groupid": "\d+",
     *      "pid": "\d+"
     * })
     * @Route("/r/{groupid}/{groupt}/p/{pid}", name="post_g", requirements={
     *      "groupid": "\d+",
     *      "pid": "\d+"
     * })
     * @Route("/r/{groupid}/{groupt}/p/{pid}/{ptitle}", name="post_g_title", requirements={
     *      "groupid": "\d+",
     *      "pid": "\d+"
     * })
     */
    public function showGrouppostAction($groupid = null, $groupt = null, $pid, $ptitle = null) {
        return $this->showPost($groupid, $groupt, null, $pid);
    }

    /**
     * @Route("/r/{groupid}/{groupt}/{subgroupt}/p/{pid}", name="post_g_sg", requirements={
     *      "groupid": "\d+",
     *      "pid":"\d+"
     * })
     * @Route("/r/{groupid}/{groupt}/{subgroupt}/p/{pid}/{ptitle}", name="post_g_sg_title", requirements={
     *      "groupid"= "\d+",
     *      "pid": "\d+"
     * })
     */
    public function showSubgrouppostAction($groupid, $groupt, $subgroupt, $pid, $ptitle = null) {
        return $this->showPost($groupid, $groupt, $subgroupt, $pid);
    }

    /**
     * @Route("/u/{profileid}", name="user_profile", requirements={
     *      "profileid": "\d+" 
     * })
     * @Route("/u/{profileid}/{profilename}", name="user_profile_name", requirements={
     *      "profileid": "\d+"
     * })
     */
    public function showUserprofileAction($profileid, $profilename = null) {
        
    }

    /**
     * @Route("/tags/{tagid}", name="tags", requirements={
     *      "tagid": "\d+",
     * })
     * @Route("/tags/{tagid}/{tagname}", name="tags_name", requirements={
     *      "tagid": "\d+",
     * })
     */
    public function showTagsPostsAction($tagid, $tagname = null) {
        $em = $this->getDoctrine()->getManager();
        $qu = $em->createQuery('SELECT posts FROM AppBundle:Posts posts JOIN posts.postTagsList ptl JOIN ptl.tag tag WHERE tag.x=:x')->setParameter(':x', $tagid);
        $posts = $qu->getResult();
        return $this->render('default/index.html.twig', array('posts' => $posts));
    }

    public function showTagListAction() {
        $em = $this->getDoctrine()->getManager();
        $qu = $em->createQuery('SELECT tags FROM AppBundle:Tags tags');
        $tags = $qu->getResult();
        return $this->render('partials/tagList.html.twig', array('tags' => $tags));
    }

    /**
     * @Route("/add_thread", name="add_thread")
     */
    public function addThread(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $qu = $em->createQuery("SELECT navs FROM AppBundle:NavigationgroupsNavigationitems navs JOIN navs.navigationgroup ng WITH ng.title='navbar' ORDER BY navs.succession");
        $navs = $qu->getResult();
        foreach ($navs as $nav) {
            $item = $nav->getNavigationitem();
            if ($item instanceof \AppBundle\Entity\Navigationlinks) {
                $choices[$item->getTitle()] = $item;
            } elseif ($item instanceof \AppBundle\Entity\Navigationdropdowns) {
                foreach ($item->getDropdownlinklist() as $ddl) {
                    $nl = $ddl->getNavigationlink();
                    $choices[$nl->getTitle()] = $nl;
                }
            }
        }

        $thread = new \AppBundle\Entity\Threads();
        $thread->setContent('Content');
        $thread->setDateTime(new \DateTime());
        $thread->setTitle("Titlu");
        $thread->setUser($user);

        $form = $this->createFormBuilder($thread)
                ->add('title', 'Symfony\Component\Form\Extension\Core\Type\TextareaType')
                ->add('content', 'Symfony\Component\Form\Extension\Core\Type\TextareaType')
                ->add('tags', 'Symfony\Component\Form\Extension\Core\Type\TextType')
                ->add('navigationlink', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', ['choices' => $choices, 'choices_as_values' => true,])
                ->add('save', 'Symfony\Component\Form\Extension\Core\Type\SubmitType')
                ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($thread);
            $em->flush();

            $ntags = explode(',', $thread->getTags());
            $ntags = array_filter($ntags);
            foreach ($ntags as &$ntag) {
                $ntag = trim($ntag);
            }

            $qu = $em->createQuery('SELECT tags FROM AppBundle:Tags tags');
            $tags = $qu->getResult();

            $list = array();
            foreach ($tags as $tag) {
                $tag = $tag->getTitle();
                array_push($list, $tag);
            }
            $tagDiffs = array_diff($ntags, $list);
            $tagSames = array_diff($ntags, $tagDiffs);
            foreach ($tagDiffs as $tagDiff) {
                $tag = new Tags();
                $tag->setTitle($tagDiff);
                $tagsPosts = new TagsPosts();
                $tagsPosts->setPost($thread);
                $tagsPosts->setTag($tag);
                $em->persist($tag);
                $em->persist($tagsPosts);
                $em->flush();
            }
            foreach ($tagSames as $tagSame) {
                $que = $em->createQuery('SELECT tag from AppBundle:Tags tag WHERE tag.title=:tags')->setParameter(':tags', $tagSame);
                $tag = $que->getResult();
                $tagsPosts = new TagsPosts();
                $tagsPosts->setTag($tag[0]);
                $tagsPosts->setPost($thread);
                $em->persist($tagsPosts);
                $em->flush();
            }

            return $this->redirectToRoute('post', array('pid' => $thread->getX()));
        }

        return $this->render('default/addthread.html.twig', array('form' => $form->createView(), 'js' => 'assets/public/js/tags-autocomplete.js',));
    }

    /**
     * @Route("/api/tags", name="api_showtags")
     */
    public function showtagsAction() {
        $em = $this->getDoctrine()->getManager();
        $qu = $em->createQuery('SELECT tags FROM AppBundle:Tags tags');
        $tags = $qu->getResult();
        //var_dump($tags);
        $response = new \Symfony\Component\HttpFoundation\JsonResponse();
        $arr = array();
        foreach ($tags as $tag) {
            array_push($arr, $tag->getTitle());
        }
        $response->setData($arr);
        return $response;
    }

    /**
     * @Route("/work")
     */
    public function work() {
        $em = $this->getDoctrine()->getManager();
        
        $user = $this->getUser();
        $user->addRole('ROLE_SUPER_ADMIN');
        $em->persist($user);

        $navgroup = new Navigationgroups();
        $navgroup->setDescription('The navigation bar');
        $navgroup->setTitle('navbar');

        $nl = new Navigationlinks();
        $nl->setTitle('Evenimente');
        $nl->setUrl('Evenimente');
        
        $nl2 = new Navigationlinks();
        $nl2->setTitle('Despre mine');
        $nl2->setUrl('despre mine');
        
        $ngni = new NavigationgroupsNavigationitems();
        $ngni->setNavigationgroup($navgroup);
        $ngni->setNavigationitem($nl);
        $ngni->setSuccession('1');
        
        $ngni2=new NavigationgroupsNavigationitems();
        $ngni2->setNavigationgroup($navgroup);
        $ngni2->setNavigationitem($nl2);
        $ngni2->setSuccession('2');
        
        $em->persist($navgroup);
        $em->persist($nl);
        $em->persist($nl2);
        $em->persist($ngni);
        $em->persist($ngni2);
        $em->flush();
        
        /*
          $navgroup = new Navigationgroups();
          $navgroup->setDescription('The navigation bar');
          $navgroup->setTitle('navbar');


 
          $navdropdown[0] = new Navigationdropdowns();
          $navdropdown[0]->setTitle('Abstract Category 1');
          $navdropdown[0]->setUrl('ac1');

          $navdropdown[1] = new Navigationdropdowns();
          $navdropdown[1]->setTitle('Abstract Category 2');
          $navdropdown[1]->setUrl('Abstract Category 2');

          $nl = new Navigationlinks();
          $nl->setTitle('Category 1');
          $nl->setUrl('Category 1');

          $nl0[0] = new Navigationlinks();
          $nl0[0]->setTitle('Subcategory 1 A');
          $nl0[0]->setUrl('Subcategory 1 A');

          $nl0[1] = new Navigationlinks();
          $nl0[1]->setTitle('Subcategory 1 B');
          $nl0[1]->setUrl('Subcategory 1 B');

          $nlnd[0] = new NavigationlinksNavigationdropdowns();
          $nlnd[0]->setNavigationdropdown($navdropdown[0]);
          $nlnd[0]->setNavigationlink($nl0[0]);
          $nlnd[0]->setSuccession('1');

          $nlnd[1] = new NavigationlinksNavigationdropdowns();
          $nlnd[1]->setNavigationdropdown($navdropdown[0]);
          $nlnd[1]->setNavigationlink($nl0[1]);
          $nlnd[1]->setSuccession('2');

          $nl1[0] = new Navigationlinks();
          $nl1[0]->setTitle('Subcategory 2 A');
          $nl1[0]->setUrl('Subcategory 2 A');

          $nlnd[2] = new NavigationlinksNavigationdropdowns();
          $nlnd[2]->setNavigationdropdown($navdropdown[1]);
          $nlnd[2]->setNavigationlink($nl1[0]);
          $nlnd[2]->setSuccession('1');

          $ngni[0] = new NavigationgroupsNavigationitems();
          $ngni[0]->setNavigationgroup($navgroup);
          $ngni[0]->setNavigationitem($navdropdown[0]);
          $ngni[0]->setSuccession('1');

          $ngni[1] = new NavigationgroupsNavigationitems();
          $ngni[1]->setNavigationgroup($navgroup);
          $ngni[1]->setNavigationitem($navdropdown[1]);
          $ngni[1]->setSuccession('2');

          $ngni[2] = new NavigationgroupsNavigationitems();
          $ngni[2]->setNavigationgroup($navgroup);
          $ngni[2]->setNavigationitem($nl);
          $ngni[2]->setSuccession('3');

          $em->persist($navgroup);
          $em->persist($navdropdown[0]);
          $em->persist($navdropdown[1]);
          $em->persist($nl);
          $em->persist($nl0[0]);
          $em->persist($nl0[1]);
          $em->persist($nlnd[0]);
          $em->persist($nlnd[1]);
          $em->persist($nl1[0]);
          $em->persist($nlnd[2]);
          $em->persist($ngni[0]);
          $em->persist($ngni[1]);
          $em->persist($ngni[2]);
          $em->flush(); */
    }

    public function navigationAction() {
        $em = $this->getDoctrine()->getManager();
        $qu = $em->createQuery("SELECT navs FROM AppBundle:NavigationgroupsNavigationitems navs JOIN navs.navigationgroup ng WITH ng.title='navbar' ORDER BY navs.succession");
        $nav = $qu->getResult();
        return $this->render('default/navigation.html.twig', array('navs' => $nav));
    }

    private function showgroup($groupid, $group, $subgroup, $page) {
        $em = $this->getDoctrine()->getManager();
        $qu = $em->createQuery('SELECT posts FROM AppBundle:Posts posts JOIN posts.navigationlink nl JOIN posts.postTagsList ptl WITH nl.x=:x ORDER BY posts.dateTime DESC')
                ->setParameter(':x', $groupid)
                ->setMaxResults('10')
                ->setFirstResult((($page) - 1) * 10);
        $postsingroup = $qu->getResult();
        return $this->render('default/index.html.twig', array('posts' => $postsingroup));
    }

    private function showPost($groupid, $group, $subgroup, $postid) {
        $em = $this->getDoctrine()->getManager();
        $qu = $em->createQuery('SELECT post FROM AppBundle:Posts post WHERE post.x=:postid')
                ->setParameter(':postid', $postid);
        $posts = $qu->getResult();
        return $this->render('default/post.html.twig', array('posts' => $posts));
    }

}
