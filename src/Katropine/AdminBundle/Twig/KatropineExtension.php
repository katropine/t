<?php

namespace Katropine\AdminBundle\Twig;

/**
 * Description of TimeIntervalExtension
 *
 * @author Kristian Beres <kristian@funkweb.no>
 * @since Aug 14, 2014
 */
use Katropine\AdminBundle\Classes\TimeHelper;

class KatropineExtension extends \Twig_Extension {

    public function getFilters() {
        return array(
            new \Twig_SimpleFilter('timeinterval', array($this, 'timeintervalFilter')),
            new \Twig_SimpleFilter('label', array($this, 'labelFilter', array("is_safe" => array("html")))),
        );
    }
    /**
     * 
     * @param integer $number
     * @param string $format
     * @return string
     */
    public function timeintervalFilter($number, $format = '%02d:%02d') {
       return TimeHelper::convertToHoursMins($number, $format);
    }
    
    public function labelFilter($text, $type = "default"){
        
        $label = "<span class=\"label label-{$type}\">{$text}</span>";
        return $label;
    }
    
    
    public function getName() {
        return 'katropine_extension';
    }

}
