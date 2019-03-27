<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
        $post = new Post;
        $form = $this->createFormBuilder($post)
        ->add('title', TextType::class, ['attr' => ['class' => 'form-control']])
        ->add('description', TextareaType::class, ['attr' => ['class' => 'form-control']])
        ->add('categoryId', TextType::class, ['attr' => ['class' => 'form-control']])
        ->add('save', SubmitType::class, ['label' => 'Create post', 'attr' => ['class' => 'btn btn-primary']])
        ->getForm();
        $form->handleRequest($request);

        if ( $form->isSubmitted() && $form->isValid() ) {
            $title = $form['title']->getData();
            $description = $form['description']->getData();
            $categoryId = $form['categoryId']->getData();

            $post->setTitle($title);
            $post->setDescription($description);
            $post->setCategoryId($categoryId);

            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            $this->addFlash('message', 'Post created successfully!');
            return $this->redirectToRoute('view_posts_route');
        }

        return $this->render('pages/create.html.twig', ['form' => $form->createView()]);
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
