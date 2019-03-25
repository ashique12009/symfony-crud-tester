<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    /**
     * @Route("/post", name="view_posts_route")
     */
    public function showAllPostsAction(Request $request)
    {
        // replace this example code with whatever you need
        $posts = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        return $this->render('pages/index.html.twig', ['posts' => $posts]);
    }

    /**
     * @Route("/create", name="create_post_route")
     */
    public function createPostAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('pages/create.html.twig');
    }
    
    /**
     * @Route("/view/{id}", name="view_post_route")
     */
    public function viewPostAction($id)
    {
        // replace this example code with whatever you need
        return $this->render('pages/view.html.twig');
    }
    
    /**
     * @Route("/edit/{id}", name="edit_post_route")
     */
    public function editPostAction($id)
    {
        // replace this example code with whatever you need
        return $this->render('pages/edit.html.twig');
    }
    
    /**
     * @Route("/delete/{id}", name="delete_post_route")
     */
    public function deletePostAction($id)
    {
        // replace this example code with whatever you need
        return $this->render('pages/delete.html.twig');
    }
}
