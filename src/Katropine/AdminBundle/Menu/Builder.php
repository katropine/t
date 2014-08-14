<?php
namespace Katropine\AdminBundle\Menu;
/**
 * Description of Builder
 *
 * @author Kristian Beres <kristian@katropine.com>
 * @since Aug 14, 2014
 */
use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware {

    public function mainMenu(FactoryInterface $factory, array $options) {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav side-nav');
        
        $trans = $this->container->get('translator');
        
        
        // routeName => []
        $items = [
            'dashboard_index' => array('label' => $trans->trans('mainmenu.Dashboard'), 'route' => 'dashboard_index'),
            'company_list' =>  array('label' => $trans->trans('mainmenu.Companies'), 'route' => 'company_list'),
            'user_list' =>  array('label' => $trans->trans('mainmenu.Users'), 'route' => 'user_list'),
            'contracts_list' => array('label' => $trans->trans('mainmenu.Employment_contracts'), 'route' => 'contracts_list'),
            'employment_contract_list' => array('label' => $trans->trans('mainmenu.Employment_contracts_templates'), 'route' => 'employment_contract_list'),
            'subscription_list' =>  array('label' => $trans->trans('mainmenu.Subscriptions'), 'route' => 'subscription_list'),
            
        ];
        
        $routeName = $this->container->get('request')->get('_route');
        
        foreach($items as $k => $v){
            $menu->addChild($k, $v)->setExtra('translation_domain', 'KatropineAdminBundle');
            if($routeName == $k){
                $menu->getChild($routeName)->setCurrent(true)->setAttribute('class', 'active');
            }
        }
   
        //exit(\Doctrine\Common\Util\Debug::dump($routeName));
        return $menu;
    }
   
    
}
