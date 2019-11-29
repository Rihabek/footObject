<?php

/**
 *
 */
class TeamsModel extends Model
{

  public function getTeams()
  {
    $request = "SELECT * FROM teams";
    $stmt = $this->db->prepare($request);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getTeam($id)
  {
    $request = "SELECT
    t.*,
    c.id AS cId,
    c.name AS cName,
    cht.id_coach,
    cht.id_team,
    cht.start_date AS startCoach,
    cht.end_date endCoach,
    s.id AS sId,
    s.name AS sName,
    s.adress AS sAdress,
    s.tel AS sTel,
    s.capacity AS sCapacity
    FROM teams AS t
    INNER JOIN stadiums AS s
    ON t.id_stadium = s.id
    INNER JOIN coachs_has_teams AS cht
    ON cht.id_team = t.id
    INNER JOIN coachs AS c
    ON cht.id_coach= c.id
    WHERE t.id = :id";

    $stmt = $this->db->prepare($request);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
 ?>
