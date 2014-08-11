<?php

/**
 * Description of EmploymentContractController
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
use Katropine\AdminBundle\Form\Type\TimeInterval;

/**
* @Route("/contract")
* http://localhost/timelly/web/app_dev.php/admin/contract/
*/
class EmploymentContractController extends Controller{

    
    /**
     * @Route("/list/page/{page}/", name="employment_contract_list")
     * @Route("/list/company/{id}/page/{page}/", name="company_employment_contracts")
     * @Template()
     */
    public function listAction($id = 0, $page = 0){
        $q = Request::createFromGlobals()->query->get('q');
        
        $company = null;
        if($id > 0){
            $company = $this->getDoctrine()->getRepository('KatropineAdminBundle:Company')->fetchById($id);
            $total = $this->getDoctrine()->getRepository('KatropineAdminBundle:EmploymentContract')->countAllByCompanyId($id);
            $route_name = 'company_employment_contracts';
        }else{
            $total = $this->getDoctrine()->getRepository('KatropineAdminBundle:EmploymentContract')->countAll($q);
            $route_name = 'employment_contract_list';
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
   
        if($id > 0){
            $contracts = $this->getDoctrine()->getRepository('KatropineAdminBundle:EmploymentContract')->fetchByCompanyId($id, $pagination->getLimit(), $pagination->getOffset());
        }else{
            $contracts = $this->getDoctrine()->getRepository('KatropineAdminBundle:EmploymentContract')->fetchBatch($q, $pagination->getLimit(), $pagination->getOffset());
        }
        
        
        return array(
            'company' => $company,
            'contracts' => $contracts,
            'total'         => $total, 
            'pagination'    => $pg,
            'q' => '',
            'route_name' =>$route_name
        );
    }
    
    /**
     * @Route("/addnew/company/{cid}/", name="company_employment_contract_addnew")
     * @Route("/addnew/", name="employment_contract_addnew")
     * @Route("/{id}/edit/", name="employment_contract_edit")
     * @Template()
     */
    public function saveAction(Request $request, $id = 0, $cid = 0){
        
        $company = null;
        $returnUrl = $this->generateUrl('employment_contract_list');
         if($id > 0){
            $contract = $this->getDoctrine()->getEntityManager()->find("KatropineAdminBundle:EmploymentContract", $id);
        }else{
            $contract = new EmploymentContract();
        }
        if($cid > 0){
            $company = $this->getDoctrine()->getRepository('KatropineAdminBundle:Company')->fetchById($cid);
            $returnUrl = $this->generateUrl('company_employment_contracts', array('cid' => $company->getId()));
           
            $contract->setCompany($company);
        }
                
        $formBuilder = $this->createFormBuilder($contract);
        if($cid == 0){
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
                ->add('save', 'submit', array( 'attr' => array( 'class' => 'btn btn-primary') ))
                ->add('cancel', 'button', array( 'attr' => array( 'onclick' => "window.location = '{$returnUrl}'" ) ))
                ->getForm();
        
        $form->handleRequest($request);
        
        
        if ($request->isMethod('POST')) {
            if($form->isValid()){
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($contract);
                $em->flush();
                
                if($id > 0){
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
            'company' => $company,
            'form' => $form->createView()    
        ];
    }
    /**
     * @Route("/{id}/delete/", name="employment_contract_delete")
     * @Template()
     */
    public function deleteAction($id){
        if($id == 0){
            throw $this->createNotFoundException(
                    'No data found for id ' . $id
            );
        }
        $contract = $this->getDoctrine()->getEntityManager()->find("KatropineAdminBundle:EmploymentContract", $id);
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($contract);
        $em->flush();
        
        $this->get('session')->getFlashBag()->set('success', 'message.Record_deleted_successfully');
        return $this->redirect($this->generateUrl('employment_contract_list'));
    }
}
