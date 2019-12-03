<?php
namespace Models;
use Entities\Stadium as EntityStadium;

class StadiumsModel extends Model
{
  /**
   * @param int $id
   * @return EntityStadium
   */
  public function getStadiumByTeam(int $id)
  {
    $request = "SELECT
    s.*,
    t.id AS tId
    FROM stadiums AS s
    INNER JOIN teams AS t
    ON t.id_stadium = s.id
    WHERE t.id = :id";

    $stmt = $this->db->prepare($request);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchObject('Entities\Stadium');
  }
}
