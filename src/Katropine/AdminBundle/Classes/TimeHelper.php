<?php
namespace Katropine\AdminBundle\Classes;
/**
 * Description of Time
 *
 * @author Kristian Beres <kristian@katropine.com>
 * @since Aug 8, 2014
 */
class TimeHelper {

    public static function convertToHoursMins($time, $format = '%02d:%02d') {
        settype($time, 'integer');
        if ($time < 1) {
            return;
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);
        return sprintf($format, $hours, $minutes);
    }

}
