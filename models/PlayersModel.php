<?php
/**
 *
 */
class PlayersModel extends Model
{

  public function getPlayers($id)
  {
    $request = "SELECT
    p.id,
    p.name,
    p.short_name,
    p.birthday_date,
    p.birthday_place,
    p.weight,
    p.size,
    p.nationality,
    p.poste,
    p.photo,
    p.link,
    pht.id_player,
    pht.id_team,
    pht.start_date AS startPlayer,
    pht.end_date endPlayer,
    t.id AS tId,
    t.name AS tName
    FROM players AS p
    INNER JOIN players_has_teams AS pht
    ON pht.id_player = p.id
    INNER JOIN teams AS t
    ON pht.id_team = t.id
    WHERE p.id = :id";
    $stmt = $this->db->prepare($request);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch();
  }
}

 ?>
