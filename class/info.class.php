<?php

require_once(__DIR__.'/../include/autoloader.inc.php');

    class Info{

        private $stmt;

        public function __construct() {
            $this->stmt = new Stmt(HOST, USER, PWD, DBNAME);
        }


        public function information(){
            $row= $this->stmt->sql_SelectInformation();
            return $row;
        }

    }