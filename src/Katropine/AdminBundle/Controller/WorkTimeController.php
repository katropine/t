<?php

/**
 * Description of WorkTimeController
 *
 * @author Kristian Beres <kristian@katropine.com>
 * @since Aug 7, 2014
 */

namespace Katropine\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Katropine\AdminBundle\Classes\Pagination;
use Symfony\Component\HttpFoundation\Request;
use Katropine\AdminBundle\Entity\Company;
use Katropine\AdminBundle\Entity\EmploymentContract;

/**
* @Route("/worktime")
* http://localhost/timelly/web/app_dev.php/admin/worktime/
*/
class WorkTimeController extends Controller{
    
    /**
     * @Route("/list/page/{page}", name="work_time_list")
     * @Route("/list/page/{page}/company/{cid}", name="company_work_time_list")
     * @Route("/list/page/{page}/user/{uid}", name="company_work_time_list")
     * @Template()
     */
    public function listAction($uid = 0, $cid = 0, $page = 0){
        $q = Request::createFromGlobals()->query->get('q');
        if($uid > 0){
            $total = $this->getDoctrine()->getRepository('KatropineAdminBundle:WorkTime')->countAllUserId($uid);
            $route_name = 'company_work_time_list';
        }else{
            $total = $this->getDoctrine()->getRepository('KatropineAdminBundle:WorkTime')->countAll();
            $route_name = 'work_time_list';
        }
        $maxRows = 50;
        
        $pagination = new Pagination($maxRows, 5);
        $pg = $pagination->calc($page, $total);
        
        // set custom links to pagination
        $pg->setUrlFirst($this->generateUrl($route_name, array('page' => $pg->first)))
                ->setUrlPrev($this->generateUrl($route_name, array('page' => $pg->prev)))
                ->setUrlIterated($this->generateUrl($route_name, array('page' => '%s')))
                ->setUrlNext($this->generateUrl($route_name, array('page' => $pg->next)))
                ->setUrllast($this->generateUrl($route_name, array('page' => $pg->last)));
        
        if($uid > 0){
            $worktimes = $this->getDoctrine()->getRepository('KatropineAdminBundle:WorkTime')->fetchBatch($pagination->getLimit(), $pagination->getOffset());
        }else{
            $worktimes = $this->getDoctrine()->getRepository('KatropineAdminBundle:WorkTime')->fetchByUserId($uid, $pagination->getLimit(), $pagination->getOffset());
        }
        $worktimreCount = count($worktimes);
        
        return array(
            'worktimes'         => $worktimes, 
            'worktimreCount'    => $worktimreCount, 
            'total'             => $total, 
            'pagination'        => $pg,
            'route_name'        => $route_name
        );
    }
    
    /**
     * @Route("/addnew/company/{cid}/", name="company_employment_contract_addnew")
     * @Route("/addnew/", name="work_time_addnew")
     * @Route("/{id}/edit/", name="work_time_edit")
     * @Template()
     */
    public function saveAction(){
        
    }
    /**
     * @Route("/{id}/delete/", name="work_time_delete")
     * @Template()
     */
    public function deleteAction(){
        
    }

}
