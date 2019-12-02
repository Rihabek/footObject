<?php
namespace Controllers;

use Models\CoachsModel;
class CoachsController extends Controller
{
  private $CoachsModel;

  public function __construct()
  {
    $this->CoachsModel = new CoachsModel;
  }
  public function listCoachs()
  {
    $this->render('views/coachs.php', [
      'coachs' => $this->CoachsModel->getCoachs()
    ]);
  }
  public function showCoach($id): void
  {
    $this->render('views/coach.php', [
      'coach' => $this->CoachsModel->getCoach($id)
    ]);
  }
}

 ?>
