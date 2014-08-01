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
use Katropine\AdminBundle\Classes\EntityCore;
/**
 * @ORM\Entity(repositoryClass="Katropine\AdminBundle\Repository\WorkTimeRepository")
 * @ORM\Table(name="timelly_employment_contract")
 * @ORM\HasLifecycleCallbacks
 */
class EmploymentContract extends EntityCore{
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *
     * @ORM\Column(type="boolean", name="def", options={"default":0})
     */
    protected $default;
    
    /**
     * @ORM\Column(name="employment_type_id", type="integer", nullable=true)
     * @ManyToOne(targetEntity="Katropine\AdminBundle\Entity\EmploymentType")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $employmentType;
    
    /**
     * @ManyToOne(targetEntity="Katropine\AdminBundle\Entity\User")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $user;
    
    /**
     *
     * @ORM\Column(type="integer", name="vacation_days_per_year", options={"default":20})
     */
    protected $vacationDaysPerYear;
    
    public function getId() {
        return $this->id;
    }

    public function getDefault() {
        return $this->default;
    }

    public function getEmploymentType() {
        return $this->employmentType;
    }

    public function getVacationDaysPerYear() {
        return $this->vacationDaysPerYear;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDefault($default) {
        $this->default = $default;
    }

    public function setEmploymentType($employmentType) {
        $this->employmentType = $employmentType;
    }

    public function setVacationDaysPerYear($vacationDaysPerYear) {
        $this->vacationDaysPerYear = $vacationDaysPerYear;
    }


}