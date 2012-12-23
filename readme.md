One of the cool new RAD features introduced in Zend Forms (2.0) is "annotations". 
It helps you easily create forms for your entities by merely providing annotations/docblock comments.
This feature relies on the doctrine common library.. So please make sure you include that dependency in your composer like so:

"require": { 
        "php": ">=5.3.3", 
        "zendframework/zendframework": "2.*", 
        "doctrine/common" : ">=2.1" 
    } 

Note that doctrine annotations and form annotations can work side by side!
One of the common concerns regarding using this approach is the performance hit due to the file parsing and regexp matching overhead. This module 
demonstrates how the problem can be alleviated using a simple file cache.

Usage
-----
1. Copy the "MnsFormAnnotation" module into your module or vendor directory. 
2. Activate the module by adding 'MnsFormAnnotation' to your application.config.php file.
3. A sample route (/form) has been provided for demonstration purposes. Please check the code in IndexController for details.
4. Make sure you create a folder named 'cache' under the 'data' folder.

In order to generate a form, the code to be used is:

$form = $this->getServiceLocator()->get('formGenerator')
           ->setClass('\MnsFormAnnotation\Entity\User')
           ->getForm();

'formGenerator' is the servicename used by the module (Module.php).

The "setClass()" method is used to indicate the fully qualified name of the entity that contains the form annotations
The "getForm()" method transparently handles caching (setup using the key named "mns_cache_config" in module.config.php)
Note that the module.config.php file also contains a key named "mns_form_extra". This is used to append a "submit" button to the end of the form.
