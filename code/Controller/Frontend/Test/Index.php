<?php

/*
 * Copyright © 2018 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Developer\Controller\Frontend\Test;

/**
 * @category CrazyCat
 * @package CrazyCat\Developer
 * @author Bruce Z <152416319@qq.com>
 * @link http://crazy-cat.co
 */
class Index extends \CrazyCat\Framework\App\Module\Controller\Frontend\AbstractAction {

    protected function run()
    {
        /* @var $collection \CrazyCat\Cms\Model\Page\Collection */
        $collection = $this->objectManager->create( \CrazyCat\Cms\Model\Page\Collection::class )
                ->addFieldToFilter( 'enabled', [ 'eq' => 1 ] )
                ->addFieldToFilter( 'title', [ 'like' => '%test' ] );
        $collection->load();

        //echo $this->objectManager->create( \CrazyCat\Cms\Model\Page::class )->load( 1 );
    }

}
