<?php

/*
 * Copyright © 2018 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Developer\Controller\Cli\Debug;

use CrazyCat\Framework\App\Module\Manager as ModuleManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @category CrazyCat
 * @package CrazyCat\Developer
 * @author Bruce Z <152416319@qq.com>
 * @link http://crazy-cat.co
 */
class Trace extends \CrazyCat\Framework\App\Module\Controller\Cli\AbstractAction {

    const INPUT_KEY_TYPE = 'type';

    /**
     * @param \Symfony\Component\Console\Command\Command $command
     */
    protected function configure( Command $command )
    {
        $command->setDefinition( [
            new InputArgument( self::INPUT_KEY_TYPE, InputArgument::REQUIRED, 'Type of content to trace' )
        ] );
        $command->setDescription( 'Trace contents of specified type' );
        $command->setHelp( 'Types: modules, events' );
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    private function traceModules( $output )
    {
        $output->writeln( "Enabled modules:\n" );
        foreach ( $this->objectManager->get( ModuleManager::class )->getEnabledModules() as $module ) {
            $output->writeln( $module->getData( 'name' ) );
        }
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    private function traceEvents( $output )
    {
        $output->writeln( "Assigned events:\n" );
        foreach ( $this->eventManager->getEvents() as $eventName => $observers ) {
            $output->writeln( $eventName );
            foreach ( $observers as $observer ) {
                $output->writeln( $observer );
            }
        }
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    protected function run( InputInterface $input, OutputInterface $output )
    {
        switch ( $input->getArgument( self::INPUT_KEY_TYPE ) ) {

            case 'modules' :
                $this->traceModules( $output );
                break;

            case 'events' :
                $this->traceEvents( $output );
                break;

            default :
                $output->writeln( 'Invalidated type, please check dev:debug:trace -h' );
        }
    }

}
