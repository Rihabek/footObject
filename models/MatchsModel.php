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
    WHERE (th.id = :id OR ta.id = :id) AND m.score_home IS NOT NULL";
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
    WHERE (th.id = :id OR ta.id = :id) AND m.score_home IS  NULL";
    $stmt = $this->db->prepare($request);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_CLASS, 'Entities\Match');
  }

  /**
  *@return array
  */
  public function getRank(): array
  {
    $request =
    "SELECT  @rank := @rank + 1 as p, q.*
    FROM (
    SELECT teams.short_name, teams.id, gp, score_for gf, score_against ga, score_for - score_against gd, w, l, d, (w * 3) + d as pts
      FROM  teams
        inner join
          (select team, sum(score_home) score_for
             from
               (select id_team_home as team, score_home
                  from matchs
                WHERE matchs.score_home IS NOT NULL AND matchs.score_away IS NOT NULL
                union all
                select id_team_away, score_away
                  from matchs
                WHERE matchs.score_home IS NOT NULL AND matchs.score_away IS NOT NULL
               ) qq
             group by team
           ) q1
           on teams.id = q1.team
        inner join
          (select id_team_home as team, sum(score_away) score_against
             from
               (select id_team_home, score_away
                  from matchs
                WHERE matchs.score_home IS NOT NULL AND matchs.score_away IS NOT NULL
                union all
                select id_team_away, score_home
                  from matchs
                WHERE matchs.score_home IS NOT NULL AND matchs.score_away IS NOT NULL
               ) qq
            group by team
         ) q2
         on teams.id = q2.team
       inner join
         (SELECT id_team_home as team, count(case when result = 1 then result end) w, count(case when result = 0 then result end) d, count(case when result = -1 then result end) l
            FROM
                (SELECT m.id_team_home, case when m.score_home > m.score_away then 1 when m.score_home = m.score_away then 0 else -1 end result
                 FROM matchs AS m
                 WHERE m.score_home IS NOT NULL AND m.score_away IS NOT NULL
                 UNION ALL SELECT m.id_team_away, case when m.score_away > m.score_home then 1 when m.score_away = m.score_home then 0 else -1 end result
                 FROM matchs AS m
                 WHERE m.score_home IS NOT NULL AND m.score_away IS NOT NULL ) qq
                 GROUP BY team
         ) q3
         on teams.id = q3.team
        inner join
         (select team, count(*) gp
           from
            (select id_team_home as team
               from matchs
             WHERE matchs.score_home IS NOT NULL AND matchs.score_away IS NOT NULL
             union all
             select id_team_away as team
               from matchs
             WHERE matchs.score_home IS NOT NULL AND matchs.score_away IS NOT NULL
            ) qq
           GROUP BY team
         ) q4
         ON teams.id = q4.team

       ORDER BY pts DESC, gd DESC, gf DESC
    ) q, (select @rank := 0) z";
    $stmt = $this->db->prepare($request);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_CLASS);
  }

  /**
  * @param int $id
   * @return EntityMatch
   */

  public function getStatsMatchs($id): array
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
    WHERE m.score_home IS NOT NULL AND m.day = :id
    ORDER BY m.day ASC";

    $stmt = $this->db->prepare($request);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_CLASS, 'Entities\Match');
  }


}
