<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/css/d4a040e')) {
            // _assetic_d4a040e
            if ($pathinfo === '/css/d4a040e.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'd4a040e',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_d4a040e',);
            }

            if (0 === strpos($pathinfo, '/css/d4a040e_part_1_')) {
                if (0 === strpos($pathinfo, '/css/d4a040e_part_1_bootstrap')) {
                    // _assetic_d4a040e_0
                    if ($pathinfo === '/css/d4a040e_part_1_bootstrap_1.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'd4a040e',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_d4a040e_0',);
                    }

                    // _assetic_d4a040e_1
                    if ($pathinfo === '/css/d4a040e_part_1_bootstrap.min_2.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'd4a040e',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_d4a040e_1',);
                    }

                }

                // _assetic_d4a040e_2
                if ($pathinfo === '/css/d4a040e_part_1_sb-admin_3.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'd4a040e',  'pos' => 2,  '_format' => 'css',  '_route' => '_assetic_d4a040e_2',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/js/40d3138')) {
            // _assetic_40d3138
            if ($pathinfo === '/js/40d3138.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '40d3138',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_40d3138',);
            }

            if (0 === strpos($pathinfo, '/js/40d3138_')) {
                // _assetic_40d3138_0
                if ($pathinfo === '/js/40d3138_jquery-1.10.2_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '40d3138',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_40d3138_0',);
                }

                // _assetic_40d3138_1
                if ($pathinfo === '/js/40d3138_bootstrap.min_2.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '40d3138',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_40d3138_1',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/css/984c3e8')) {
            // _assetic_984c3e8
            if ($pathinfo === '/css/984c3e8.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '984c3e8',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_984c3e8',);
            }

            if (0 === strpos($pathinfo, '/css/984c3e8_')) {
                // _assetic_984c3e8_0
                if ($pathinfo === '/css/984c3e8_part_1_login_1.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '984c3e8',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_984c3e8_0',);
                }

                // _assetic_984c3e8_1
                if ($pathinfo === '/css/984c3e8_bootstrap_2.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '984c3e8',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_984c3e8_1',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/company')) {
                if (0 === strpos($pathinfo, '/admin/company/list')) {
                    // company_list
                    if (rtrim($pathinfo, '/') === '/admin/company/list') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'company_list');
                        }

                        return array (  'page' => 1,  '_controller' => 'Katropine\\AdminBundle\\Controller\\CompanyController::listAction',  '_route' => 'company_list',);
                    }

                    // katropine_admin_company_list
                    if (0 === strpos($pathinfo, '/admin/company/list/page') && preg_match('#^/admin/company/list/page/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'katropine_admin_company_list');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'katropine_admin_company_list')), array (  'page' => 1,  '_controller' => 'Katropine\\AdminBundle\\Controller\\CompanyController::listAction',));
                    }

                }

                // company_show
                if (preg_match('#^/admin/company/(?P<id>[^/]++)/show/page/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'company_show');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'company_show')), array (  'id' => 0,  'page' => 1,  '_controller' => 'Katropine\\AdminBundle\\Controller\\CompanyController::showAction',));
                }

                // company_addnew
                if (rtrim($pathinfo, '/') === '/admin/company/addnew') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'company_addnew');
                    }

                    return array (  'id' => 0,  '_controller' => 'Katropine\\AdminBundle\\Controller\\CompanyController::saveAction',  '_route' => 'company_addnew',);
                }

                // company_edit
                if (preg_match('#^/admin/company(?P<id>[^/]++)/edit/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'company_edit');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'company_edit')), array (  'id' => 0,  '_controller' => 'Katropine\\AdminBundle\\Controller\\CompanyController::saveAction',));
                }

                // company_save_response
                if (rtrim($pathinfo, '/') === '/admin/company/saveresponse') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'company_save_response');
                    }

                    return array (  '_controller' => 'Katropine\\AdminBundle\\Controller\\CompanyController::saveresponseAction',  '_route' => 'company_save_response',);
                }

                // company_delete
                if (preg_match('#^/admin/company/(?P<id>[^/]++)/delete/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'company_delete');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'company_delete')), array (  'id' => 0,  '_controller' => 'Katropine\\AdminBundle\\Controller\\CompanyController::deleteAction',));
                }

            }

            // dashboard_index
            if (rtrim($pathinfo, '/') === '/admin/dashboard') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'dashboard_index');
                }

                return array (  '_controller' => 'Katropine\\AdminBundle\\Controller\\DashboardController::indexAction',  '_route' => 'dashboard_index',);
            }

            if (0 === strpos($pathinfo, '/admin/user')) {
                if (0 === strpos($pathinfo, '/admin/user/list')) {
                    // user_list
                    if (0 === strpos($pathinfo, '/admin/user/list/page') && preg_match('#^/admin/user/list/page/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'user_list');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_list')), array (  'page' => 1,  '_controller' => 'Katropine\\AdminBundle\\Controller\\UserController::listAction',));
                    }

                    // katropine_admin_user_list
                    if (rtrim($pathinfo, '/') === '/admin/user/list') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'katropine_admin_user_list');
                        }

                        return array (  'page' => 1,  '_controller' => 'Katropine\\AdminBundle\\Controller\\UserController::listAction',  '_route' => 'katropine_admin_user_list',);
                    }

                }

                // user_list_delete
                if (preg_match('#^/admin/user/(?P<id>[^/]++)/delete/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'user_list_delete');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_list_delete')), array (  'id' => 0,  '_controller' => 'Katropine\\AdminBundle\\Controller\\UserController::deleteAction',));
                }

                // katropine_admin_user_seed
                if ($pathinfo === '/admin/user/seed') {
                    return array (  '_controller' => 'Katropine\\AdminBundle\\Controller\\UserController::seedAction',  '_route' => 'katropine_admin_user_seed',);
                }

            }

        }

        // service_service_default_index
        if (0 === strpos($pathinfo, '/v1/default/test') && preg_match('#^/v1/default/test/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_service_service_default_index;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'service_service_default_index')), array (  '_controller' => 'Service\\ServiceBundle\\Controller\\DefaultController::indexAction',));
        }
        not_service_service_default_index:

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/log')) {
                if (0 === strpos($pathinfo, '/admin/login')) {
                    // fos_user_security_login
                    if ($pathinfo === '/admin/login') {
                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                    }

                    // fos_user_security_check
                    if ($pathinfo === '/admin/login_check') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_fos_user_security_check;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                    }
                    not_fos_user_security_check:

                }

                // fos_user_security_logout
                if ($pathinfo === '/admin/logout') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/profile')) {
                // fos_user_profile_show
                if (rtrim($pathinfo, '/') === '/admin/profile') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_profile_show;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
                }
                not_fos_user_profile_show:

                // fos_user_profile_edit
                if ($pathinfo === '/admin/profile/edit') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/admin/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/admin/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/admin/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/admin/resetting/reset') && preg_match('#^/admin/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

            // fos_user_change_password
            if ($pathinfo === '/admin/profile/change-password') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_change_password;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
            }
            not_fos_user_change_password:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
