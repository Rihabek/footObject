<?php

namespace Controllers;
use Models\TeamsModel;
class TeamsController extends Controller
{
  public $TeamsModel;
  public function  __construct()
  {
    $this->TeamsModel = new TeamsModel;
  }

  public function listTeams()
  {
    $this->render('views/teams.php', [
      'teams' => $this->TeamsModel->getTeams()
    ]);
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
