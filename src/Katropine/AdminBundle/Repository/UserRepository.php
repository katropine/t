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

    public function fetchBatch($q = "", $limit = 10, $offset = 0) {
        $dql = "SELECT u FROM KatropineAdminBundle:User u WHERE u.firstname LIKE :firstname OR u.lastname LIKE :lastname OR u.email LIKE :email";
        
        return $this->getEntityManager()->createQuery($dql)
                        ->setParameter("firstname", "%{$q}%")
                        ->setParameter("lastname", "%{$q}%")
                        ->setParameter("email", "%{$q}%")
                        ->setFirstResult($offset)
                        ->setMaxResults($limit)
                        ->getResult();
    }

    public function countAll($q = "") {
        $dql = "SELECT count(u) FROM KatropineAdminBundle:User u WHERE u.firstname LIKE :firstname OR u.lastname LIKE :lastname OR u.email LIKE :email";
        return $this->getEntityManager()->createQuery($dql)
                ->setParameter("firstname", "%{$q}%")
                ->setParameter("lastname", "%{$q}%")
                ->setParameter("email", "%{$q}%")
                ->getSingleScalarResult();
    }
    
    public function fetchByCompanyId($id, $limit = 10, $offset = 0){
        
        $dql = "SELECT u FROM KatropineAdminBundle:User u WHERE IDENTITY(u.company) = :id";
        
        $query = $this->getEntityManager()->createQuery($dql)
                        ->setParameter("id", $id) 
                        ->setFirstResult($offset)
                        ->setMaxResults($limit);
                        
                        
        //print $query->getSQL();
        return $query->getResult();
    }
    
    public function countAllByCompanyId($id){
        $dql = "SELECT COUNT(u) FROM KatropineAdminBundle:User u WHERE IDENTITY(u.company) = :id";
        
        return $this->getEntityManager()->createQuery($dql)
                        ->setParameter("id", $id) 
                        ->getSingleScalarResult();
    }

}
