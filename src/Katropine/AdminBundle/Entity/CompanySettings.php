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
 * @ORM\Table(name="timelly_worktime_settings")
 * @ORM\HasLifecycleCallbacks
 */
class CompanySettings {

    

}
