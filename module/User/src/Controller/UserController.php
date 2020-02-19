<?php
   namespace User\Controller;

   use Zend\Mvc\Controller\AbstractActionController;
   use Zend\View\Model\ViewModel;
   use User\Form\UserForm;
   use User\Model\User;
   use User\Model\UserTable;
  
   class UserController extends AbstractActionController{

//     public function indexAction(){
         
//         $view = new ViewModel([ 
//       'message' => 'Hello, Tutorial' 
//    ]);  
//    return $view; 

//     }}
        private $table;

        public function __construct(\User\Model\UserTable $table) { 
            $this->table = $table; 
        }

        public function indexAction(){
            

            $view = new ViewModel([ 
                'data' => $this->table->fetchAll(), 
            ]);  
            return $view; 

        }

        public function addAction() { 
            $form = new UserForm(); 
            $form->get('submit')->setValue('Save');  
            $request = $this->getRequest(); 
            if ($request->isPost()) { 
               $user = new User(); 
               $form->setInputFilter($user->getInputFilter()); 
               $form->setData($request->getPost());  
               if ($form->isValid()) { 
                  $user->exchangeArray($form->getData()); 
                  $this->table->saveUser($user);  /////////////////////////////////////////
                  
                  
                  return $this->redirect()->toRoute('user'); 
               } 
            }  
            return array('form' => $form); 
         }
   }