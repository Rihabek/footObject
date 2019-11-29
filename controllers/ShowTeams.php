<?php

require('../models/Teams.php');

/**
 *
 */
class ShowTeams extends Teams
{
  public $teams;

  public function listTeams()
  {
    $teams = $this->allTeams();
    foreach ($teams as $teams) {
      echo $teams['name'];
    }
  }
}

 ?>
