<?php

    namespace User\Model;
    use Zend\InputFilter\InputFilterInterface; 
    use Zend\InputFilter\InputFilterAwareInterface; 
    use Zend\InputFilter\InputFilter;  

    class User implements InputFilterAwareInterface{

        public $id;
        public $username;
        public $password;

        public function setInputFilter(InputFilterInterface $inputFilter) { 
            throw new \Exception("Not used"); 
         }  

        public function getInputFilter() { 
            if (!$this->inputFilter) { 
               $inputFilter = new InputFilter(); 
               $inputFilter->add(array( 
                  'name' => 'id', 
                  'required' => true, 
                  'filters' => array( 
                     array('name' => 'Int'), 
                  ),
               ));  


               $inputFilter->add(array( 
                'name' => 'username', 
                'required' => true, 
                'filters' => array( 
                   array('name' => 'StripTags'), 
                   array('name' => 'StringTrim'), 
                ), 
                'validators' => array( 
                   array( 
                      'name' => 'StringLength', 
                      'options' => array( 
                         'encoding' => 'UTF-8', 
                         'min' => 1, 
                         'max' => 30, 
                      ), 
                   ), 
                ), 
             )); 

             $inputFilter->add(array( 
                'name' => 'password', 
                'required' => true, 
                'filters' => array( 
                   array('name' => 'StripTags'), 
                   array('name' => 'StringTrim'), 
                ), 
                'validators' => array( 
                   array( 
                      'name' => 'StringLength', 
                      'options' => array( 
                         'encoding' => 'UTF-8', 
                         'min' => 1, 
                         'max' => 20, 
                      ), 
                   ),
                ),  
             )); 
             $this->inputFilter = $inputFilter; 

            }
            return $this->inputFilter; 
        }       

        public function exchangeArray($data) { 
            $this->id = (!empty($data['id'])) ? $data['id'] : null; 
            $this->username = (!empty($data['username'])) ? $data['username'] : null; 
            $this->password = (!empty($data['password'])) ? $data['password'] : null; 
         } 
    }
    