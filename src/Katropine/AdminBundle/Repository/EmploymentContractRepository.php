<?php
namespace Katropine\AdminBundle\Repository;
/**
 * Description of EmploymentContract
 *
 * @author Kristian Beres <kristian@katropine.com>
 * @since Aug 4, 2014
 */
use Doctrine\ORM\EntityRepository;

class EmploymentContractRepository extends EntityRepository{

    public function fetchByCompanyId($cid, $offset, $limit) {
        $dql = "SELECT s FROM KatropineAdminBundle:EmploymentContract s INNER JOIN s.company c WHERE c.id = :cid ORDER BY s.id DESC";
        
        return $this->getEntityManager()->createQuery($dql)
                        ->setParameter("cid", $cid)
                        ->setFirstResult($offset)
                        ->setMaxResults($limit)
                        ->getResult();
    }

    public function countAllByCompanyId($cid = 0) {
        $dql = "SELECT COUNT(s) FROM KatropineAdminBundle:EmploymentContract s INNER JOIN s.company c WHERE c.id = :cid";
        return $this->getEntityManager()->createQuery($dql)
                ->setParameter("cid", $cid)
                ->getSingleScalarResult();
    }

}
