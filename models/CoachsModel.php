<?php
namespace Models;
use Entities\Coach as EntityCoach;

class CoachsModel extends Model
{
  /**
   * @return array[EntityCoach]
   */

  public function getCoachs()
  {
    $request = "SELECT
    c.*,
    t.id AS tId,
    t.name AS tName,
    t.logo AS tLogo,
    cht.id_coach,
    cht.id_team,
    cht.start_date AS startCoach,
    cht.end_date endCoach
    FROM coachs AS c
    INNER JOIN coachs_has_teams AS cht
    ON cht.id_coach = c.id
    INNER JOIN teams AS t
    ON cht.id_team= t.id";

    $stmt = $this->db->prepare($request);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_CLASS, 'Entities\Coach');
  }


  /**
   * @param int $id
   * @return EntityCoach
   */

  public function showCoach(int $id)
  {
    $request = "SELECT
    c.*,
    t.id AS tId,
    t.name AS tName,
    t.logo AS tLogo,
    cht.id_coach,
    cht.id_team,
    cht.start_date AS startCoach,
    cht.end_date endCoach
    FROM coachs AS c
    INNER JOIN coachs_has_teams AS cht
    ON cht.id_coach = c.id
    INNER JOIN teams AS t
    ON cht.id_team= t.id
    WHERE c.id = :id";
    $stmt = $this->db->prepare($request);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchObject('Entities\Coach');
  }

  /**
   * @param int $id
   * @return EntityCoach
   */
  public function getCoachByTeam(int $id)
  {
    $request = "SELECT
    c.*,
    t.id as tId
    FROM coachs AS c
    INNER JOIN coachs_has_teams AS cht
    ON cht.id_coach = c.id
    INNER JOIN teams AS t
    ON t.id = cht.id_team
    WHERE t.id = :id";

    $stmt = $this->db->prepare($request);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchObject('Entities\Coach');
  }




}

 ?>
