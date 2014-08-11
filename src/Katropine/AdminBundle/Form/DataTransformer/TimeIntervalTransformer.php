<?php

namespace Katropine\AdminBundle\Form\DataTransformer;
/**
 * Description of DecimalTransformer
 *
 * @author Kristian Beres <kristian@katropine.com>
 * @since Aug 11, 2014
 */

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Katropine\AdminBundle\Classes\TimeHelper;

class TimeIntervalTransformer implements DataTransformerInterface{

    /**
     * Transforms an string ($value) to a array  (array['hours','minutes']).
     *
     * @param  integer|null $integer
     * @return array
     */
    public function transform($integer){
        //exit(\Doctrine\Common\Util\Debug::dump($value));

        if (empty($integer)) {
            $integer = 0;
        }

        if (!is_integer($integer)) {
            throw new TransformationFailedException('Expected a integer.');
        }
        if($integer == 0){
            return  ['hours' => 0, 'minutes' => 0];
        }
        $timeString = TimeHelper::convertToHoursMins($integer);
        $value = explode(":", $timeString);
        
        return ['hours' => $value[0], 'minutes' => $value[1]];
    }

    /**
     * Transforms a array ($value) to string.
     *
     * @param  array $value
     *
     * @return integer|null
     *
     * @throws TransformationFailedException if not $string.
     */
    public function reverseTransform($value){
        //exit(\Doctrine\Common\Util\Debug::dump($string));
        if (null === $value || !is_array($value)) {
            return;
        }
        
        return ($value['hours']*60)+$value['minutes'];
    }
}