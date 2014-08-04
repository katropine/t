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
 * @ORM\Table(name="timelly_employment_type")
 * @ORM\HasLifecycleCallbacks
 */
class EmploymentType extends EntityCore{
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
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
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getMinHoursPerWeek() {
        return $this->minHoursPerWeek;
    }



    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setMinHoursPerWeek($minHoursPerWeek) {
        $this->minHoursPerWeek = $minHoursPerWeek;
    }

    public function getWorkingDayDuration() {
        return $this->workingDayDuration;
    }

    public function getLunchBreakDuration() {
        return $this->lunchBreakDuration;
    }

    public function isLunchBreakExcluded() {
        return $this->lunchBreakExcluded;
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
