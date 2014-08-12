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
use Katropine\AdminBundle\Entity\EmploymentContract;
use Katropine\AdminBundle\Classes\PhpObject;
/**
* @Route("/contract")
* http://localhost/timelly/web/app_dev.php/admin/contract/
*/
class EmploymentContractController extends Controller{

    /**
     * @Route("/list/user/{uid}/page/{page}", name="user_contracts")
     * @Template()
     */
    public function listAction($uid=0, $page=1) {
        
       if($uid > 0){
            $user = $this->getDoctrine()->getEntityManager()->find("KatropineAdminBundle:User", $uid);
            $total = $this->getDoctrine()->getRepository('KatropineAdminBundle:EmploymentContract')->countAllByUserId($uid);
            $route_name = 'user_contracts';
        }
        // pagination init
        $maxRows = $myVariable = $this->container->getParameter('max_rows');
        $maxPaginationLinks = $this->container->getParameter('max_pagination_links');
        
        
        $pagination = new Pagination($maxRows, $maxPaginationLinks);
        $pg = $pagination->calc($page, $total);
        $pg->setUrlFirst($this->generateUrl($route_name, array('uid' => $uid,'page' => $pg->first)))
                ->setUrlPrev($this->generateUrl($route_name, array('uid' => $uid, 'page' => $pg->prev)))
                ->setUrlIterated($this->generateUrl($route_name, array('uid' => $uid, 'page' => '%s')))
                ->setUrlNext($this->generateUrl($route_name, array('uid' => $uid,'page' => $pg->next)))
                ->setUrllast($this->generateUrl($route_name, array('uid' => $uid,'page' => $pg->last)));
        
        if($uid > 0){
            $contracts = $this->getDoctrine()->getRepository('KatropineAdminBundle:EmploymentContract')->fetchByUserId($uid, $pagination->getLimit(), $pagination->getOffset());
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
    
    /**
     * @Route("/contract-template/{id}/user/{uid}/", name="employment_contract_assign")
     * @Template()
     */
    public function assignAction($id, $uid){
        
        if($id > 0 && $uid > 0){
            $user = $this->getDoctrine()->getEntityManager()->find("KatropineAdminBundle:User", $uid);
            $contractTemplate = $this->getDoctrine()->getEntityManager()->find("KatropineAdminBundle:EmploymentContractTemplate", $id);
        }
        
        $contract = PhpObject::factory()->cast(new EmploymentContract(), $contractTemplate);
        $contract->setUser($user);
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($contract);
        $em->flush();
        
        if($contract->getId() > 0){
            $this->get('session')->getFlashBag()->set('success', 'message.Record_updated_successfully');
        }else{
            $this->get('session')->getFlashBag()->set('success', 'message.New_record_added_successfully');
        }
        return $this->redirect($returnUrl);
    }
    
}

