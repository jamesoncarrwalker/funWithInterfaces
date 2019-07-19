<?php
/**
 * Created by PhpStorm.
 * User: jamesskywalker
 * Date: 15/07/2019
 * Time: 21:10
 */

namespace abstractClasses;

use interfaces\ControllerInterface;
use interfaces\LoggedInInterface;
use interfaces\UserInterface;

 abstract class AbstractWebController implements ControllerInterface, UserInterface, LoggedInInterface {

     protected $response;
     protected $mustBeLoggedIn;
     protected $isLoggedIn;
     protected $request;
     protected $urlParams;

     public function setParams(array $params) {
         $params = (object)$params;
         $this->request = $params->request ?? '';
         $this->urlParams = $params;
     }

     public function isValidRequest() : bool {
         if(method_exists($this,$this->request)) return true;
         else if (method_exists($this,'load' . ucfirst($this->request) . 'page')) {
             $this->request = 'load' . ucfirst($this->request) . 'page';
             return true;
         }
         return false;
     }

     public function runRequest() {
        $method = $this->request;
        return $this->$method();
     }

     public function setResponse($response) {
         // should be overwritten
     }

     public function getResponse() {
         return $this->response;
     }

     public function getUser() : AbstractUser {

     }

     public function mustBeLoggedIn() {
         $this->mustBeLoggedIn = false;
     }

     public function isLoggedIn(bool $isLoggedIn) {
        $this->isLoggedIn = $isLoggedIn;
     }


     public function setDefaultRequest() {

     }

 }