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


class DecimalTransformer implements DataTransformerInterface{

    /**
     * ON Form Load
     * Transforms an string ($value) to a array  (array['hours','minutes']).
     *
     * @param  float|null $value
     * @return float
     */
    public function transform($value){
//        /exit(\Doctrine\Common\Util\Debug::dump($value));

        if (empty($value)) {
            $value = 1.0;
        }
        if(is_string($value)){
           $value = floatval($value);
        }
        if (!is_float($value)) {
            throw new TransformationFailedException('Expected a float.');
        }
        
        return [ 'decimal' => round($value, 2) ];
    }

    /**
     * Transforms a array ($value) to decimal. ON SUBMIT
     *
     * @param  array $value
     * @return integer|null
     * @throws TransformationFailedException if not $string.
     */
    public function reverseTransform($value){
        
        if(is_numeric($value['decimal'])){
            $val = floatval($value['decimal']);
        }else{
             throw new TransformationFailedException('Expected a float.');
        }
        if (!is_float($val)) {
            throw new TransformationFailedException('Expected a float.');
        }
        
        return  $val;
    }
}