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
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\Options;

class TimeInterval extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('hours', 'text')
                ->add('minutes', 'text');
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {   
        
        
        $resolver->setDefaults(array(
            
        ));
    }
    
 
    /**
     * 
     * @return string
     */    
    public function getName() {
        return 'timeinterval';
    }
}
