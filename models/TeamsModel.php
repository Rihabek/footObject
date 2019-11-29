<?php
require('../utils/Connection.php');
/**
 *
 */
class TeamsModel extends Model
{

  protected function allTeams()
  {
    $request = "SELECT * FROM teams";
    $stmt = $this->connect()->prepare($request);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}

 ?>
