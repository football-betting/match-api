<?php
declare(strict_types=1);
namespace App\DataTransferObject;

/**
 * Auto generated data provider
 */
final class ResponseMatchDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var string */
    protected $utcDate;

    /** @var \App\DataTransferObject\TeamDataProvider */
    protected $homeTeam;

    /** @var \App\DataTransferObject\TeamDataProvider */
    protected $awayTeam;

    /** @var \App\DataTransferObject\ScoreDataProvider */
    protected $score;


    /**
     * @return string
     */
    public function getUtcDate(): string
    {
        return $this->utcDate;
    }


    /**
     * @param string $utcDate
     * @return ResponseMatchDataProvider
     */
    public function setUtcDate(string $utcDate)
    {
        $this->utcDate = $utcDate;

        return $this;
    }


    /**
     * @return ResponseMatchDataProvider
     */
    public function unsetUtcDate()
    {
        $this->utcDate = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasUtcDate()
    {
        return ($this->utcDate !== null && $this->utcDate !== []);
    }


    /**
     * @return \App\DataTransferObject\TeamDataProvider
     */
    public function getHomeTeam(): TeamDataProvider
    {
        return $this->homeTeam;
    }


    /**
     * @param \App\DataTransferObject\TeamDataProvider $homeTeam
     * @return ResponseMatchDataProvider
     */
    public function setHomeTeam(TeamDataProvider $homeTeam)
    {
        $this->homeTeam = $homeTeam;

        return $this;
    }


    /**
     * @return ResponseMatchDataProvider
     */
    public function unsetHomeTeam()
    {
        $this->homeTeam = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasHomeTeam()
    {
        return ($this->homeTeam !== null && $this->homeTeam !== []);
    }


    /**
     * @return \App\DataTransferObject\TeamDataProvider
     */
    public function getAwayTeam(): TeamDataProvider
    {
        return $this->awayTeam;
    }


    /**
     * @param \App\DataTransferObject\TeamDataProvider $awayTeam
     * @return ResponseMatchDataProvider
     */
    public function setAwayTeam(TeamDataProvider $awayTeam)
    {
        $this->awayTeam = $awayTeam;

        return $this;
    }


    /**
     * @return ResponseMatchDataProvider
     */
    public function unsetAwayTeam()
    {
        $this->awayTeam = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasAwayTeam()
    {
        return ($this->awayTeam !== null && $this->awayTeam !== []);
    }


    /**
     * @return \App\DataTransferObject\ScoreDataProvider
     */
    public function getScore(): ScoreDataProvider
    {
        return $this->score;
    }


    /**
     * @param \App\DataTransferObject\ScoreDataProvider $score
     * @return ResponseMatchDataProvider
     */
    public function setScore(ScoreDataProvider $score)
    {
        $this->score = $score;

        return $this;
    }


    /**
     * @return ResponseMatchDataProvider
     */
    public function unsetScore()
    {
        $this->score = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasScore()
    {
        return ($this->score !== null && $this->score !== []);
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'utcDate' =>
          array (
            'name' => 'utcDate',
            'allownull' => false,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'homeTeam' =>
          array (
            'name' => 'homeTeam',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\DataTransferObject\\TeamDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
          ),
          'awayTeam' =>
          array (
            'name' => 'awayTeam',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\DataTransferObject\\TeamDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
          ),
          'score' =>
          array (
            'name' => 'score',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\DataTransferObject\\ScoreDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
          ),
        );
    }
}
