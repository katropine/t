<?php

/**
 * Description of SubscriptionHistory
 *
 * @author Kriss
 * @since Jul 26, 2014
 */
namespace Katropine\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Katropine\AdminBundle\Entity\Subscription;
use Katropine\AdminBundle\Entity\Company;
use Katropine\AdminBundle\Classes\EntityCore;

/**
 * @ORM\Entity(repositoryClass="Katropine\AdminBundle\Repository\SubscriptionOrderRepository")
 * @ORM\Table(name="timelly_subscription_order")
 * @ORM\HasLifecycleCallbacks
 */
class SubscriptionOrder extends EntityCore{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=126)
     */
    protected $name;
    
    /**
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    protected $price;
    
    /**
     * @ORM\Column(type="integer", name="max_users", nullable=true)
     */
    protected $maxUsers;
        
    /**
     *
     * @ManyToOne(targetEntity="Katropine\AdminBundle\Entity\Company")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $company;
    
    /**
     *
     * @ManyToOne(targetEntity="Katropine\AdminBundle\Entity\Subscription")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $subscription;
    
    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $period;
    
    const PERIOD_TYPE_MONTHS = "MONTHS";
    const PERIOD_TYPE_YEARS = "YEARS";
    /**
     *
     * @ORM\Column(type="string")
     */
    protected $periodType;
    
    /** 
     * @ORM\Column(type="date", name="start_date", nullable=true) 
     */
    protected $startDate;
    
    /** 
     * @ORM\Column(type="date", name="end_date", nullable=true) 
     */
    protected $endDate;
    
    /**
     *
     * @ORM\Column(type="string", options={"default":"ACTIVE"}) 
     */
    protected $status;
    
    const STATUS_ACTIVE = "ACTIVE";
    const STATUS_EXPIRED = "EXPIRED";
    const STATUS_CANCELED = "CANCELED";
    
    /**
     *
     * @ORM\Column(type="boolean", options={"default":0}) 
     */
    protected $paid;
    
    
    
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getMaxUsers() {
        return $this->maxUsers;
    }

    public function getCompany() {
        return $this->company;
    }

    public function getPeriod() {
        return $this->period;
    }

    public function getStartDate() {
        return $this->startDate;
    }

    public function getEndDate() {
        return $this->endDate;
    }


    public function isPaid() {
        return $this->paid;
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

    public function setMaxUsers($maxUsers) {
        $this->maxUsers = $maxUsers;
    }

    public function setCompany(Company $company) {
        $this->company = $company;
    }

    public function setPeriod($period) {
        $this->period = $period;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }

    

    public function setPaid($paid) {
        $this->paid = $paid;
    }
    public function getSubscription() {
        return $this->subscription;
    }

    public function setSubscription(Subscription $subscription) {
        $this->subscription = $subscription;
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
    
    public function setStatus($status) {
        if (!in_array($status, array(self::STATUS_ACTIVE, self::STATUS_EXPIRED, self::STATUS_CANCELED))) {
            throw new \InvalidArgumentException("Invalid status");
        }
        $this->status = $status;
    }
    public function getStatus() {
        return $this->status;
    }
    public function getAllStatuses(){
        return array(self::STATUS_ACTIVE=>self::STATUS_ACTIVE, self::STATUS_EXPIRED=>self::STATUS_EXPIRED ,self::STATUS_CANCELED=>self::STATUS_CANCELED);
    }
}

