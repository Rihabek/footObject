<?php

require('../models/Teams.php');

/**
 *
 */
class TeamsController extends Controller
{
  public $teams;

  public function listTeams()
  {
    $teamsModel = new TeamsModel;
    $teams = $teamsModel->allTeams();
    require('views/teams.php');
  }
}

 ?>
