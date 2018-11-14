<?php

/*
 * Copyright © 2018 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Developer\Controller\Cli\Debug;

use CrazyCat\Framework\App\Module\Manager as ModuleManager;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @category CrazyCat
 * @package CrazyCat\Developer
 * @author Bruce Z <152416319@qq.com>
 * @link http://crazy-cat.co
 */
class Module extends \CrazyCat\Framework\App\Module\Controller\Cli\AbstractAction {

    /**
     * @param \Symfony\Component\Console\Command\Command $command
     */
    protected function configure( $command )
    {
        $command->setDescription( 'Show module structure.' );
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    protected function run( InputInterface $input, OutputInterface $output )
    {
        $output->writeln( "Enabled modules:\n" );

        foreach ( $this->objectManager->get( ModuleManager::class )->getEnabledModules() as $module ) {
            $output->writeln( $module->getData( 'name' ) );
        }
    }

}
