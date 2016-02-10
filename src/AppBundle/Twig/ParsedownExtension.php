<?php

namespace AppBundle\Twig;

class ParsedownExtension extends \Twig_Extension {

    public function getName() {
        return 'parsedown';
    }

    public function getFilters() {
        return array(
            new \Twig_SimpleFilter('parsedown', 
                    array($this, 'parsedown'),
                    array('is_safe' => array('html'))
                    ),
        );
    }
    
    public function parsedown($var){
        $parse=new \Parsedown();
        return $parse->text($var);
    }

}
