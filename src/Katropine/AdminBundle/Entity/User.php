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
use Doctrine\ORM\Mapping\JoinColumn;
/**
 * @ORM\Entity(repositoryClass="Katropine\AdminBundle\Repository\UserRepository")
 * @ORM\Table(name="timelly_user")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=32)
     */
    protected $firstname;
    /**
     * @ORM\Column(type="string", length=32)
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
    
    /**
     * @ORM\Column(type="string", length=32)
     */
    protected $type = "OWNER";
    
    /**
     *
     * @ManyToOne(targetEntity="Katropine\AdminBundle\Entity\Company", cascade={"all"})
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $company;
    
    public function __construct(){
        // your own logic
    }
    
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
        $this->type = $type;
    }

    public function setCompany($company) {
        $this->company = $company;
    }




}