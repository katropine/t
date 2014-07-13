<?php

namespace Service\ServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * @Route("/default")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/test/{name}")
     * @Method({"GET"})
     */
    public function indexAction($name)
    {
        return new JsonResponse(array('name' => $name));
    }
}
