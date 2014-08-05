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
 * @ORM\Entity(repositoryClass="Katropine\AdminBundle\Repository\EmploymentContractRepository")
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
     *
     * @ManyToOne(targetEntity="Katropine\AdminBundle\Entity\Company", cascade={"all"})
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $company;
    
    /**
     *
     * @ORM\Column(type="string")
     */
    protected $name;
    
    /**
     *
     * @ORM\Column(type="time", name="min_hours_per_week", options={"default":"37:30:00"})
     */
    protected $minHoursPerWeek;
    
    /**
     *
     * @ORM\Column(type="time", name="working_day_duration", options={"default":"07:30:00"})
     */
    protected $workingDayDuration;
    
    /**
     *
     * @ORM\Column(type="time", name="lunch_break_duration", options={"default":"00:30:00"})
     */
    protected $lunchBreakDuration;
    
    /**
     *
     * @ORM\Column(type="boolean", name="lunch_break_excluded", options={"default":1})
     */
    protected $lunchBreakExcluded;
    
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
    
    public function getCompany() {
        return $this->company;
    }

    public function getName() {
        return $this->name;
    }

    public function getMinHoursPerWeek() {
        return $this->minHoursPerWeek;
    }

    public function getWorkingDayDuration() {
        return $this->workingDayDuration;
    }

    public function getLunchBreakDuration() {
        return $this->lunchBreakDuration;
    }

    public function getLunchBreakExcluded() {
        return $this->lunchBreakExcluded;
    }

    public function setCompany($company) {
        $this->company = $company;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setMinHoursPerWeek($minHoursPerWeek) {
        $this->minHoursPerWeek = $minHoursPerWeek;
    }

    public function setWorkingDayDuration($workingDayDuration) {
        $this->workingDayDuration = $workingDayDuration;
    }

    public function setLunchBreakDuration($lunchBreakDuration) {
        $this->lunchBreakDuration = $lunchBreakDuration;
    }

    public function setLunchBreakExcluded($lunchBreakExcluded) {
        $this->lunchBreakExcluded = $lunchBreakExcluded;
    }


}