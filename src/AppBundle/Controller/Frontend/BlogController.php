<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Blog controller.
 *
 */
class BlogController extends Controller
{
    /**
     * List of blog entities.
     *
     */
    public function showAction(Request $request, $slug)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository("AppBundle:Category")->findAll();

        $result = $em->getRepository("AppBundle:Blog")->findOneBy(array(
            "slug" => $slug
        ));

        return $this->render('frontend/blog/index.html.twig', array(
            "categories" => $categories,
            "blog" => $result
        ));
    }


    public function searchAction(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            $title = $request->get('search');
            $em = $this->getDoctrine()->getManager();
            $categories = $em->getRepository('AppBundle:Category')->findAll();
            $repo = $em->getRepository('AppBundle:Blog');
            $query = $repo->createQueryBuilder('a')
                ->where('a.title LIKE :name')
                ->setParameter('name', '%' . $title . '%')
                ->getQuery();
            $blogs = $query->getResult();
        }
        return $this->render('frontend/blog/search.html.twig', array(
            'blogs' => $blogs,
            'categories' => $categories
        ));
    }
}
