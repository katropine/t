<?php
namespace Katropine\AdminBundle\Repository;
/**
 * Description of CompanyRepository
 *
 * @author Kristian Beres <kristian@katropine.com>
 * @since Jul 14, 2014
 */
use Doctrine\ORM\EntityRepository;

class CompanyRepository extends EntityRepository {
    
    
    public function fetchById($id){
        $dql = "SELECT c FROM KatropineAdminBundle:Company c WHERE c.id = :id ORDER BY c.id DESC";
        return $this->getEntityManager()->createQuery($dql)
                ->setFetchMode('User', 'users', \Doctrine\ORM\Mapping\ClassMetadata::FETCH_EXTRA_LAZY)
                ->setParameter("id", $id)
                ->getSingleResult();
    }
    
    public function fetchBatch($q = "",  $limit = 10, $offset = 0) {
        $dql = "SELECT c FROM KatropineAdminBundle:Company c WHERE c.name LIKE :name ORDER BY c.id DESC";
        
        return $this->getEntityManager()->createQuery($dql)
                        ->setParameter("name", "%{$q}%")
                        ->setFirstResult($offset)
                        ->setMaxResults($limit)
                        ->getResult();
    }

    public function countAll($q = "") {
        $dql = "SELECT COUNT(c) FROM KatropineAdminBundle:Company c WHERE c.name LIKE :name";
        return $this->getEntityManager()->createQuery($dql)
                ->setParameter("name", "%{$q}%")
                ->getSingleScalarResult();
    }
}
