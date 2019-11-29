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

  public function getPlayers($id)
  {
    $request = "SELECT
    p.id AS pId,
    p.name,
    p.nationality,
    p.birthday_date,
    p.poste,
    t.id
    FROM players AS p
    INNER JOIN players_has_teams AS pht
    ON pht.id_player = p.id
    INNER JOIN teams AS t
    ON pht.id_team = t.id
    WHERE t.id = :id";
    $stmt = $this->db->prepare($request);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getMatchs($id)
  {
    $request = "SELECT
    m.id AS mId,
    m.id_season AS idSeason,
    m.id_team_home AS teamHome,
    m.id_team_away AS teamAway,
    m.score_home AS scoreHome,
    m.score_away AS scoreAway,
    m.day AS mDay,
    m.date AS mDate,
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
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getNextMatchs($id)
  {
    $request = "SELECT
    m.id AS mId,
    m.id_season AS idSeason,
    m.id_team_home AS teamHome,
    m.id_team_away AS teamAway,
    m.score_home AS scoreHome,
    m.score_away AS scoreAway,
    m.day AS mDay,
    m.date AS mDate,
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
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
 ?>
