<?php

require_once(__DIR__.'/../include/autoloader.inc.php');

    class Articles{

        private $stmt;

        public function __construct() {
            $this->stmt = new Stmt(HOST, USER, PWD, DBNAME);
        }

        public function articles(){
            $row= $this->stmt->sql_SelectArticles();
            return $row;
        }

        public function show_article($id){
            $row= $this->stmt->sql_SelectIDArticle($id);
            return $row;
        }

    }