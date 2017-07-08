<?php

namespace AppBundle\Controller\Frontend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need

        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository("AppBundle:Category")->findAll();

        $blogs = $em->getRepository("AppBundle:Blog")->findAll();
        /*
        *@var $paginator \Knp\Component\Pager\Paginator
        */
        $paginator = $this->get("knp_paginator");
        $paginate_blog = $paginator->paginate(
            $blogs,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 5)
        );

        return $this->render('frontend/default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            "categories" => $categories,
            "blogs" => $paginate_blog
        ]);
    }
}
