<?php

namespace ReferralsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/dfghsdfghsdf")
     */
    public function indexAction()
    {
        return $this->render('ReferralsBundle:Default:index.html.twig');
    }
}
