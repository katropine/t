<?php
namespace Katropine\AdminBundle\Repository;
/**
 * Description of EmploymentContractTemplate
 *
 * @author Kristian Beres <kristian@katropine.com>
 * @since Aug 4, 2014
 */
use Doctrine\ORM\EntityRepository;

class EmploymentContractRepository extends EntityRepository{

    public function fetchByCompanyId($cid, $limit = 10, $offset = 0) {
        $dql = "SELECT s FROM KatropineAdminBundle:EmploymentContract s INNER JOIN s.company c WHERE c.id = :cid AND s INSTANCE OF KatropineAdminBundle:EmploymentContract ORDER BY s.id DESC";
        
        return $this->getEntityManager()->createQuery($dql)
                        ->setParameter("cid", $cid)
                        ->setFirstResult($offset)
                        ->setMaxResults($limit)
                        ->getResult();
    }
    
    public function fetchAllByCompanyId($cid) {
        $dql = "SELECT s FROM KatropineAdminBundle:EmploymentContract s INNER JOIN s.company c WHERE c.id = :cid AND s INSTANCE OF KatropineAdminBundle:EmploymentContract ORDER BY s.id DESC";
        
        return $this->getEntityManager()->createQuery($dql)
                        ->setParameter("cid", $cid)
                        ->getResult();
    }    

    public function countAllByCompanyId($cid = 0) {
        $dql = "SELECT COUNT(s) FROM KatropineAdminBundle:EmploymentContract s INNER JOIN s.company c WHERE c.id = :cid AND s INSTANCE OF KatropineAdminBundle:EmploymentContract ";
        return $this->getEntityManager()->createQuery($dql)
                ->setParameter("cid", $cid)
                ->getSingleScalarResult();
    }
    public function fetchByUserId($uid, $limit = 10, $offset = 0){
         $dql = "SELECT s FROM KatropineAdminBundle:EmploymentContract s INNER JOIN s.user u WHERE u.id = :uid AND s INSTANCE OF KatropineAdminBundle:EmploymentContract ORDER BY s.id DESC";
        
        return $this->getEntityManager()->createQuery($dql)
                        ->setParameter("uid", $uid)
                        ->setFirstResult($offset)
                        ->setMaxResults($limit)
                        ->getResult();
    }
    
    public function countAllByUserId($uid = 0) {
        $dql = "SELECT COUNT(s) FROM KatropineAdminBundle:EmploymentContract s INNER JOIN s.user u WHERE u.id = :uid AND s INSTANCE OF KatropineAdminBundle:EmploymentContract ";
        return $this->getEntityManager()->createQuery($dql)
                ->setParameter("uid", $uid)
                ->getSingleScalarResult();
    }
    

    public function fetchBatch($q = "", $limit = 10, $offset = 0) {
        $dql = "SELECT s FROM KatropineAdminBundle:EmploymentContract s WHERE s.name LIKE :name AND s INSTANCE OF KatropineAdminBundle:EmploymentContract  ORDER BY s.id DESC";
        
        return $this->getEntityManager()->createQuery($dql)
                        ->setParameter("name", "%{$q}%")
                        ->setFirstResult($offset)
                        ->setMaxResults($limit)
                        ->getResult();
    }

    public function countAll($q = "") {
        $dql = "SELECT COUNT(s) FROM KatropineAdminBundle:EmploymentContract s WHERE s.name LIKE :name AND s INSTANCE OF KatropineAdminBundle:EmploymentContract ";
        return $this->getEntityManager()->createQuery($dql)
                ->setParameter("name", "%{$q}%")
                ->getSingleScalarResult();
    }
    
}
