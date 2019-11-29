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
    require('views/team.php');
  }
}

 ?>
