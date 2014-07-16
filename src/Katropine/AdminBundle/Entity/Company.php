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

/**
 * @ORM\Entity(repositoryClass="Katropine\AdminBundle\Repository\CompanyRepository")
 * @ORM\Table(name="timelly_company")
 * @ORM\HasLifecycleCallbacks
 */
class Company
{
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
     * @OneToMany(targetEntity="User", mappedBy="company", cascade={"all"}, orphanRemoval=true)
     * 
     */
    protected $users;
    
    /** 
     * @ORM\Column(type="datetime") 
     */
    protected $created;
    
    /**
     * @ORM\Column(type="datetime") 
     */
    protected $modified;
    
    /**
     * Tell doctrine that before we persist or update we call the updatedTimestamps() function.
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps(){
        $this->setModified(new \DateTime(date('Y-m-d H:i:s')));

        if($this->getCreated() == null){
            $this->setCreated(new \DateTime(date('Y-m-d H:i:s')));
        }
    }
    
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
    public function getCreated() {
        return $this->created;
    }

    public function getModified() {
        return $this->modified;
    }

    public function setCreated($created) {
        $this->created = $created;
    }

    public function setModified($modified) {
        $this->modified = $modified;
    }



}