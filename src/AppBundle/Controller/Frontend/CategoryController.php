<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Category controller.
 *
 */
class CategoryController extends Controller
{
    /**
     * Lists all category entities.
     *
     */
    public function showAction(Request $request, Category $category)
    {
        $em = $this->getDoctrine()->getManager();

        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository("AppBundle:Category")->findAll();

        $blogs = $em->getRepository("AppBundle:Blog")->findBy(array(
            "category" => $category->getId()
        ));
        /*
        *@var $paginator \Knp\Component\Pager\Paginator
        */
        $paginator = $this->get("knp_paginator");
        $paginate_blog = $paginator->paginate(
            $blogs,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 5)
        );

        return $this->render('frontend/category/index.html.twig', array(
            "categories" => $categories,
            "active_categories"=>$category,
            "blogs" => $paginate_blog
        ));
    }

}
