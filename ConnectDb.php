<?php
// Singleton to connect db.
class ConnectDb {
  // Hold the class instance.
  private static $instance = null;
  private $conn;
  
  private $host = 'localhost';
  private $user = 'root';
  private $pass = '';
  private $name = 'work_project';
   
  // The db connection is established in the private constructor.
  private function __construct()
  {
    $this->conn = new PDO("mysql:host={$this->host};
    dbname={$this->name};port=3307;", $this->user,$this->pass,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));



    // works
    // $this->conn = new PDO("mysql:host=$this->host;port=3307;dbname=work_project", $this->user, $this->pass); 

  }
  
  public static function getInstance()
  {
    if(!self::$instance)
    {
      self::$instance = new ConnectDb();
    }
   
    return self::$instance;
  }
  
  public function getConnection()
  {
    return $this->conn;
  }
}
?>