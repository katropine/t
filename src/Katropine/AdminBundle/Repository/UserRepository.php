<?php

namespace Katropine\AdminBundle\Repository;

/**
 * Description of UserRepository
 *
 * @author Kriss
 * @since Jul 13, 2014
 */
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository {

    public function fetchBatch($limit = 0, $offset = 10) {
        $dql = "SELECT u FROM KatropineAdminBundle:User u";
        
        return $this->getEntityManager()->createQuery($dql)
                        ->setFirstResult($offset)
                        ->setMaxResults($limit)
                        ->getResult();
    }

    public function countAll() {
        $dql = "SELECT count(u) FROM KatropineAdminBundle:User u";
        return $this->getEntityManager()->createQuery($dql)->getSingleScalarResult();
    }

}
