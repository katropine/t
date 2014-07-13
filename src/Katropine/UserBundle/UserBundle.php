<?php

/**
 * Description of UserBundle
 *
 * @author Kriss
 * @since Jul 13, 2014
 */
namespace Katropine\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class UserBundle extends Bundle{

    public function getParent(){
        return 'FOSUserBundle';
    }
}
