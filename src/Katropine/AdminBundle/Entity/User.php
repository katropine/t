<?php

/**
 * Description of User
 *
 * @author Kriss
 * @since Jul 13, 2014
 */
namespace Katropine\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\ManyToMany;
use Katropine\AdminBundle\Classes\EntityCore;

/**
 * @ORM\Entity(repositoryClass="Katropine\AdminBundle\Repository\UserRepository")
 * @ORM\Table(name="timelly_user")
 * @ORM\HasLifecycleCallbacks
 */
class User extends EntityCore{
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    protected $firstname;
    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    protected $lastname;
    
    /**
     * @ORM\Column(type="string", length=32)
     */
    protected $email;
    
    /**
     * @ORM\Column(type="text")
     */
    protected $password;
    
    
    const TYPE_OWNER = 'OWNER';
    const TYPE_MANAGER = 'MANAGER';
    const TYPE_USER = 'USER';
    
    /**
     * @ORM\Column(type="string", length=32)
     */
    protected $type = 'OWNER';
    
    /**
     *
     * @ManyToOne(targetEntity="Katropine\AdminBundle\Entity\Company")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    protected $company;
    
    /**
     *
     * @OneToMany(targetEntity="WorkTime", mappedBy="user", orphanRemoval=true, fetch="EXTRA_LAZY")
     */
    protected $workTimes;
    
       
    /** 
     * @ORM\Column(type="string") 
     */
    private $timezone = 'UTC';
       
    /**
     *
     * @OneToMany(targetEntity="EmploymentContract", mappedBy="user", orphanRemoval=true, fetch="EXTRA_LAZY")
     */
    protected $employmentContracts;

    public function getId() {
        return $this->id;
    }
    
    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getType() {
        return $this->type;
    }

    public function getCompany() {
        return $this->company;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setType($type) {
        if (!in_array($type, array(self::TYPE_OWNER, self::TYPE_MANAGER, self::TYPE_USER))) {
            throw new \InvalidArgumentException("Invalid status");
        }
        $this->type = $type;
    }

    public function setCompany($company) {
        $this->company = $company;
    }
    
    public function getTimezone() {
        return $this->timezone;
    }

    public function setTimezone($timezone) {
        $this->timezone = $timezone;
    }
    
    public function getAllTypes(){
        return array(self::TYPE_OWNER=>self::TYPE_OWNER, self::TYPE_MANAGER=>self::TYPE_MANAGER, self::TYPE_USER=>self::TYPE_USER);
    }


}