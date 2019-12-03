<?php

namespace Controllers;
use Models\TeamsModel;
use Models\CoachsModel;
use Models\StadiumsModel;
use Models\PlayersModel;
use Models\MatchsModel;

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
    $this->render('views/team.php', [
      'team' => $this->TeamsModel->getTeam($id),
      'players' => (new PlayersModel)->getPlayersByTeam($id),
      'matchs' => (new MatchsModel)->getMatchs($id),
      'nextMatchs' => (new MatchsModel)->getNextMatchs($id),
      'stadium' => (new StadiumsModel)->getStadiumByTeam($id),
      'coach' => (new CoachsModel)->getCoachByTeam($id)
    ]);
  }
}

 ?>
