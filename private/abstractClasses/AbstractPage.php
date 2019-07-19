<?php
/**
 * Created by PhpStorm.
 * User: jamesskywalker
 * Date: 07/07/2019
 * Time: 18:16
 */
namespace abstractClasses;

use PageInterface;

abstract class AbstractPage implements PageInterface {
    public $page;
    protected $isPrivatePage;
    protected $isValidAction;


    public function setPage() {
        // TODO: Implement setPage() method.
    }

    public function getPage() : AbstractPage {
        // TODO: Implement getPage() method.
    }
}