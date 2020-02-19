<?php
namespace User;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
    return [
        'router' => [
            'routes' => [
                'user' => [
                    'type'    => Segment::class,
                    'options' => [
                        'route'    => '/user[/:action]',
                        'defaults' => [
                            'controller' => Controller\UserController::class,
                            'action'     => 'index',
                        ],
                    ],
                ],
            ],
        ],


        'controllers' => [
            'factories' => [
                Controller\UserController::class => function($container){
                    return new Controller\UserController( 
                        $container->get(Model\UserTable::class) 
                     ); 
                },
            ],
       ],

       'view_manager' => [
        
            'doctype' => 'HTML5',
            'template_map' => [
                'user/user/index' => __DIR__ . '/../view/user/user/index.phtml',    
         ],

        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],

    ];