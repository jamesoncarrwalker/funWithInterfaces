<?php

/**
 * Created by PhpStorm.
 * User: jamesskywalker
 * Date: 07/07/2019
 * Time: 15:36
 */
use abstractClasses\AbstractPage;

interface PageInterface {

    public function setPage();

    public function getPage() : AbstractPage;

    //decide how you want your page to look and work
}