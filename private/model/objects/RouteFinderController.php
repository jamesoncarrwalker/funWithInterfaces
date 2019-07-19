<?php
/**
 * Created by PhpStorm.
 * User: jamesskywalker
 * Date: 15/07/2019
 * Time: 23:39
 */

namespace model\objects;

use interfaces\RouteFinderInterface;


class RouteFinderController implements RouteFinderInterface {

    protected $controllerName;
    protected $route;
    protected $controllerLocation;


    public function setRouteParams(array $params) {
        $controller = key($params);
        $this->controllerName = ($controller == '' || $controller == null) ? 'Landing' : ucfirst($controller);
    }

    public function checkRouteIsValid() : bool {
        return file_exists('private/controller/' . $this->controllerName . '.php');
    }

    public function setRoute() {
        $this->controllerLocation = 'private/controller/' . $this->controllerName . '.php';
        $this->route = "\\controller\\" . $this->controllerName;
    }

    public function updateControllerName(string $name) {
        $this->controllerName = $name;
    }

    public function getControllerLocation() : string {
        return $this->controllerLocation;
    }

    public function getRoute() : string {
        return $this->route;
    }

}