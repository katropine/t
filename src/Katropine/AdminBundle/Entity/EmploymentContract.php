<?php
namespace Katropine\AdminBundle\Entity;
/**
 * Description of WorkTimePolicy
 *
 * @author Kristian Beres <kristian@katropine.com>
 * @since Aug 1, 2014
 */
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Katropine\AdminBundle\Entity\EmploymentContractTemplate;
/**
 * @ORM\Entity(repositoryClass="Katropine\AdminBundle\Repository\EmploymentContractRepository")
 * @ORM\Table(name="timelly_employment_contract")
 * @ORM\HasLifecycleCallbacks
 */
class EmploymentContract extends EmploymentContractTemplate{
    
        
    /**
     *
     * @ORM\Column(type="boolean", name="def", options={"default":0})
     */
    protected $default;
           
    /**
     *
     * @ManyToOne(targetEntity="Katropine\AdminBundle\Entity\User")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    protected $user;
    
    /**
     *
     * @ORM\Column(type="date", name="start_date") 
     */
    protected $startDate;
    
    /**
     *
     * @ORM\Column(type="date", name="end_date", nullable=true) 
     */
    protected $endDate;
    
    
    public function getDefault() {
        return $this->default;
    }

    public function getUser() {
        return $this->user;
    }

    public function setDefault($default) {
        $this->default = $default;
    }

    public function setUser($user) {
        $this->user = $user;
    }
    
    public function getStartDate() {
        return $this->startDate;
    }

    public function getEndDate() {
        return $this->endDate;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }

}