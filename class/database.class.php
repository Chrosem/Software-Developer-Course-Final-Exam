<?php

class Database{

    protected $host;
    protected $user;
    protected $pwd;
    protected $db_Name;

    protected function __construct($host, $user, $pwd, $db_Name) {
        $this->host = $host;
        $this->user = $user;
        $this->pwd = $pwd;
        $this->db_Name = $db_Name;

    }

    protected function connect() {
        $db_Con = new PDO("mysql:dbname=$this->db_Name;host=$this->host", $this->user, $this->pwd);
        return $db_Con;

        }

}