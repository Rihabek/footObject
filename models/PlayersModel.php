<?php
namespace Models;
use Entities\Player as EntityPlayer;

class PlayersModel extends Model
{

  /**
   * @param int $id
   * @return EntityPlayer
   */
  public function getPlayers($id)
  {
    $request = "SELECT
    p.*,
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
    return $stmt->fetchObject('Entities\Player');
  }
}

 ?>
