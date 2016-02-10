<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Twig;

/**
 * Description of makeLink
 *
 * @author popes
 */
class MakeLinkExtension extends \Twig_Extension{
    public function getName() {
        return "make_link";
    }
    public function getFilters() {
        return array(
            new \Twig_SimpleFilter('makeLink', array($this, 'makeLink')),
        );
    }
    
    public function makeLink($var){
        $var=str_replace(" ", "_", $var);
        $resp=  iconv("UTF-8", "ISO-8859-1//TRANSLIT", $var);
        return $resp;
    }
    
}
