<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Twig;

/**
 * Description of AppExtension
 *
 * @author popes
 */
class AppExtension extends \Twig_Extension{
    
    public function getTests() {
        return array(
            new \Twig_SimpleTest('aninstanceof', array($this,'theinstanceof')),
        );
    }
    
    public function theinstanceof($var, $instance){
        return  $var instanceof $instance;
    }
    
    public function getName() {
        return 'app_extension';
    }

}
