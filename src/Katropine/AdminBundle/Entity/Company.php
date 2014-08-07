<?php

/**
 * Description of Company
 *
 * @author Kriss
 * @since Jul 13, 2014
 */
namespace Katropine\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Katropine\AdminBundle\Classes\EntityCore;

/**
 * @ORM\Entity(repositoryClass="Katropine\AdminBundle\Repository\CompanyRepository")
 * @ORM\Table(name="timelly_company")
 * @ORM\HasLifecycleCallbacks
 */
class Company extends EntityCore{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     *
     * @ORM\Column(type="string", length=64) 
     */
    protected $name;
    
    /**
     *
     * @OneToMany(targetEntity="User", mappedBy="company", cascade={"all"}, orphanRemoval=true, fetch="EXTRA_LAZY")
     * 
     */
    protected $users;
    
    /**
     *
     * @OneToMany(targetEntity="SubscriptionOrder", mappedBy="company", cascade={"all"}, orphanRemoval=true, fetch="EXTRA_LAZY")
     */
    protected $subscriptionOrders;
    
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getUsers() {
        return $this->users;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setUsers($users) {
        $this->users = $users;
    }

    public function getSubscriptionOrders() {
        return $this->subscriptionOrders;
    }

    public function setSubscriptionOrders($subscriptionOrders) {
        $this->subscriptionOrders = $subscriptionOrders;
    }



}