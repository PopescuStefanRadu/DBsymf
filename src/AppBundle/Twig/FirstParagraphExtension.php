<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Twig;

/**
 * Description of FirstParagraphExtension
 *
 * @author popes
 */
class FirstParagraphExtension extends \Twig_Extension {

    public function getName() {
        return 'first_paragraph';
    }

    public function getFilters() {
        return array(
            new \Twig_SimpleFilter('firstParagraph', array($this, 'firstParagraph')),
        );
    }

    public function firstParagraph($var) {
        $var2=\preg_split('/\r\n\r\n/', $var);
        $var2[0].="...";
        return $var2[0];
    }

}
