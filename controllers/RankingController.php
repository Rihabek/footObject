<?php

namespace Controllers;
use Models\TeamsModel;
use Models\MatchsModel;

class RankingController extends Controller
{
  public $MatchsModel;
  public function  __construct()
  {
    $this->MatchsModel = new MatchsModel;
  }

  public function rank()
  {
    $this->render('views/ranking.php', [
      'ranks' => $this->MatchsModel->getRank()
    ]);
  }

}
