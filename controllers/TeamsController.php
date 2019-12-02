<?php

namespace Controller;
use Models\TeamsModel;
class TeamsController extends Controller
{
  public $teams;

  public function listTeams()
  {
    $teamsModel = new TeamsModel;
    $teams = $teamsModel->getTeams();
    require('views/teams.php');
  }
  public function showTeam($id): void
  {
    $teamsModel = new TeamsModel;
    $team = $teamsModel->getTeam($id);
    $players = $teamsModel->getPlayers($id);
    $matchs = $teamsModel->getMatchs($id);
    $nextMatchs = $teamsModel->getNextMatchs($id);
    require('views/team.php');
  }
}

 ?>
