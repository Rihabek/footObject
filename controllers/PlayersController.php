<?php
namespace Controllers;

use Models\PlayersModel;
class PlayersController extends Controller
{
  public $players;

  public function showPlayer($id): void
  {
    $playersModel = new PlayersModel;
    $players = $playersModel->getPlayers($id);
    require('views/player.php');
  }
}

 ?>
