<?php
$route = explode('/', substr($_SERVER['REQUEST_URI'], 1));
array_shift($route);
var_dump($route);
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
    if (isset($_GET['id'])) {
      $teams->showTeam($_GET['id']);
    }else {
      $teams-> listTeams();
    }
    break;
  case 'coachs' :
    $coachs = new CoachsController;
    if (isset($_GET['id'])) {
      $coachs->showCoach($_GET['id']);
    } else {
      $coachs->listCoachs();
    }
    break;
    case 'player' :
      $players = new PlayersController;
      if (isset($_GET['id'])) {
        $players->showPlayer($_GET['id']);
      }
      break;
  default:
    include('views/404.php');
    break;
}
 ?>
