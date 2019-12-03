<?php
namespace Models;
use Entities\Match as EntityMatch;


class MatchsModel extends Model
{

  /**
   * @param int $id
   * @return EntityMatch
   */

  public function getMatchs(int $id)
  {
    $request = "SELECT
    m.*,
    th.id AS thId,
    ta.id AS taId,
    th.short_name AS thShortName,
    ta.short_name AS taShortName
    FROM matchs AS m
    INNER JOIN teams AS th
    ON th.id = m.id_team_home
    INNER JOIN teams AS ta
    ON ta.id = m.id_team_away
    WHERE (th.id = :id OR ta.id = :id) AND m.date IS NULL";
    $stmt = $this->db->prepare($request);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_CLASS, 'Entities\Match');
  }

  /**
   * @param int $id
   * @return EntityMatch
   */
  public function getNextMatchs(int $id)
  {
    $request = "SELECT
    m.*,
    th.id AS thId,
    ta.id AS taId,
    th.short_name AS thShortName,
    ta.short_name AS taShortName
    FROM matchs AS m
    INNER JOIN teams AS th
    ON th.id = m.id_team_home
    INNER JOIN teams AS ta
    ON ta.id = m.id_team_away
    WHERE (th.id = :id OR ta.id = :id) AND m.date IS NOT NULL";
    $stmt = $this->db->prepare($request);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_CLASS, 'Entities\Match');
  }

}
