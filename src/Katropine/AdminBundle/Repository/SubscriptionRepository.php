<?php
namespace Katropine\AdminBundle\Repository;

/**
 * Description of SubscriptionRepository
 *
 * @author Kriss
 * @since Jul 26, 2014
 */
use Doctrine\ORM\EntityRepository;

class SubscriptionRepository extends EntityRepository {

    public function fetchBatch($q = "",  $limit = 10, $offset = 0) {
        $dql = "SELECT s FROM KatropineAdminBundle:Subscription s WHERE s.name LIKE :name ORDER BY s.id DESC";
        
        return $this->getEntityManager()->createQuery($dql)
                        ->setParameter("name", "%{$q}%")
                        ->setFirstResult($offset)
                        ->setMaxResults($limit)
                        ->getResult();
    }

    public function countAll($q = "") {
        $dql = "SELECT COUNT(s) FROM KatropineAdminBundle:Subscription s WHERE s.name LIKE :name";
        return $this->getEntityManager()->createQuery($dql)
                ->setParameter("name", "%{$q}%")
                ->getSingleScalarResult();
    }
    
}
