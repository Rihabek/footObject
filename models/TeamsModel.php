<?php

namespace Models;
use Entities\Team as EntityTeam;
use Entities\Player as EntityPlayer;
use Entities\Stadium as EntityStadium;
use Entities\Coach as EntityCoach;
use Entities\Match as EntityMatch;

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

  public function getTeam($id)
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

  /**
   * @param int $id
   * @return EntityStadium
   */
  public function getStadiumByTeam($id)
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


  /**
   * @param int $id
   * @return EntityCoach
   */
  public function getCoachByTeam($id)
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

  /**
   * @param int $id
   * @return EntityPlayer
   */

  public function getPlayers($id)
  {
    $request = "SELECT
    p.*,
    t.id AS tId
    FROM players AS p
    INNER JOIN players_has_teams AS pht
    ON pht.id_player = p.id
    INNER JOIN teams AS t
    ON pht.id_team = t.id
    WHERE t.id = :id";
    $stmt = $this->db->prepare($request);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_CLASS, 'Entities\Player');
  }


  /**
   * @param int $id
   * @return EntityMatch
   */

  public function getMatchs($id)
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
  public function getNextMatchs($id)
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
 ?>
