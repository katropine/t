<?php

/**
 * Description of EmploymentContractController
 *
 * @author Kristian Beres <kristian@katropine.com>
 * @since Aug 11, 2014
 */

namespace Katropine\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Katropine\AdminBundle\Classes\Pagination;
use Symfony\Component\HttpFoundation\Request;
use Katropine\AdminBundle\Entity\Company;
use Katropine\AdminBundle\Entity\EmploymentContractTemplate;

/**
* @Route("/contract")
* http://localhost/timelly/web/app_dev.php/admin/contract/
*/
class EmploymentContractController {

    /**
     * @Route("/list/user/{uid}/page/{page}", name="user_contracts")
     */
    public function listAction($uid) {
        
       if($uid > 0){
            $user = $this->getDoctrine()->getEntityManager()->find("KatropineAdminBundle:User", $id);
            $total = $this->getDoctrine()->getRepository('KatropineAdminBundle:EmploymentContractTemplate')->countAllByUserId($uid);
            $route_name = 'user_contracts';
        }
        // pagination init
        $maxRows = $myVariable = $this->container->getParameter('max_rows');
        $maxPaginationLinks = $this->container->getParameter('max_pagination_links');
        
        
        $pagination = new Pagination($maxRows, $maxPaginationLinks);
        $pg = $pagination->calc($page, $total);
        $pg->setUrlFirst($this->generateUrl($route_name, array('id' => $id,'page' => $pg->first, 'q' => $q)))
                ->setUrlPrev($this->generateUrl($route_name, array('id' => $id, 'page' => $pg->prev, 'q' => $q)))
                ->setUrlIterated($this->generateUrl($route_name, array('id' => $id, 'page' => '%s', 'q' => $q)))
                ->setUrlNext($this->generateUrl($route_name, array('id' => $id,'page' => $pg->next, 'q' => $q)))
                ->setUrllast($this->generateUrl($route_name, array('id' => $id,'page' => $pg->last, 'q' => $q)));
        
        if($uid > 0){
            $contracts = $this->getDoctrine()->getRepository('KatropineAdminBundle:EmploymentContractTemplate')->fetchByUserId($uid, $pagination->getLimit(), $pagination->getOffset());
        }
        
        return array(
            'user'   => $user,
            'contracts' => $contracts,
            'total'     => $total, 
            'pagination'=> $pg,
            'q'         => '',
            'route_name'=>$route_name
        );
    }

}

