<?php
spl_autoload_register(function ($className)
{
  $file = 'controllers/' . $className . '.php';
  if (file_exists($file)) {
    include $file;
  }else {
    include 'models/' . $className . '.php';
  }
});

$path = isset($_GET['path']) ? $_GET['path'] : 'teams';

switch ($path) {
  case 'teams':
    $teams = new TeamsController;
    $teams-> listTeams();
    break;
  
  default:
    include('views/404.php');
    break;
}
 ?>
