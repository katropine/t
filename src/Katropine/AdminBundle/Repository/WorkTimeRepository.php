<?php
namespace Katropine\AdminBundle\Repository;
/**
 * Description of WorkTimeRepository
 *
 * @author Kristian Beres <kristian@katropine.com>
 * @since Jul 16, 2014
 */
use Doctrine\ORM\EntityRepository;

class WorkTimeRepository extends EntityRepository {

    public function fetchByUserId($uid, $limit = 10, $offset = 0) {
        $dql = "SELECT w FROM KatropineAdminBundle:WorkTime w INNER JOIN w.user u WHERE u.id = :uid ORDER BY w.id DESC";
        
        return $this->getEntityManager()->createQuery($dql)
                        ->setParameter("uid", $uid)
                        ->setFirstResult($offset)
                        ->setMaxResults($limit)
                        ->getResult();
    }

    public function countAllByUserId($uid = 0) {
        $dql = "SELECT COUNT(w) FROM KatropineAdminBundle:WorkTime w INNER JOIN w.user u WHERE u.id = :uid";
        return $this->getEntityManager()->createQuery($dql)
                ->setParameter("uid", $uid)
                ->getSingleScalarResult();
    }
    
    public function fetchBatch($limit = 10, $offset = 0) {
        $dql = "SELECT w FROM KatropineAdminBundle:WorkTime w ORDER BY w.id DESC";
        
        return $this->getEntityManager()->createQuery($dql)
                        ->setFirstResult($offset)
                        ->setMaxResults($limit)
                        ->getResult();
    }

    public function countAll() {
        $dql = "SELECT COUNT(w) FROM KatropineAdminBundle:WorkTime w";
        return $this->getEntityManager()->createQuery($dql)
                ->getSingleScalarResult();
    }
    
    public function sumDurationByUserId($uid){
        $dql = "SELECT SUM(w.duration)  FROM KatropineAdminBundle:WorkTime w INNER JOIN w.user u WHERE u.id = :uid ORDER BY w.id";
        return $this->getEntityManager()->createQuery($dql)
                ->setParameter("uid", $uid)
                ->getSingleScalarResult();
    }

}
