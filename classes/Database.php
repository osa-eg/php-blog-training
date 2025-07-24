<?php
namespace Classes;

use mysqli;

class Database
{
   private $host = "localhost";
   private $user = "root";
   private $pass = "";
   private $dbname = "blog_test";

   private $conn;
   private static $instance = null;

   private function __construct()
   {
       $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

       if ($this->conn->connect_error) {
           die("❌ Connection failed: " . $this->conn->connect_error);
       }
   }

   public static function getInstance()
   {
       if (!self::$instance) {
           self::$instance = new Database();
       }
       return self::$instance;
   }

   public function getConnection()
   {
       return $this->conn;
   }
}
