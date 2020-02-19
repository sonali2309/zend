<?php  
    namespace User\Form;  
    use Zend\Form\Form;  

    class UserForm extends Form{  
       
        public function __construct($name = null) { 

            parent::__construct('user');  

            $this->add(array( 
               'name' => 'id', 
               'type' => 'Hidden', 
            ));  
            $this->add(array( 
               'name' => 'username', 
               'type' => 'Text', 
               'options' => array( 
                  'label' => 'UserName', 
               ), 
               'attributes' => array( 
                  'class' => 'form-control col-5',
                  'id'=>'inputGroup-sizing-default',
               ), 
            ));  
            $this->add(array( 
               'name' => 'password', 
               'type' => 'password', 
               'options' => array( 
                  'label' => 'Password ', 
               ), 
               'attributes' => array( 
                  'class' => 'form-control col-5',
                  'id'=>'inputGroup-sizing-default',
               ), 
            ));  
            $this->add(array( 
               'name' => 'submit', 
               'type' => 'Submit', 
               'attributes' => array( 
                  'class' => 'btn btn-primary btn-lg',
                  'value' => 'Go', 
                  'id' => 'submitbutton', 
               ), 
            )); 
         } 
    }