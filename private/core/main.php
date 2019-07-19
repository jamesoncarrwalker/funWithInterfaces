<?php

/**
 * Created by PhpStorm.
 * User: jamesskywalker
 * Date: 02/06/2019
 * Time: 19:53
 */
namespace coreWeb;

class main {








    function loadPageHeader($controller) {
        return $this->getSubView('common','header',[$controller]);
    }



}