<?php
namespace Katropine\AdminBundle\Form\Type;
/**
 * Description of MinWorkTimePerDay
 *
 * @author Kristian Beres <kristian@katropine.com>
 * @since Aug 8, 2014
 */

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\DataTransformer\ValueToDuplicatesTransformer;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TimeInterval extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->addViewTransformer(new ValueToDuplicatesTransformer(array(
                'hours',
                'minutes',
            )))->add('hours', 'text', $options)
            ->add('minutes', 'text', $options);
    }

    /**
     * 
     * @return string
     */    
    public function getName() {
        return 'timeinterval';
    }

}
