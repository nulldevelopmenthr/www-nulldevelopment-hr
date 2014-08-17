<?php

namespace NullDev\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainPageController extends Controller
{
    public function indexAction()
    {
        $response = $this->render('NullDevBaseBundle:MainPage:index.html.twig');

        $response->setPublic();
        $response->setSharedMaxAge(10 * $this->container->getParameter('esi_cache_multiplier'));

        return $response;
    }

    public function impressumAction()
    {
        $response = $this->render('NullDevBaseBundle:MainPage:impressum.html.twig');

        $response->setPublic();
        $response->setSharedMaxAge(10 * $this->container->getParameter('esi_cache_multiplier'));

        return $response;
    }
}
