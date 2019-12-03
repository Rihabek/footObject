<?php

namespace Models;
use Entities\Team as EntityTeam;

class TeamsModel extends Model
{
  /**
  *@return array[EntityTeam]
  */
  public function getTeams(): array
  {
    $request = "SELECT * FROM teams";
    $stmt = $this->db->prepare($request);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_CLASS, 'Entities\Team');
  }

  /**
   * @param int $id
   * @return EntityTeam
   */

  public function getTeam(int $id)
  {
    $request = "SELECT
    t.*
    FROM teams AS t
    WHERE t.id = :id";

    $stmt = $this->db->prepare($request);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchObject('Entities\Team');
  }

}
 ?>
