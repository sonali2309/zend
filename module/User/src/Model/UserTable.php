<?php  
namespace User\Model;  
use Zend\Db\TableGateway\TableGatewayInterface;  
class UserTable {
   protected $tableGateway; 
   public function __construct(TableGatewayInterface $tableGateway) { 
      $this->tableGateway = $tableGateway; 
   }  
   public function fetchAll() { 
      $resultSet = $this->tableGateway->select(); 

      return $resultSet; 
   } 

   public function saveUser(User $user) { 
      $data = array ( 
         'username' => $user->username,
         'password'  => $user->password, 
      );  
      $id = (int) $user->id; 
      if ($id == 0) { 
         $this->tableGateway->insert($data); 
      } else {
         if ($this->getUser($id)) { 
            $this->tableGateway->update($data, array('id' => $id));  
         } else { 
            throw new \Exception('user id does not exist'); 
         } 
      } 
   } 
}