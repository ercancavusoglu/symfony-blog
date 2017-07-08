<?php

namespace AppBundle\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Dashboard controller.
 *
 */
class DashboardController extends Controller
{
    /**
     * Dashboard screen
     *
     */
    public function indexAction()
    {
        return $this->render('backend/dashboard/index.html.twig');
    }
}
