<?php

namespace Controllers;
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
  public function showTeam(int $id): void
  {
    /*$teamsModel = new TeamsModel;
    $team = $teamsModel->getTeam($id);
    $players = $teamsModel->getPlayers($id);
    $matchs = $teamsModel->getMatchs($id);
    $nextMatchs = $teamsModel->getNextMatchs($id);*/

    $this->render('views/team.php', [
      'team' => $this->TeamsModel->getTeam($id),
      'players' => $this->TeamsModel->getPlayers($id),
      'matchs' => $this->TeamsModel->getMatchs($id),
      'nextMatchs' => $this->TeamsModel->getNextMatchs($id),
    ]);
  }
}

 ?>
