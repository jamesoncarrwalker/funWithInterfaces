<?php
/**
 * Created by PhpStorm.
 * User: jamesskywalker
 * Date: 15/07/2019
 * Time: 19:48
 */

namespace interfaces;


interface ControllerInterface {

    public function isValidRequest();

    public function runRequest();

    public function setResponse($response);//can be of a varied type

    public function getResponse();

    public function setParams(array $params);

    public function setDefaultRequest();

}