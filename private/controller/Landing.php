<?php
/**
 * Created by PhpStorm.
 * User: jamesskywalker
 * Date: 07/07/2019
 * Time: 17:10
 */

namespace controller;

use abstractClasses\AbstractWebController;

class Landing extends AbstractWebController {

    public function setDefaultRequest() {
        if($this->isLoggedIn) $this->request = 'loadDashboardPage';
        else $this->request = 'loadLandingPage';
    }

    public function loadLandingPage() {
        $this->setResponse('The landing page method');
    }

    public function loadDashboardPage() {
        $this->setResponse('The dashboard method');
    }

    public function login() {
        $this->setResponse('The login method');
    }

    public function setResponse($response) {
        $this->response = $response;
    }

}