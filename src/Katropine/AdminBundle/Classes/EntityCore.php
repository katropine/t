<?php
namespace Katropine\AdminBundle\Classes;
/**
 * Description of EntityCore
 *
 * @author Kriss
 * @since Jul 26, 2014
 */
use Doctrine\ORM\Mapping as ORM;

class EntityCore {

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
