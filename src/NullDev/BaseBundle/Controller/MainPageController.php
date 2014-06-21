<?php

namespace NullDev\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainPageController extends Controller
{
    public function indexAction()
    {
        return $this->render('NullDevBaseBundle:MainPage:index.html.twig');
    }
    public function impressumAction()
    {
        return $this->render('NullDevBaseBundle:MainPage:impressum.html.twig');
    }
}
