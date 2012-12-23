<?php

namespace MnsFormAnnotation\Controller;

use MnsFormAnnotation\Entity\User;
use Zend\Mvc\Controller\AbstractActionController;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class IndexController extends AbstractActionController {

    public function indexAction() {
        $user = new User();
        $user->setName('FullName');
        $user->setEmail('myemail@tld.com');
        $user->setAddress('Test Address');

        $form = $this->getServiceLocator()->get('formGenerator')
                ->setClass('\MnsFormAnnotation\Entity\User')
                ->getForm();

        $form->bind($user);       
        return array('form' => $form);        
    }

}

?>
