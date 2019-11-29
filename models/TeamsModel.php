<?php

/**
 *
 */
class TeamsModel extends Model
{

  public function allTeams()
  {
    $request = "SELECT * FROM teams";
    $stmt = $this->db->prepare($request);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
 ?>
