<?php

/**
 * Description of WorkTime
 *
 * @author Kristian Beres <kristian@katropine.com>
 * @since Jul 16, 2014
 */
namespace Katropine\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * @ORM\Entity(repositoryClass="Katropine\AdminBundle\Repository\WorkTimeRepository")
 * @ORM\Table(name="timelly_worktime")
 * @ORM\HasLifecycleCallbacks
 */
class WorkTime {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     *
     * @ORM\Column(type="datetime",name="time_start")
     */
    protected $timeStart;
    /**
     *
     * @ORM\Column(type="datetime", name="time_stop")
     */
    protected $timeStop;
    
    /**
     *
     * @ORM\Column(type="string", name="timezone")
     */
    protected $timezone;
    
    /**
     *
     * @ORM\Column(type="boolean", options={"default":0}) 
     */
    protected $modified = false;

    /**
     *
     * @ManyToOne(targetEntity="Katropine\AdminBundle\Entity\User", cascade={"all"})
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $user;
    
    
    public function getId() {
        return $this->id;
    }

    public function getTimeStart() {
        return $this->timeStart;
    }

    public function getTimeStop() {
        return $this->timeStop;
    }

    public function getUser() {
        return $this->user;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTimeStart($timeStart) {
        $this->timeStart = $timeStart;
    }

    public function setTimeStop($timeStop) {
        $this->timeStop = $timeStop;
    }

    public function setUser($user) {
        $this->user = $user;
    }
    public function getTimezone() {
        return $this->timezone;
    }

    public function setTimezone($timezone) {
        $this->timezone = $timezone;
    }

    public function isModified() {
        return ($this->modified === true)? true : false;
    }

    public function setModified($modified) {
        $this->modified = $modified;
    }




}
