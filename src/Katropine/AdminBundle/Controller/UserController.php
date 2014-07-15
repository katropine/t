<?php

/**
 * Description of UserController
 *
 * @author Kriss
 * @since Jul 13, 2014
 */
namespace Katropine\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Katropine\AdminBundle\Classes\Pagination;
use Symfony\Component\HttpFoundation\Request;

/**
* @Route("/user")
* http://localhost/timelly/web/app_dev.php/admin/user/
*/
class UserController extends Controller{
    
    /**
     * @Route("/list/page/{page}/", name="user_list")
     * @Route("/list/")
     * @Template()
     */
    public function listAction($page = 1) {
        
        $q = Request::createFromGlobals()->query->get('q');
        
        $total = $this->getDoctrine()->getRepository('KatropineAdminBundle:User')->countAll($q);
        
        $maxRows = 50;
        
        $pagination = new Pagination($maxRows, 5);
        $pg = $pagination->calc($page, $total);
        
        // set custom links to pagination
        $pg->setUrlFirst($this->generateUrl('user_list', array('page' => $pg->first, 'q' => $q)))
                ->setUrlPrev($this->generateUrl('user_list', array('page' => $pg->prev, 'q' => $q)))
                ->setUrlIterated($this->generateUrl('user_list', array('page' => '%s', 'q' => $q)))
                ->setUrlNext($this->generateUrl('user_list', array('page' => $pg->next, 'q' => $q)))
                ->setUrllast($this->generateUrl('user_list', array('page' => $pg->last, 'q' => $q)));
        
        $users = $this->getDoctrine()->getRepository('KatropineAdminBundle:User')->fetchBatch($q, $pagination->getLimit(), $pagination->getOffset());
        $userCount = count($users);
        
        return array(
            'users'         => $users, 
            'userCount'     => $userCount, 
            'total'         => $total, 
            'pagination'    => $pg,
            'q'             => $q
        );
    }
    /**
     * @Route("/{id}/delete/", name="user_list_delete")
     * @Template()
     */
    public function deleteAction($id = 0){
        return array();
    }
    
    
    
    /**
     * @Route("/seed")
     * @Template()
     */
    public function seedAction() {
        
        $pre = rand(2, 10000);
        $company = new \Katropine\AdminBundle\Entity\Company();
        $company->setName('ACME_'.$pre);
        
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($company);
        $em->flush();
        
        for($i=0; $i <= 100; $i++){
            $pre = rand(2, 10000);
            $user = new \Katropine\AdminBundle\Entity\User();
            $user->setFirstname($pre."User".$i);
            $user->setLastname($pre."Surname".$i);
            $user->setType('WORKER');
            $user->setPassword("ssssss");
            $user->setEmail($pre."user{$i}@test.com");
            $user->setCompany($company);
            
            $em->persist($user);
            $em->flush();
        }
        
        die("done");
    }

}
