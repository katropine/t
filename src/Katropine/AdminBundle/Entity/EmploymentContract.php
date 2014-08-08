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
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true , onDelete="SET NULL")
     */
    protected $company;
    
    /**
     *
     * @ORM\Column(type="string")
     */
    protected $name;
    
    /**
     *
     * @ORM\Column(type="decimal", name="min_hours_per_week", options={"default":160.00})
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
    
    /**
     *
     * @ORM\Column(type="decimal", name="night_shift_rate", scale=2, options={"default":2.0})
     */
    protected $nightShiftRate;
    /**
     *
     * @ORM\Column(type="decimal", name="day_shift_rate", scale=2, options={"default":1.0})
     */
    protected $dayShiftRate;
    /**
     *
     * @ORM\Column(type="decimal", name="late_shift_rate", scale=2, options={"default":1.5})
     */
    protected $lateShiftRate;
    /**
     *
     * @ORM\Column(type="decimal", name="weekend_shift_rate", scale=2, options={"default":2.0})
     */
    protected $weekendShiftRate;
    
    
    /**
     *
     * @ORM\Column(type="time", name="night_shift_start", options={"default":"00:01:00"})
     */
    protected $nightShiftStart;
    /**
     *
     * @ORM\Column(type="time", name="night_shift_end", options={"default":"08:00:00"})
     */
    protected $nightShiftEnd;
    
    /**
     *
     * @ORM\Column(type="time", name="day_shift_start", options={"default":"08:01:00"})
     */
    protected $dayShiftStart;
    /**
     *
     * @ORM\Column(type="time", name="day_shift_end", options={"default":"16:00:00"})
     */
    protected $dayShiftEnd;
    
    /**
     *
     * @ORM\Column(type="time", name="late_shift_start", options={"default":"16:01:00"})
     */
    protected $lateShiftStart;
    /**
     *
     * @ORM\Column(type="time", name="late_shift_end", options={"default":"00:00:00"})
     */
    protected $lateShiftEnd;
    
    
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
    
    public function getNightShiftRate() {
        return $this->nightShiftRate;
    }

    public function getDayShiftRate() {
        return $this->dayShiftRate;
    }

    public function getLateShiftRate() {
        return $this->lateShiftRate;
    }

    public function getNightShiftStart() {
        return $this->nightShiftStart;
    }

    public function getNightShiftEnd() {
        return $this->nightShiftEnd;
    }

    public function getDayShiftStart() {
        return $this->dayShiftStart;
    }

    public function getDayShiftEnd() {
        return $this->dayShiftEnd;
    }

    public function getLateShiftStart() {
        return $this->lateShiftStart;
    }

    public function getLateShiftEnd() {
        return $this->lateShiftEnd;
    }

    public function setNightShiftRate($nightShiftRate) {
        $this->nightShiftRate = $nightShiftRate;
    }

    public function setDayShiftRate($dayShiftRate) {
        $this->dayShiftRate = $dayShiftRate;
    }

    public function setLateShiftRate($lateShiftRate) {
        $this->lateShiftRate = $lateShiftRate;
    }

    public function setNightShiftStart($nightShiftStart) {
        $this->nightShiftStart = $nightShiftStart;
    }

    public function setNightShiftEnd($nightShiftEnd) {
        $this->nightShiftEnd = $nightShiftEnd;
    }

    public function setDayShiftStart($dayShiftStart) {
        $this->dayShiftStart = $dayShiftStart;
    }

    public function setDayShiftEnd($dayShiftEnd) {
        $this->dayShiftEnd = $dayShiftEnd;
    }

    public function setLateShiftStart($lateShiftStart) {
        $this->lateShiftStart = $lateShiftStart;
    }

    public function setLateShiftEnd($lateShiftEnd) {
        $this->lateShiftEnd = $lateShiftEnd;
    }
    public function getWeekendShiftRate() {
        return $this->weekendShiftRate;
    }

    public function setWeekendShiftRate($weekendShiftRate) {
        $this->weekendShiftRate = $weekendShiftRate;
    }



}