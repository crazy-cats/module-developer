<?php

/*
 * Copyright © 2018 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Developer\Controller\Cli\Test;

use CrazyCat\Framework\App\ObjectManager;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @category CrazyCat
 * @package CrazyCat\Developer
 * @author Bruce Z <152416319@qq.com>
 * @link http://crazy-cat.co
 */
class Index extends \CrazyCat\Framework\App\Module\Controller\Cli\AbstractAction {

    /**
     * @var \CrazyCat\Framework\App\ObjectManager
     */
    private $objectManager;

    public function __construct( ObjectManager $objectManager )
    {
        $this->objectManager = $objectManager;
    }

    /**
     * @param \Symfony\Component\Console\Command\Command $command
     */
    public function configure( $command )
    {
        $command->setName( 'dev:test' );
        $command->setDescription( 'This is a test.' );
        $command->setHelp( 'How to use the command.' );
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    public function run( InputInterface $input, OutputInterface $output )
    {
        $dbManager = $this->objectManager->get( \CrazyCat\Framework\App\Db\Manager::class );
        $conn = $dbManager->getConnection();
        $data = [
                [
                'name' => 'Bruce Zeng',
                'username' => 'zengliwei',
                'password' => 'Q!w2e3r4',
                'email' => 'zengliwei@163.com'
            ],
                [
                'name' => 'Bruce Zeng',
                'username' => 'qq',
                'password' => 'Q!w2e3r4',
                'email' => '152416319@qq.com'
            ]
        ];
        //$conn->insertArray( 'customer', $data );
        //print_r( $conn->fetchAll( 'SELECT * FROM `customer` WHERE `username` = :username', [ ':username' => 'qq' ] ) );
        //print_r( $conn->fetchAll( 'SELECT * FROM `customer`' ) );
        //print_r( $conn->fetchPairs( 'SELECT username, name FROM `customer`' ) );
        //print_r( $conn->fetchCol( 'SELECT username, name FROM `customer`' ) );
        //print_r( $conn->fetchRow( 'SELECT username, name FROM `customer`' ) );
        print_r( $conn->fetchOne( 'SELECT aaa, name FROM `customer`' ) );
    }

}
