<?php

/*
 * Copyright © 2018 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Developer\Controller\Cli\Debug;

use CrazyCat\Framework\App\Db\Manager as DbManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @category CrazyCat
 * @package CrazyCat\Developer
 * @author Bruce Z <152416319@qq.com>
 * @link http://crazy-cat.co
 */
class Db extends \CrazyCat\Framework\App\Module\Controller\Cli\AbstractAction {

    protected function configure( Command $command )
    {
        $command->setDescription( 'Test database functions' );
    }

    protected function run( InputInterface $input, OutputInterface $output )
    {
        /* @var $conn \CrazyCat\Framework\App\Db\MySql */
        $conn = $this->objectManager->get( DbManager::class )->getConnection();
    }

}
