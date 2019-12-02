<?php
use Controllers\TeamsController;
use Controllers\CoachsController;
use Controllers\PlayersController;


spl_autoload_register(function ($class) {
  $parts = explode('\\', $class);
  $className = array_pop($parts);
  $path = implode(DIRECTORY_SEPARATOR, $parts);
  $file = $className.'.php';
  require strtolower($path) . DIRECTORY_SEPARATOR . $file;
});
$params = explode('/', substr($_SERVER['REQUEST_URI'], 1));
array_shift($params);

$route = $params[0] ? $params[0] : 'teams';

switch ($route) {
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
