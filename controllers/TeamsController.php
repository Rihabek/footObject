<?php


/**
 *
 */
class TeamsController extends Controller
{
  public $teams;

  public function listTeams()
  {
    $teamsModel = new TeamsModel;
    $teams = $teamsModel->getTeams();
    require('views/teams.php');
  }
  public function showTeam($id)
  {
    $teamsModel = new TeamsModel;
    $team = $teamsModel->getTeam($id);
    $players = getPlayers($id);
    $matchs = getMatchs($id);
    $nextMatchs = getNextMatchs($id);
    require('views/team.php');
  }
}

 ?>
