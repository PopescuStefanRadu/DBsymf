<?php

namespace AppBundle\Twig;


class ArrayRemoveExtension extends \Twig_Extension {

    public function getName() {
        return 'arrayRemove';
    }

    public function getFunctions() {
        return array(
            new \Twig_SimpleFunction('arrayRemove', array($this, 'arrayRemove'))
        );
    }
    
    public function arrayRemove($array,$offset){
        unset($array[$offset]);
        return $array;
    }

}
