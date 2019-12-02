<?php
namespace Models;
use Entites\Coach as EntityCoach;

class CoachsModel extends Model
{
  /**
   * @return array[EntityCoach]
   */

  public function getCoachs()
  {
    $request = "SELECT
    c.id,
    c.name,
    c.birthday_date,
    c.birthday_place,
    c.nationality,
    c.photo,
    c.link,
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

    $stmt = $this->db->prepare(self::$request);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_CLASS, 'Entities\Coach');
  }


  /**
   * @param int $id
   * @return EntityCoach
   */

  public function showCoach($id)
  {
    $request = "SELECT
    c.id,
    c.name,
    c.birthday_date,
    c.birthday_place,
    c.nationality,
    c.photo,
    c.link,
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
    $stmt = $this->db->prepare(self::$request);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchObject('Entities\Coach');
  }
}

 ?>
