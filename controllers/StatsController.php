<?php

namespace Controllers;
use Models\MatchsModel;

class StatsController extends Controller
{
  public $MatchsModel;
  public function  __construct()
  {
    $this->MatchsModel = new MatchsModel;
  }

  public function allStats(int $idS): void
  {
    $this->render('views/stats.php', [
      'stats' => $this->MatchsModel->getStatsMatchs($idS)
    ]);
  }
}
