<?php
namespace Controllers;

use Models\PlayersModel;
class PlayersController extends Controller
{
  private $PlayerModel;

  public function __construct())
  {
    $this->PlayersModel = new PlayersModel;
  }

  public function showPlayer($id): void
  {
    $this->render('views/player.php', [
      'players' => $this->PlayersModel->getPlayers($id)
    ]);
  }
}

 ?>
