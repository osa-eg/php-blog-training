<?php
namespace Classes;

require_once __DIR__."/../vendor/autoload.php";
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

use mysqli;

class Database
{
   private $conn;
   private static $instance = null;

   private function __construct()
   {
        
       $this->conn = new mysqli( $_ENV['DB_HOST'], $_ENV['DB_USER'],$_ENV['DB_PASSWORD'] , $_ENV['DB_NAME']);

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
