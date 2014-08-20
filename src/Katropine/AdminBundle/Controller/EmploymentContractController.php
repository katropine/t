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
     * @Route("/list/page/{page}", name="contracts_list")
     * @Template()
     */
    public function listAction($page=1) {
        
       
        $total = $this->getDoctrine()->getRepository('KatropineAdminBundle:EmploymentContract')->countAll();
        $route_name = 'contracts_list';

        // pagination init
        $maxRows = $myVariable = $this->container->getParameter('max_rows');
        $maxPaginationLinks = $this->container->getParameter('max_pagination_links');
        
        
        $pagination = new Pagination($maxRows, $maxPaginationLinks);
        $pg = $pagination->calc($page, $total);
        $pg->setUrlFirst($this->generateUrl($route_name, array('page' => $pg->first)))
                ->setUrlPrev($this->generateUrl($route_name, array('page' => $pg->prev)))
                ->setUrlIterated($this->generateUrl($route_name, array('page' => '%s')))
                ->setUrlNext($this->generateUrl($route_name, array('page' => $pg->next)))
                ->setUrllast($this->generateUrl($route_name, array('page' => $pg->last)));
        
        
        $contracts = $this->getDoctrine()->getRepository('KatropineAdminBundle:EmploymentContract')->fetchBatch('', $pagination->getLimit(), $pagination->getOffset());
       
        
        return array(
            'contracts' => $contracts,
            'total'     => $total, 
            'pagination'=> $pg,
            'q'         => '',
            'route_name'=>$route_name
        );
    }
    
    /**
     * @Route("/list/user/{uid}/page/{page}", name="contracts_user_list")
     * @Template()
     */
    public function usercontractlistAction($uid=0, $page=1) {
        
       if($uid == 0){
            return array();
        }
        $user = $this->getDoctrine()->getEntityManager()->find("KatropineAdminBundle:User", $uid);
        $total = $this->getDoctrine()->getRepository('KatropineAdminBundle:EmploymentContract')->countAllByUserId($uid);
        $route_name = 'contracts_user_list';
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
     * @Route("/addnew/user/{uid}/", name="contract_user_addnew")
     * @Route("/{id}/edit/", name="contract_edit")
     * @Template()
     */
    public function saveAction(Request $request, $id = 0, $uid = 0){
        
        $company = null;
        $user = null;
        $returnUrl = $this->generateUrl('contracts_list');
        if($id > 0){
            $contract = $this->getDoctrine()->getEntityManager()->find("KatropineAdminBundle:EmploymentContract", $id);
        }else{
            $contract = new EmploymentContract();
        }
        if($uid > 0){ // not done
            $user = $this->getDoctrine()->getEntityManager()->find('KatropineAdminBundle:User', $uid);
            $returnUrl = $this->generateUrl('contracts_user_list', array('uid' => $user->getId()));
            $contract->setUser($user);
            $contract->setCompany($user->getCompany());
        }
                
        $formBuilder = $this->createFormBuilder($contract);
        if($id == 0 && $uid == 0){ // nop
            $formBuilder->add('company', 'entity', array( 'class' => 'KatropineAdminBundle:Company', 'property' => 'name'));
        }
        
        $form = $formBuilder->add('name', 'text', array('label' => 'Name'))
                ->add('vacationDaysPerYear', 'text', array('label' => 'Vacation_days_per_year',  'attr' => ['class' => 'form-control tiny']))
                ->add('minHoursPerWeek', 'timeinterval', array('label' => 'Min_hours_per_week', 'attr' => ['class' => 'short inline']))
                ->add('workingDayDuration', 'time', array('label' => 'Working_day_duration', 'attr' => ['class' => 'short inline']))
                ->add('lunchBreakDuration', 'time', array('label' => 'Lunch_break_duration', 'attr' => ['class' => 'short inline']))
                ->add('lunch_break_excluded', 'choice', array('label' => 'Lunch_break_excluded', 'choices' => array("No", "Yes")))
                
                ->add('nightShiftRate', 'decimal', array('label' => 'Night_shift_rate', 'attr' => ['class' => 'tiny']))
                ->add('dayShiftRate', 'decimal', array('label' => 'Day_shift_rate', 'attr' => ['class' => 'tiny']))
                ->add('lateShiftRate', 'decimal', array('label' => 'Late_shift_rate', 'attr' => ['class' => 'tiny']))
                ->add('weekendShiftRate', 'decimal', array('label' => 'Weekend_shift_rate', 'attr' => ['class' => 'tiny']))
                
               
                
                ->add('nightShiftStart', 'time', array('label' => 'Night_shift_start', 'attr' => ['class' => 'short inline']))
                ->add('nightShiftEnd', 'time', array('label' => 'Night_shift_end', 'attr' => ['class' => 'short inline']))
                ->add('dayShiftStart', 'time', array('label' => 'Day_shift_start', 'attr' => ['class' => 'short inline']))
                ->add('dayShiftEnd', 'time', array('label' => 'Day_shift_end', 'attr' => ['class' => 'short inline']))
                ->add('lateShiftStart', 'time', array('label' => 'Late_shift_start', 'attr' => ['class' => 'short inline']))
                ->add('lateShiftEnd', 'time', array('label' => 'Late_shift_end', 'attr' => ['class' => 'short inline']))
                
                ->add('default', 'choice', array('label' => 'Default', 'choices' => array("No", "Yes")))
                
                ->add('startDate', 'date', array('label' => 'Contract_start_date', 'attr' => ['class' => 'short inline']))
                ->add('endDate', 'date', array('label' => 'Contract_end_date', 'attr' => ['class' => 'short inline']))
                
                ->add('save', 'submit', array( 'attr' => array( 'class' => 'btn btn-primary') ))
                ->add('cancel', 'button', array( 'attr' => array( 'onclick' => "window.location = '{$returnUrl}'" ) ))
                ->getForm();
        
        $form->handleRequest($request);
        
        
        if ($request->isMethod('POST')) {
            if($form->isValid()){
                
                if($contract->getDefault()){
                    $this->getDoctrine()->getRepository('KatropineAdminBundle:EmploymentContract')->resetDefault($contract->getUser());
                }
                
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($contract);
                $em->flush();
                
                if($contract->getId() > 0){
                    $this->get('session')->getFlashBag()->set('success', 'message.Record_updated_successfully');
                }else{
                    $this->get('session')->getFlashBag()->set('success', 'message.New_record_added_successfully');
                }
                return $this->redirect($returnUrl);
            }else{
                $this->get('session')->getFlashBag()->set('warning', 'message.Unable_to_save_record_form_is_not_valid');
                // exit(\Doctrine\Common\Util\Debug::dump($company));
            }
        }
        
        
        return [
            'user' => $user,
            'form' => $form->createView()    
        ];
    }
    
    
}

