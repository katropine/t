<?php

/**
 * Description of DashboardController
 *
 * @author Kriss
 * @since Jul 13, 2014
 */


namespace Katropine\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
/**
 * @Route("/dashboard")
 * http://localhost/timelly/web/app_dev.php/admin/dashboard/hello/kriss
 */
class DashboardController extends Controller{
    
    /**
     * @Route("/", name="dashboard_index")
     * @Template()
     */
    public function indexAction()
    {
//        if (false === $this->securityContext->isGranted('ROLE_NEWSLETTER_ADMIN')) {
//            throw new AccessDeniedException();
//        }
//        if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
//            // authenticated (NON anonymous)
//        }
        return array('name' => "s");
    }
}
