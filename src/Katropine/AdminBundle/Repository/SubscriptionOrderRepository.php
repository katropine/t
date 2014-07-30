<?php
namespace Katropine\AdminBundle\Repository;

/**
 * Description of SubscriptionRepository
 *
 * @author Kriss
 * @since Jul 26, 2014
 */
use Doctrine\ORM\EntityRepository;

class SubscriptionOrderRepository extends EntityRepository {

    public function fetchByCompanyId($cid = 0,  $limit = 10, $offset = 0) {
        $dql = "SELECT s FROM KatropineAdminBundle:SubscriptionOrder s INNER JOIN s.company c WHERE c.id = :cid ORDER BY c.id DESC";
        
        return $this->getEntityManager()->createQuery($dql)
                        ->setParameter("cid", $cid)
                        ->setFirstResult($offset)
                        ->setMaxResults($limit)
                        ->getResult();
    }

    public function countAllByCompanyId($cid = 0) {
        $dql = "SELECT COUNT(s) FROM KatropineAdminBundle:SubscriptionOrder s INNER JOIN s.company c WHERE c.id = :cid";
        return $this->getEntityManager()->createQuery($dql)
                ->setParameter("cid", $cid)
                ->getSingleScalarResult();
    }
    
}
