<?php
namespace Sparta;

class Database
{
    protected $host;
    protected $port;
    protected $name;
    protected $user;
    protected $pass;
    protected $db_root_user;
    protected $db_root_pass;

    public function __construct()
    {
        $this->host = getenv('DB_HOST');
        $this->port = getenv('DB_PORT');
        $this->name = getenv('DB_NAME');
        $this->user = getenv('DB_USER');
        $this->pass = getenv('DB_PASS');
        $this->root_user = getenv('DB_ROOT_USER');
        $this->root_pass = getenv('DB_ROOT_PASS');
    }

    public function load()
    {
        try {
            $db = new \PDO("mysql:host=$this->host;port=$this->port;dbname=$this->name", $this->user, $this->pass)
                || die(print_r($db->errorInfo(), true));
        } catch (PDOException $e) {
            die("Database Error: $e->getMessage()" . PHP_EOL);
        }

        return $db;
    }

    public function setup()
    {   
        try {
            $db = new \PDO("mysql:host=$this->host;port=$this->port", $this->root_user, $this->root_pass);
            $db->exec("
                CREATE DATABASE `$this->name`;
                CREATE USER '$this->user'@'localhost' IDENTIFIED BY '$this->pass';
                GRANT ALL ON `$this->name`.* TO '$this->user'@'localhost';
                FLUSH PRIVILEGES;
            ") || die(print_r($db->errorInfo(), true));
        } catch (PDOException $e) {
            die("Database Error: $e->getMessage()" . PHP_EOL);
        }   

        return $db;
    } 
}
