<?php
use Controllers\TeamsController;
use Controllers\CoachsController;
use Controllers\PlayersController;
use Controllers\RankingController;

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
    if (isset($params[1])) {
    $teams->showTeam($params[1]);
    } else {
      $teams->listTeams();
    }
    break;
  case 'coachs' :
    $coachs = new CoachsController;
    if (isset($params[1])) {
      $coachs->showCoach($params[1]);
    } else {
      $coachs->listCoachs();
    }
    break;
    case 'player' :
      $players = new PlayersController;
      if (isset($params[1])) {
        $players->showPlayer($params[1]);
      }
      break;
    case 'ranking' :
      $rankings = new RankingController;
      $rankings->rank();
      break;
  default:
    include('views/404.php');
    break;
}
 ?>
