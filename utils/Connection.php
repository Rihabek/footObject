<?php
/**
 *
 */
class Connection
{
  private $servername;
  private $username;
  private $password;
  private $dbname;
  private $utf;

  protected function connect()
  {
    $this->servername ="localhost";
    $this->username = "root";
    $this->password = "";
    $this->dbname = "football_french_championship";
    $this->utf = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    //$conn = new PDO('mysql:host=localhost;dbname=football_french_championship', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
     $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", "$this->username", "$this->password", $this->utf);
    return $conn;
  }

}

 ?>
