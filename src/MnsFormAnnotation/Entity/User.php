<?php

namespace MnsFormAnnotation\Entity;
use Zend\Form\Annotation as Form;

/**
 * Simple user entity
 *
 * @author nshankar
 */

/**
 * @Form\Hydrator("Zend\Stdlib\Hydrator\ClassMethods")
 * @Form\Name("user")
 */
class User {

    /**
     * @Form\Required(false)
     * @Form\Attributes({"type":"hidden"})
    */
    protected $id;

    /**
     * @Form\Type("Zend\Form\Element\Text")
     * @Form\Options({"label":"Name"})
     */
    protected $name;

    /**
     * @Form\Type("Zend\Form\Element\Email")
     * @Form\Options({"label":"Email"})
     */
    protected $email;
    /**
     * @Form\Type("Zend\Form\Element\Text")
     * @Form\Options({"label":"Address"})
     */
    protected $address;  
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }
}

?>
