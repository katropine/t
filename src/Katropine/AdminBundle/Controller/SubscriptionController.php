<?php

/**
 * Description of SubscriptionController
 *
 * @author Kriss
 * @since Jul 26, 2014
 */

namespace Katropine\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Katropine\AdminBundle\Classes\Pagination;
use Symfony\Component\HttpFoundation\Request;
use Katropine\AdminBundle\Entity\Subscription;

/**
* @Route("/subscription")
* http://localhost/timelly/web/app_dev.php/admin/subscription/
*/
class SubscriptionController extends Controller{
    
    /**
     * @Route("/list/", name="subscription_list")
     * @Route("/list/page/{page}/")
     * @Template()
     */
    public function listAction($page = 1) {
        
        $q = Request::createFromGlobals()->query->get('q');
        
        $total = $this->getDoctrine()->getRepository('KatropineAdminBundle:Subscription')->countAll($q);
        // pagination init
        $maxRows = $myVariable = $this->container->getParameter('max_rows');
        $maxPaginationLinks = $this->container->getParameter('max_pagination_links');
                
        $pagination = new Pagination($maxRows, $maxPaginationLinks);
        $pg = $pagination->calc($page, $total);
        
        // set custom links to pagination
        $pg->setUrlFirst($this->generateUrl('subscription_list', array('page' => $pg->first, 'q' => $q)))
                ->setUrlPrev($this->generateUrl('subscription_list', array('page' => $pg->prev, 'q' => $q)))
                ->setUrlIterated($this->generateUrl('subscription_list', array('page' => '%s', 'q' => $q)))
                ->setUrlNext($this->generateUrl('subscription_list', array('page' => $pg->next, 'q' => $q)))
                ->setUrllast($this->generateUrl('subscription_list', array('page' => $pg->last, 'q' => $q)));
        
        $subscriptions = $this->getDoctrine()->getRepository('KatropineAdminBundle:Subscription')->fetchBatch($q, $pagination->getLimit(), $pagination->getOffset());
        $subscriptionCount = count($subscriptions);
        
        return array(
            'subscriptions'         => $subscriptions, 
            'subscriptionCount'     => $subscriptionCount, 
            'total'         => $total, 
            'pagination'    => $pg,
            'q'             => $q
        );
    }
    
    /**
     * @Route("/addnew/", name="subscription_addnew")
     * @Route("/{id}/edit/", name="subscription_edit")
     * @Template()
     */
    public function saveAction(Request $request, $id = 0){
        
        if($id == 0){
            $subscription= new Subscription();
        }else{
            $subscription = $this->getDoctrine()->getEntityManager()->find("KatropineAdminBundle:Subscription", $id);
        }
        
        $form = $this->createFormBuilder($subscription)
            ->add('name', 'text', array('label' => 'Subscription_name'))
            ->add('price', 'text', array('label' => 'Subscription_price'))
            ->add('period', 'text', array('label' => 'Subscription_period'))
            ->add('periodType', 'choice', array('choices' => $subscription->getAllPeriodType(),'label' => 'Subscription_period_type'))    
            ->add('maxUsers', 'text', array('label' => 'Subscription_maxusers'))    
            ->add('save', 'submit', array( 'attr' => array( 'class' => 'btn btn-primary') ))
            ->add('cancel', 'button', array( 'attr' => array( 'onclick' => "window.location = '".$this->generateUrl('subscription_list')."'" ) ))
            ->getForm();
        
        $form->handleRequest($request);

        if ($request->isMethod('POST')) {
            if($form->isValid()){
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($subscription);
                $em->flush();
                if($id > 0){
                    $this->get('session')->getFlashBag()->set('success', 'message.Record_updated_successfully');
                }else{
                    $this->get('session')->getFlashBag()->set('success', 'message.New_record_added_successfully');
                }
                return $this->redirect($this->generateUrl('subscription_edit', ['id' => $subscription->getId()]));
            }else{
                $this->get('session')->getFlashBag()->set('warning', 'message.Unable_to_save_record_form_is_not_valid');
                // exit(\Doctrine\Common\Util\Debug::dump($subscription));
            }
        }
        
        return array(
            'form' => $form->createView(),
            'subscription' => $subscription
        );
    }
    
    /**
     * @Route("/{id}/show/page/{page}/", name="subscription_show")
     * @Template()
     */
    public function showAction($id=0, $page = 1){
        
    }
    
    /**
     * @Route("/{id}/delete/", name="subscription_delete")
     * @Template()
     */
    public function deleteAction($id = 0){
        if($id == 0){
            throw $this->createNotFoundException(
                    'No data found for id ' . $id
            );
        }
        $subscription = $this->getDoctrine()->getEntityManager()->find("KatropineAdminBundle:Subscription", $id);
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($subscription);
        $em->flush();
        // show warning that all the users will be deleted!!!
        $this->get('session')->getFlashBag()->set('success', 'message.Record_deleted_successfully');
        return $this->redirect($this->generateUrl('subscription_list'));
    }
    
    
    
}
