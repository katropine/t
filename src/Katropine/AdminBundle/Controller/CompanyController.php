<?php

/**
 * Description of CompanyController
 *
 * @author Kristian Beres <kristian@katropine.com>
 * @since Jul 14, 2014
 */

namespace Katropine\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Katropine\AdminBundle\Classes\Pagination;
use Symfony\Component\HttpFoundation\Request;
use Katropine\AdminBundle\Entity\Company;
use Katropine\AdminBundle\Entity\SubscriptionOrder;
use Katropine\AdminBundle\Entity\Subscription;

/**
* @Route("/company")
* http://localhost/timelly/web/app_dev.php/admin/company/
*/
class CompanyController extends Controller{
    
    /**
     * @Route("/", name="company_default")
     */
    public function indexAction(){
        return $this->redirect($this->generateUrl('company_list'));
    }
    /**
     * @Route("/list/", name="company_list")
     * @Route("/list/page/{page}/")
     * @Template()
     */
    public function listAction($page = 1) {
        
        $q = Request::createFromGlobals()->query->get('q');
        
        $total = $this->getDoctrine()->getRepository('KatropineAdminBundle:Company')->countAll($q);
        // pagination init
        $maxRows = $myVariable = $this->container->getParameter('max_rows');
        $maxPaginationLinks = $this->container->getParameter('max_pagination_links');
                
        $pagination = new Pagination($maxRows, $maxPaginationLinks);
        $pg = $pagination->calc($page, $total);
        
        // set custom links to pagination
        $pg->setUrlFirst($this->generateUrl('company_list', array('page' => $pg->first, 'q' => $q)))
                ->setUrlPrev($this->generateUrl('company_list', array('page' => $pg->prev, 'q' => $q)))
                ->setUrlIterated($this->generateUrl('company_list', array('page' => '%s', 'q' => $q)))
                ->setUrlNext($this->generateUrl('company_list', array('page' => $pg->next, 'q' => $q)))
                ->setUrllast($this->generateUrl('company_list', array('page' => $pg->last, 'q' => $q)));
        
        $companies = $this->getDoctrine()->getRepository('KatropineAdminBundle:Company')->fetchBatch($q, $pagination->getLimit(), $pagination->getOffset());
        $companyCount = count($companies);
        
        return array(
            'companies'         => $companies, 
            'companyCount'     => $companyCount, 
            'total'         => $total, 
            'pagination'    => $pg,
            'q'             => $q
        );
    }
    /**
     * @Route("/{id}/show/page/{page}/", name="company_show")
     * @Template()
     */
    public function showAction($id=0, $page = 1){
        
        $q = Request::createFromGlobals()->query->get('q');
        
        $company = $this->getDoctrine()->getRepository('KatropineAdminBundle:Company')->fetchById($id);
        // pagination init
        $maxRows = $myVariable = $this->container->getParameter('max_rows');
        $maxPaginationLinks = $this->container->getParameter('max_pagination_links');
        
        $total = $this->getDoctrine()->getRepository('KatropineAdminBundle:User')->countAllByCompanyId($id);
        $pagination = new Pagination($maxRows, $maxPaginationLinks);
        $pg = $pagination->calc($page, $total);
        $pg->setUrlFirst($this->generateUrl('company_show', array('id' => $id,'page' => $pg->first, 'q' => $q)))
                ->setUrlPrev($this->generateUrl('company_show', array('id' => $id, 'page' => $pg->prev, 'q' => $q)))
                ->setUrlIterated($this->generateUrl('company_show', array('id' => $id, 'page' => '%s', 'q' => $q)))
                ->setUrlNext($this->generateUrl('company_show', array('id' => $id,'page' => $pg->next, 'q' => $q)))
                ->setUrllast($this->generateUrl('company_show', array('id' => $id,'page' => $pg->last, 'q' => $q)));
   
        
        $users = $this->getDoctrine()->getRepository('KatropineAdminBundle:User')->fetchByCompanyId($id, $pagination->getLimit(), $pagination->getOffset());
        
        return array(
            'company' => $company,
            'users' => $users,
            'total'         => $total, 
            'pagination'    => $pg,
            'q' => '',
            'route_name' => 'company_show'
        );
        
    }
        
    /**
     * 
     * @Route("/{id}/show/user/page/{page}/", name="company_user_show")
     * @Template()
     */
    public function showbycompanyAction($id = 0, $page = 1){
        
        $q = Request::createFromGlobals()->query->get('q');
        
        $company = $this->getDoctrine()->getRepository('KatropineAdminBundle:Company')->fetchById($id);
        // pagination init
        $maxRows = $myVariable = $this->container->getParameter('max_rows');
        $maxPaginationLinks = $this->container->getParameter('max_pagination_links');
        
        $total = $this->getDoctrine()->getRepository('KatropineAdminBundle:User')->countAllByCompanyId($id);
        $pagination = new Pagination($maxRows, $maxPaginationLinks);
        $pg = $pagination->calc($page, $total);
        $pg->setUrlFirst($this->generateUrl('company_user_show', array('id' => $id,'page' => $pg->first, 'q' => $q)))
                ->setUrlPrev($this->generateUrl('company_user_show', array('id' => $id, 'page' => $pg->prev, 'q' => $q)))
                ->setUrlIterated($this->generateUrl('company_user_show', array('id' => $id, 'page' => '%s', 'q' => $q)))
                ->setUrlNext($this->generateUrl('company_user_show', array('id' => $id,'page' => $pg->next, 'q' => $q)))
                ->setUrllast($this->generateUrl('company_user_show', array('id' => $id,'page' => $pg->last, 'q' => $q)));
   
        
        $users = $this->getDoctrine()->getRepository('KatropineAdminBundle:User')->fetchByCompanyId($id, $pagination->getLimit(), $pagination->getOffset());
        
        return array(
            'company' => $company,
            'users' => $users,
            'total'         => $total, 
            'pagination'    => $pg,
            'q' => '',
            'route_name' => 'company_user_show'
        );
    }
    
    /**
     * @Route("/addnew/", name="company_addnew")
     * @Route("/{id}/edit/", name="company_edit")
     * @Template()
     */
    public function saveAction(Request $request, $id = 0){
        
        if($id == 0){
            $company = new Company();
        }else{
            $company = $this->getDoctrine()->getEntityManager()->find("KatropineAdminBundle:Company", $id);
        }
        
        $form = $this->createFormBuilder($company)
            ->add('name', 'text', array('label' => 'Company_name'))
            ->add('save', 'submit', array( 'attr' => array( 'class' => 'btn btn-primary') ))
            ->add('cancel', 'button', array( 'attr' => array( 'onclick' => "window.location = '".$this->generateUrl('company_list')."'" ) ))
            ->getForm();
        
        $form->handleRequest($request);

        if ($request->isMethod('POST')) {
            if($form->isValid()){
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($company);
                $em->flush();
                
                if($id > 0){
                    $this->get('session')->getFlashBag()->set('success', 'message.Record_updated_successfully');
                }else{
                    $this->get('session')->getFlashBag()->set('success', 'message.New_record_added_successfully');
                }
                return $this->redirect($this->generateUrl('company_edit', ['id' => $company->getId()]));
            }else{
                $this->get('session')->getFlashBag()->set('warning', 'message.Unable_to_save_record_form_is_not_valid');
                // exit(\Doctrine\Common\Util\Debug::dump($company));
            }
        }
        
        return array(
            'form' => $form->createView(),
            'company' => $company
        );
    }
    
    /**
     * @Route("/saveresponse/", name="company_save_response")
     * @Template()
     */
    public function saveresponseAction(){
        
        return array();
    }
    
    /**
     * @Route("/{id}/delete/", name="company_delete")
     * @Template()
     */
    public function deleteAction($id = 0){
        if($id == 0){
            throw $this->createNotFoundException(
                    'No data found for id ' . $id
            );
        }
        $company = $this->getDoctrine()->getEntityManager()->find("KatropineAdminBundle:Company", $id);
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($company);
        $em->flush();
        // show warning that all the users will be deleted!!!
        $this->get('session')->getFlashBag()->set('success', 'message.Record_deleted_successfully');
        return $this->redirect($this->generateUrl('company_list'));
    }
    
    
    /**
     * @Route("/{id}/subscribe/{sid}", name="company_subscribe")
     * @Template()
     */
    public function subscribeAction(Request $request, $id = 0, $sid = 0){
        if($id == 0){
            
        }
        if($sid == 0){
            $subscriptionOrder = new SubscriptionOrder();
        }else{
            $subscriptionOrder = $this->getDoctrine()->getEntityManager()->find("KatropineAdminBundle:SubscriptionOrder", $sid);
        }
        $company = $this->getDoctrine()->getEntityManager()->find("KatropineAdminBundle:Company", $id);
        $subscriptionOrder->setCompany($company);
        $subscriptionOrder->setStatus(SubscriptionOrder::STATUS_ACTIVE);
        $subscriptionOrder->setPaid(false);
        
        
        $form = $this->createFormBuilder($subscriptionOrder)
            ->add('subscription', 'entity', array( 'class' => 'KatropineAdminBundle:Subscription', 'property' => 'name'))    
            ->add('save', 'submit', array( 'attr' => array( 'class' => 'btn btn-primary') ))
            ->add('cancel', 'button', array( 'attr' => array( 'onclick' => "window.location = '".$this->generateUrl('company_list')."'" ) ))
            ->getForm();
        
        $form->handleRequest($request);
        
        if ($request->isMethod('POST')) {
            if($form->isValid()){
                $em = $this->getDoctrine()->getEntityManager();
                
                $subscriptionOrder->setName($subscriptionOrder->getSubscription()->toString());
                $subscriptionOrder->setPrice($subscriptionOrder->getSubscription()->getPrice());
                $subscriptionOrder->setMaxUsers($subscriptionOrder->getSubscription()->getMaxUsers());
                $subscriptionOrder->setPeriod($subscriptionOrder->getSubscription()->getPeriod());
                $subscriptionOrder->setPeriodType($subscriptionOrder->getSubscription()->getPeriodType());
                
                $em->persist($subscriptionOrder);
                $em->flush();
                
                if($sid > 0){
                    $this->get('session')->getFlashBag()->set('success', 'message.Record_updated_successfully');
                }else{
                    $this->get('session')->getFlashBag()->set('success', 'message.New_record_added_successfully');
                }
                return $this->redirect($this->generateUrl('subscribe_activate', ['id' => $subscriptionOrder->getId()]));
            }else{
                $this->get('session')->getFlashBag()->set('warning', 'message.Unable_to_save_record_form_is_not_valid');
                // exit(\Doctrine\Common\Util\Debug::dump($company));
            }
        }
        
        return array(
            'form' => $form->createView(),
            'company' => $company,
            'route_name' => 'company_subscribe'
        );
        
    }
    /**
     * 
     * @Route("/{id}/show/subscriptions/page/{page}/", name="company_subscriptions")
     * @Template()
     */
    public function subscriptionsAction($id = 0, $page = 0){
        $route_name = 'company_subscriptions';
        
        $company = $this->getDoctrine()->getRepository('KatropineAdminBundle:Company')->fetchById($id);
        // pagination init
        $maxRows = $myVariable = $this->container->getParameter('max_rows');
        $maxPaginationLinks = $this->container->getParameter('max_pagination_links');
        
        $total = $this->getDoctrine()->getRepository('KatropineAdminBundle:SubscriptionOrder')->countAllByCompanyId($id);
        $pagination = new Pagination($maxRows, $maxPaginationLinks);
        $pg = $pagination->calc($page, $total);
        $pg->setUrlFirst($this->generateUrl($route_name, array('id' => $id,'page' => $pg->first)))
                ->setUrlPrev($this->generateUrl($route_name, array('id' => $id, 'page' => $pg->prev)))
                ->setUrlIterated($this->generateUrl($route_name, array('id' => $id, 'page' => '%s')))
                ->setUrlNext($this->generateUrl($route_name, array('id' => $id,'page' => $pg->next)))
                ->setUrllast($this->generateUrl($route_name, array('id' => $id,'page' => $pg->last)));
   
        $orders = $this->getDoctrine()->getRepository('KatropineAdminBundle:SubscriptionOrder')->fetchByCompanyId($id, $pagination->getLimit(), $pagination->getOffset());
       
        return array(
            'company' => $company,
            'orders' => $orders,
            'total'         => $total, 
            'pagination'    => $pg,
            'q' => '',
            'route_name' => $route_name,
            'page' => $page
        );
    }
    
    /**
     * @Route("/subscribe/{id}/edit/callback/{page}/", name="subscribe_activate")
     * @Template()
     */
    public function activateAction(Request $request, $id=0, $page = 0){
        
      
        if($id == 0){
            exit('id can not be 0');
        }else{
            $subscriptionOrder = $this->getDoctrine()->getEntityManager()->find("KatropineAdminBundle:SubscriptionOrder", $id);
        }
        
        $form = $this->createFormBuilder($subscriptionOrder)
            ->add('name', 'text', array( 'label' => 'Name'))
            ->add('startDate', 'date', array('label' => 'Start_Date', 'attr' => array('class' => 'short inline')))
            ->add('endDate', 'date', array('label' => 'End_Date', 'attr' => array('class' => 'short inline') ))
            ->add('status', 'choice', array('label' => 'Status', 'choices' => $subscriptionOrder->getAllStatuses())) 
            ->add('price', 'text', array( 'label' => 'Price'))  
            ->add('period', 'text', array( 'label' => 'Period'))
            ->add('periodType', 'choice', array( 'label' => 'Period_type', 'choices' => (new Subscription)->getAllPeriodType()))    
            ->add('paid', 'choice', array('label' => 'Paid', 'choices' => array('No', 'Yes')))       
            ->add('save', 'submit', array( 'attr' => array( 'class' => 'btn btn-primary') ))
            ->add('cancel', 'button', array( 'attr' => array( 'onclick' => "window.location = '".$this->generateUrl('company_subscriptions', array('id' => $subscriptionOrder->getCompany()->getId()))."'" ) ))
            ->getForm();
        
        $form->handleRequest($request);

        if ($request->isMethod('POST')) {
            if($form->isValid()){
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($subscriptionOrder);
                $em->flush();
                
                if($id > 0){
                    $this->get('session')->getFlashBag()->set('success', 'message.Record_updated_successfully');
                }else{
                    $this->get('session')->getFlashBag()->set('success', 'message.New_record_added_successfully');
                }
                return $this->redirect($this->generateUrl('company_subscriptions', ['id' => $subscriptionOrder->getCompany()->getId(), 'page' => $page]));
            }else{
                $this->get('session')->getFlashBag()->set('warning', 'message.Unable_to_save_record_form_is_not_valid');
                // exit(\Doctrine\Common\Util\Debug::dump($company));
            }
        }
        
        return array(
            'form' => $form->createView(),
            'company' => $subscriptionOrder->getCompany(),
            'route_name' => 'company_subscriptions'
        );
    }
    
    
    
    /**
     * @Route("/company/{id}/settings/", name="company_settings")
     * @Template()
     */
    public function settingsAction($id){
        $company = $this->getDoctrine()->getRepository('KatropineAdminBundle:Company')->fetchById($id);
        
        return [
            'company' => $company,
            'form' => $form
        ];
    }
    
}
