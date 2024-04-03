<?php
    define('host','localhost');
    define('user','root');
    define('pass','');
    define('db','dbtest');
    class MYSQLI_OBJECT{
        private $link,$host,$user,$pass,$db;
        public function __construct(){
            mysqli_set_charset( $this->link,'utf8');
            if(mysqli_connect_errno())
                echo mysqli_connect_error();
        }
        public function GetMySQL(){
            return $this->link;
        }
        public function __destruct(){
            $this->link=null;
        }
        public function query($query){
            return $this->link->query($query);
        }
        public function execute($query){
            return $this->link->execute($query);
        }
        public function __sleep(){
            return array('host','user','pass','db');
        }
        public function __wakeup(){
            self::__construct();
        }
    }
    ?>