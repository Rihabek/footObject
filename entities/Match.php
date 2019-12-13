<?php
namespace Entities;

class Match extends Entity
{
  /**
  * @var int
  */
  private $id;

  /**
  * @var int
  */
  private $id_season;

  /**
  * @var int
  */
  private $id_team_home;

  /**
  * @var int
  */
  private $id_team_away;

  /**
  * @var int
  */
  private $score_home;

  /**
  * @var int
  */
  private $score_away;

  /**
  * @var int
  */
  private $day;

  /**
  * @var \DateTime
  */
  private $date;

  /**
  *@var string
  */
  private $thShortName;

  /**
  *@var string
  */
  private $taShortName;

  /**
  *@var int
  */
  private $goalHome;

  /**
  *@var int
  */
  private $goalAway;

  /**
  *@var int
  */
  private $MDay;

  /**
  *@var int
  */
  private $sScoreAway;

  /**
  *@var int
  */
  private $sScoreHome;

  /**
  *@var int
  */
  private $nbMatch;


    /**
     * Get the value of Id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Id Season
     *
     * @return int
     */
    public function getIdSeason()
    {
        return $this->id_season;
    }

    /**
     * Set the value of Id Season
     *
     * @param int $id_season
     *
     * @return self
     */
    public function setIdSeason($id_season)
    {
        $this->id_season = $id_season;

        return $this;
    }

    /**
     * Get the value of Id Team Home
     *
     * @return int
     */
    public function getIdTeamHome()
    {
        return $this->id_team_home;
    }

    /**
     * Set the value of Id Team Home
     *
     * @param int $id_team_home
     *
     * @return self
     */
    public function setIdTeamHome($id_team_home)
    {
        $this->id_team_home = $id_team_home;

        return $this;
    }

    /**
     * Get the value of Id Team Away
     *
     * @return int
     */
    public function getIdTeamAway()
    {
        return $this->id_team_away;
    }

    /**
     * Set the value of Id Team Away
     *
     * @param int $id_team_away
     *
     * @return self
     */
    public function setIdTeamAway($id_team_away)
    {
        $this->id_team_away = $id_team_away;

        return $this;
    }

    /**
     * Get the value of Score Home
     *
     * @return int
     */
    public function getScoreHome()
    {
        return $this->score_home;
    }

    /**
     * Set the value of Score Home
     *
     * @param int $score_home
     *
     * @return self
     */
    public function setScoreHome($score_home)
    {
        $this->score_home = $score_home;

        return $this;
    }

    /**
     * Get the value of Score Away
     *
     * @return int
     */
    public function getScoreAway()
    {
        return $this->score_away;
    }

    /**
     * Set the value of Score Away
     *
     * @param int $score_away
     *
     * @return self
     */
    public function setScoreAway($score_away)
    {
        $this->score_away = $score_away;

        return $this;
    }

    /**
     * Get the value of Day
     *
     * @return int
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set the value of Day
     *
     * @param int $day
     *
     * @return self
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get the value of Date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of Date
     *
     * @param \DateTime $date
     *
     * @return self
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;

        return $this;
    }



    /**
     * Get the value of Th Short Name
     *
     * @return string
     */
    public function getThShortName()
    {
        return $this->thShortName;
    }

    /**
     * Set the value of Th Short Name
     *
     * @param string $thShortName
     *
     * @return self
     */
    public function setThShortName($thShortName)
    {
        $this->thShortName = $thShortName;

        return $this;
    }


    /**
     * Get the value of Ta Short Name
     *
     * @return string
     */
    public function getTaShortName()
    {
        return $this->taShortName;
    }

    /**
     * Set the value of Ta Short Name
     *
     * @param string $taShortName
     *
     * @return self
     */
    public function setTaShortName($taShortName)
    {
        $this->taShortName = $taShortName;

        return $this;
    }

    /**
     * @param Team $team
     *
     * @return bool
     */
    public function isWinner (Team $team):bool
    {
      return (
        $this->getIdTeamHome() === $team->getId() && $this->getScoreHome() > $this->getScoreAway() ||
        $this->getIdTeamAway() === $team->getId() && $this->getScoreHome() < $this->getScoreAway()
      );
    }
    /**
     * @param Team $team
     *
     * @return bool
     */
    public function isLoser (Team $team):bool
    {
      return (
        $this->getIdTeamHome() === $team->getId() && $this->getScoreHome() < $this->getScoreAway() ||
        $this->getIdTeamAway() === $team->getId() && $this->getScoreHome() > $this->getScoreAway()
      );
    }


    /**
     * Get the value of Goal Home
     *
     * @return int
     */
    public function getGoalHome()
    {
        return $this->goalHome;
    }

    /**
     * Set the value of Goal Home
     *
     * @param int $goalHome
     *
     * @return self
     */
    public function setGoalHome($goalHome)
    {
        $this->goalHome = $goalHome;

        return $this;
    }

    /**
     * Get the value of Goal Away
     *
     * @return int
     */
    public function getGoalAway()
    {
        return $this->goalAway;
    }

    /**
     * Set the value of Goal Away
     *
     * @param int $goalAway
     *
     * @return self
     */
    public function setGoalAway($goalAway)
    {
        $this->goalAway = $goalAway;

        return $this;
    }


    /**
     * Get the value of Day
     *
     * @return int
     */
    public function getMDay()
    {
        return $this->MDay;
    }

    /**
     * Set the value of Day
     *
     * @param int $MDay
     *
     * @return self
     */
    public function setMDay($MDay)
    {
        $this->MDay = $MDay;

        return $this;
    }

    /**
     * Get the value of Score Away
     *
     * @return int
     */
    public function getSScoreAway()
    {
        return $this->sScoreAway;
    }

    /**
     * Set the value of Score Away
     *
     * @param int $sScoreAway
     *
     * @return self
     */
    public function setSScoreAway($sScoreAway)
    {
        $this->sScoreAway = $sScoreAway;

        return $this;
    }

    /**
     * Get the value of Score Home
     *
     * @return int
     */
    public function getSScoreHome()
    {
        return $this->sScoreHome;
    }

    /**
     * Set the value of Score Home
     *
     * @param int $sScoreHome
     *
     * @return self
     */
    public function setSScoreHome($sScoreHome)
    {
        $this->sScoreHome = $sScoreHome;

        return $this;
    }


    /**
     * Get the value of Nb Match
     *
     * @return int
     */
    public function getNbMatch()
    {
        return $this->nbMatch;
    }

    /**
     * Set the value of Nb Match
     *
     * @param int $nbMatch
     *
     * @return self
     */
    public function setNbMatch($nbMatch)
    {
        $this->nbMatch = $nbMatch;

        return $this;
    }

}
