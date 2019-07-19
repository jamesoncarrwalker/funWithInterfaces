<?php

/**
 * Created by PhpStorm.
 * User: jamesskywalker
 * Date: 02/06/2019
 * Time: 19:53
 */
class only {

    private $dbName;
    private $dbHost;
    private $dbUsername;
    private $dbPass;

    protected function connectFour(string $called) {
        return $this->onlyConnect();
    }


    private function onlyConnect() {
        $this->setConnectionVars();
            try {
                $only = new PDO('mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName, $this->dbUsername, $this->dbPass);
                $only->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                $only->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                return $only;
            } catch (PDOException $e) {
                error_log($e->getMessage());
                echo $e->getMessage();
                die();
                //for production
//            echo "We fell at the first hurdle.  Please refresh and try again.";
//            die();
            }


    }

    private function setConnectionVars() {
        if(isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] == 'localhost')  $dbDetail = (object) parse_ini_file("localIni.ini",true)["PDO_CONNECT"];
        else  $dbDetail = (object) parse_ini_file("example.ini",true)["PDO_CONNECT"];

        $this->dbName = $dbDetail->dbName;
        $this->dbHost = $dbDetail->dbHost;
        $this->dbUsername = $dbDetail->dbUsername;
        $this->dbPass = $dbDetail->dbPass;

    }



}