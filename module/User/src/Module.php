<?php
    namespace User;
    use Zend\Db\Adapter\AdapterInterface;
    use Zend\Db\ResultSet\ResultSet;
    use Zend\Db\TableGateway\TableGateway;
    use Zend\ModuleManager\Feature\ConfigProviderInterface;
    use User\Model\User;
        
    class Module implements ConfigProviderInterface 
    {
        public function getConfig()
        {
            return include __DIR__ . '/../config/module.config.php';
            

        }

        public function getServiceConfig() {
            return [
               'factories' => [
                  Model\UserTable::class => function ($container) {
                     $tableGateway = $container->get(Model\UserTableGateway::class);
                     $table = new Model\UserTable($tableGateway);
                     return $table;
                  },
                  Model\UserTableGateway::class => function ($container) {
                     $dbAdapter = $container->get(AdapterInterface::class);
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new User());
                     return new TableGateway('user_info', $dbAdapter, null, $resultSetPrototype);
                  },
               ],
            ];
         }
    }

   
