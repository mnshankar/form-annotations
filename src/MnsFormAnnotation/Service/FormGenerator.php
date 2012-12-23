<?php

namespace MnsFormAnnotation\Service;

use Zend\Cache\StorageFactory;
use Zend\Form\Annotation\AnnotationBuilder;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Use ZF2 form annotations builder to generate a form
 *
 * @author nshankar
 */
class FormGenerator implements FactoryInterface {

    protected $className;
    protected $keyName;
    protected $formExtraFields;

    public function setClass($className) {
        $this->className = $className;
        //remove special characters from class name in cache
        $this->keyName = str_replace('\\', '_', $className);
        return $this;   //fluent interface
    }

    public function getForm() {
        $builder = new AnnotationBuilder();
        if ($this->cache) {
            if (!($this->cache->hasItem($this->keyName))) {
                $form = $builder->createForm(new $this->className);
                $this->cache->setItem($this->keyName, $form);
            } else {
                //var_dump("Cache hit");
                $form = $this->cache->getItem($this->keyName);
            }
        } else {    //Do not use cache
            $form = $builder->createForm(new $this->className);
        }
        if ($this->formExtraFields) {
            foreach ($this->formExtraFields as $field) {               
                $form->add($field);
            }
        }
        return $form;
    }

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $config = $serviceLocator->get('config');
        if (isset($config['mns_cache_config'])) {
            $cacheConfig = $config['mns_cache_config'];
            //initialize cache
            $this->cache = StorageFactory::factory($cacheConfig);
        }
        if (isset($config['mns_form_extra'])) {
            $this->formExtraFields = $config['mns_form_extra'];
        }
        return $this;  //fluent interface
    }

}

?>
