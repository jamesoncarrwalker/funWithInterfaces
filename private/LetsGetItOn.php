<?php

/**
 * Created by PhpStorm.
 * User: jamesskywalker
 * Date: 02/06/2019
 * Time: 19:34
 */

use \model\objects\RouteFinderController;
use interfaces\LoggedInInterface;
use interfaces\ControllerInterface;

class letsGetItOn  {

    protected $urlParams;
    protected $controller;
    public $output;

    function __construct() {
        $this->setAutoLoader();
        parse_str($_SERVER["QUERY_STRING"],$this->urlParams);

        $routeFinder = new RouteFinderController();
        $routeFinder->setRouteParams($this->urlParams);
        if(!$routeFinder->checkRouteIsValid()) $routeFinder->updateControllerName('AllThoseWhoWander');
        $routeFinder->setRoute();
        require_once($routeFinder->getControllerLocation());
        $this->controller = $routeFinder->getRoute();
        $this->controller = new $this->controller();

        if($this->controller instanceof ControllerInterface) {

            if($this->controller instanceof LoggedInInterface) {
                //set up and authenticate the user

            }
            //run the action - will fail if logged in is false and user isn't created
            $this->controller->setParams($this->urlParams);
            $this->controller->isLoggedIn(true);
            if(!$this->controller->isValidRequest()) $this->controller->setDefaultRequest();
            $this->controller->runRequest();
            $this->output = $this->controller->getResponse();
            //deal with the output
            if( gettype($this->output) == 'string') echo $this->output;
            else if (gettype($this->output) == 'NULL') {
                echo 'output error';
                //TODO::make an error handler object
            }
            return;

        } else {
            //TODO::make an error handler object
        }
    }


    private function setAutoLoader() {
        return spl_autoload_register(
            function($class) {
                $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
                if(file_exists('private/' . $class . '.php')) include_once 'private/' . $class.'.php';
                else if(file_exists('private/interfaces/' . $class . '.php')) include_once 'private/interfaces/' . $class . '.php';
                else die('Classic problem of private/' . $class.'.php' . ' not found');
            }
        );
    }

}