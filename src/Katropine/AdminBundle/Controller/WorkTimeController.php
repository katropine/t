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
use Katropine\AdminBundle\Entity\WorkTime;
use Katropine\AdminBundle\Classes\TimeHelper;
use Doctrine\ORM\EntityRepository;
/**
* @Route("/worktime")
* http://localhost/timelly/web/app_dev.php/admin/worktime/
*/
class WorkTimeController extends Controller{
    
    /**
     * @Route("/", name="work_time_default")
     */
    public function indexAction(){
        return $this->redirect($this->generateUrl('work_time_list', ['page' => 1]));
    }
    /**
     * @Route("/list/page/{page}", name="work_time_list")
     * @Route("/list/page/{page}/company/{cid}", name="company_work_time_list")
     * @Route("/list/page/{page}/user/{uid}", name="user_work_time_list")
     * @Template()
     */
    public function listAction($uid = 0, $cid = 0, $page = 0){
        
        $user = null;
        $durationSum = null;
        if($uid > 0){
            $total = $this->getDoctrine()->getRepository('KatropineAdminBundle:WorkTime')->countAllByUserId($uid);
            $user = $this->getDoctrine()->getEntityManager()->find("KatropineAdminBundle:User", $uid);
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
            $durationSum = $this->getDoctrine()->getRepository('KatropineAdminBundle:WorkTime')->sumDurationByUserId($uid);
        }else{
            $worktimes = $this->getDoctrine()->getRepository('KatropineAdminBundle:WorkTime')->fetchByUserId($uid, $pagination->getLimit(), $pagination->getOffset());
        }
        $worktimeCount = count($worktimes);
        
        return array(
            'worktimes'         => $worktimes, 
            'worktimeCount'     => $worktimeCount,
            'user'              => $user,
            'total'             => $total, 
            'pagination'        => $pg,
            'route_name'        => $route_name,
            'durationSum'       =>  TimeHelper::convertToHoursMins($durationSum, "%02d:%02d")
        );
    }
    
    /**
     * @Route("/addnew/company/{cid}/", name="company_work_time_addnew")
     * @Route("/addnew/user/{uid}", name="user_work_time_addnew")
     * @Route("/{id}/edit/", name="work_time_edit")
     * @Template()
     */
    public function saveAction(Request $request, $id = 0, $uid = 0){
        
        $user = null;
        if($id > 0){
            $worktime = $this->getDoctrine()->getEntityManager()->find("Katropine\AdminBundle\Entity\WorkTime", $id);
            if($uid > 0){
                $user = $this->getDoctrine()->getEntityManager()->find("KatropineAdminBundle:User", $uid);
            }else{
                $user = $worktime->getUser();
            }
            
        }else{
            $user = $this->getDoctrine()->getEntityManager()->find("KatropineAdminBundle:User", $uid);
            $worktime = new WorkTime();
            $worktime->setUser($user);
            $worktime->setTimeStart(new \DateTime());
            $worktime->setTimeStop(new \DateTime());
            $worktime->setTimezone($user->getTimezone());
            
            
        }
        $returnUrl = $this->generateUrl('user_work_time_list', ['uid' => $user->getId()]);
        //exit(\Doctrine\Common\Util\Debug::dump($user));
        $formBuilder = $this->createFormBuilder($worktime);
        
        if($uid > 0){
//            $employmentContracts = $this->getDoctrine()->getRepository('KatropineAdminBundle:EmploymentContract')->fetchAllByCompanyId($user->getCompany()->getId());
//            
//            $dql = "SELECT s FROM KatropineAdminBundle:EmploymentContract s INNER JOIN s.company c WHERE c.id = :cid AND s INSTANCE OF KatropineAdminBundle:EmploymentContract ORDER BY s.id DESC";
//            
            $formBuilder->add('employmentContract', 'entity', array(
                'class' => 'KatropineAdminBundle:EmploymentContract',
                'query_builder' => function(EntityRepository $repository) use ($user){
                    return $repository->createQueryBuilder('s')
                                ->innerJoin('s.company','c')
                                ->where('c.id = :cid AND s INSTANCE OF KatropineAdminBundle:EmploymentContract')
                                ->setParameter('cid', $user->getCompany()->getId());
                    }
            ));
        }else{
            new \Symfony\Component\Security\Acl\Exception\Exception('this should not work');
        }
        
        $formBuilder->add('timeStart', 'datetime', ['label' => 'Time_start', 'attr' => ['class' => 'short inline']])
                            ->add('timeStop', 'datetime', ['label' => 'Time_stop', 'attr' => ['class' => 'short inline']])
                            ->add('timezone', 'timezone', ['label' => 'Timezone'])
                            ->add('save', 'submit', array( 'attr' => array( 'class' => 'btn btn-primary') ))
                            ->add('cancel', 'button', array( 'attr' => array( 'onclick' => "window.location = '{$returnUrl}'" ) ));
        $form = $formBuilder->getForm();                    
        // do not touch modified, that one is only for users
        
        $form->handleRequest($request);
        
        if ($request->isMethod('POST')) {
            if($form->isValid()){
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($worktime);
                $em->flush();
                if($id > 0){
                    $this->get('session')->getFlashBag()->set('success', 'message.Record_updated_successfully');
                }else{
                    $this->get('session')->getFlashBag()->set('success', 'message.New_record_added_successfully');
                }
                return $this->redirect($this->generateUrl('user_work_time_list', ['uid' => $user->getId()]));
            }else{
                $this->get('session')->getFlashBag()->set('warning', 'message.Unable_to_save_record_form_is_not_valid');
            }
        }
        
        return [
            'form' => $form->createView(),
            'user' => $user
        ];
    }
    /**
     * @Route("/{id}/delete/", name="work_time_delete")
     * @Template()
     */
    public function deleteAction($id){
        if($id == 0){
            throw $this->createNotFoundException(
                    'No data found for id ' . $id
            );
        }
        
        $worktime = $this->getDoctrine()->getEntityManager()->find("KatropineAdminBundle:WorkTime", $id);
        $user = $worktime->getUser();
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($worktime);
        $em->flush();
        
        $this->get('session')->getFlashBag()->set('success', 'message.Record_deleted_successfully');
        return $this->redirect($this->generateUrl('user_work_time_list', ['page' => 0, 'uid' => $user->getId()]));
    }

}
