<?php
namespace Controller;

use Models\CoachsModel;
class CoachsController extends Controller
{
  public $coachs;

  public function listCoachs()
  {
    $coachsModel = new CoachsModel;
    $coachs = $coachsModel->getCoachs();
    require('views/coachs.php');
  }
  public function showCoach($id): void
  {
    $coachsModel = new CoachsModel;
    $coach = $coachsModel->getCoach($id);
    require('views/coach.php');
  }
}

 ?>
