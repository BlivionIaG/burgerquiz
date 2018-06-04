<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InterfaceBDD
 *
 * @author kev29lt
 */
require_once('consts.php');

class InterfaceBDD {

    private $bdd;

    public function InterfaceBDD() {
        $this->Connect();
    }

    public function getBdd() {
        return $this->bdd;
    }

    public function setBdd($_bdd) {
        $this->bdd = $_bdd;
    }

    public function Connect() {
        try {
            $this->setBdd(new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD));
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
        return $this->getBdd();
    }

}
