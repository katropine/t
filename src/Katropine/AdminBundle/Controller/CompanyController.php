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

/**
* @Route("/company")
* http://localhost/timelly/web/app_dev.php/admin/company/
*/
class CompanyController extends Controller{

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
            'q' => ''
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
            ->add('save', 'submit', array( 'attr' => [ 'class' => 'btn btn-primary'] ))
            ->add('cancel', 'button', array( 'attr' => [ 'onclick' => "window.location = '".$this->generateUrl('company_list')."'" ] ))
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
    
}
