<?php
namespace Katropine\AdminBundle\Form\Type;

/**
 * Description of MinWorkTimePerDay
 *
 * @author Kristian Beres <kristian@katropine.com>
 * @since Aug 11, 2014
 */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Katropine\AdminBundle\Form\DataTransformer\DecimalTransformer;

class Decimal extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('decimal', 'text')
                ->addModelTransformer(new DecimalTransformer());
        
//        $builder->add(
//            $builder->create('hours', 'text')
//           ->create('minutes', 'text')    
//                ->addModelTransformer(new TimeIntervalTransformer())
//        );
        
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
//        $resolver->setDefaults(array(
//            'compound' => false,
//            'required'       => false,
//            'error_bubbling' => true,
//        ));
    }
    

    
    /**
     * 
     * @return string
     */
    public function getName() {
        return 'decimal';
    }

}
