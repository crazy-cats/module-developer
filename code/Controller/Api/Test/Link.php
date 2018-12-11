<?php

/*
 * Copyright © 2018 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Developer\Controller\Api\Test;

/**
 * @category CrazyCat
 * @package CrazyCat\Developer
 * @author Bruce Z <152416319@qq.com>
 * @link http://crazy-cat.co
 */
class Link extends \CrazyCat\Framework\App\Module\Controller\Api\AbstractAction {

    protected function run()
    {
        $this->response->setData( [ 'success' => true, 'message' => 'Successfully linked to the system.' ] );
    }

}
