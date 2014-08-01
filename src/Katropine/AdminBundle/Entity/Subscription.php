<?php

/**
 * Description of Subscription
 *
 * @author Kriss
 * @since Jul 26, 2014
 */
namespace Katropine\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Katropine\AdminBundle\Classes\EntityCore;

/**
 * @ORM\Entity(repositoryClass="Katropine\AdminBundle\Repository\SubscriptionRepository")
 * @ORM\Table(name="timelly_subscription")
 * @ORM\HasLifecycleCallbacks
 */
class Subscription extends EntityCore{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=64)
     */
    protected $name;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $price;
    
    /**
     * @ORM\Column(type="integer", name="max_users")
     */
    protected $maxUsers;
        
    
    
    /**
     *
     * @ORM\Column(type="integer")
     */
    protected $period;
    
    
    
    const PERIOD_TYPE_MONTHS = "MONTHS";
    const PERIOD_TYPE_YEARS = "YEARS";
    
    /**
     *
     * @ORM\Column(type="string")
     */
    protected $periodType;
    
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }




    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPrice($price) {
        $this->price = $price;
    }
   
    public function getMaxUsers() {
        return $this->maxUsers;
    }

    public function setMaxUsers($maxUsers) {
        $this->maxUsers = $maxUsers;
    }

    public function setPeriodType($periodType) {
        if (!in_array($periodType, array(self::PERIOD_TYPE_MONTHS, self::PERIOD_TYPE_YEARS))) {
            throw new \InvalidArgumentException("Invalid status");
        }
        $this->periodType = $periodType;
    }
    public function getPeriodType() {
        return $this->periodType;
    }

    public function getPeriod() {
        return $this->period;
    }

    public function setPeriod($period) {
        $this->period = $period;
    }

    public function getAllPeriodType(){
        return array(self::PERIOD_TYPE_MONTHS=>self::PERIOD_TYPE_MONTHS, self::PERIOD_TYPE_YEARS=>self::PERIOD_TYPE_YEARS);
    }
    
    public function toString(){
        return $this->name." ".$this->price." ".$this->period." ".$this->periodType;
    }
}