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
/**
* @Route("/user")
* http://localhost/timelly/web/app_dev.php/admin/user/
*/
class UserController extends Controller{
    
    /**
     * @Route("/list", name="user_list")
     * @Route("/list/page/{page}/search/{q}")
     * @Template()
     */
    public function listAction($page = 1, $q = "") {
        
        $total = $this->getDoctrine()->getRepository('KatropineAdminBundle:User')->countAll($q);
        
        $maxRows = 50;
        
        $pagination = new Pagination($maxRows, 5);
        $pg = $pagination->calc($page, $total);
        
        //var_dump($pagination);
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
