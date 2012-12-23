<?php

namespace MnsFormAnnotation;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
return array(
    'mns_cache_config' => array(
        'adapter' => array(
            'name' => 'filesystem',
            'options' => array(
                'ttl' => 100,
                'cache_dir' => 'data/cache',
            ),
        ),
        'plugins' => array(
            array(
                'name' => 'serializer',
                'exception_handler' => array('throw_exceptions' => false),
            )
        )
    ),
    'mns_form_extra' => array(       
        array(
            'name' => 'send',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Submit',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'MnsFormAnnotation\Controller\MnsFormAnnotation' => 'MnsFormAnnotation\Controller\IndexController',
        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'form' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/form[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'MnsFormAnnotation\Controller\MnsFormAnnotation',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'MnsFormAnnotation' => __DIR__ . '/../view',
        ),
    ),   
);
?>
