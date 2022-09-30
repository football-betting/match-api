<?php
declare(strict_types=1);
namespace App\DataTransferObject;

/**
 * Auto generated data provider
 */
final class CompetitionDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var \App\DataTransferObject\ResultSetDataProvider */
    protected $resultSet;

    /** @var \App\DataTransferObject\CompetitionValuesDataProvider */
    protected $competition;

    /** @var \App\DataTransferObject\ResponseMatchDataProvider[] */
    protected $matches = [];


    /**
     * @return \App\DataTransferObject\ResultSetDataProvider
     */
    public function getResultSet(): ResultSetDataProvider
    {
        return $this->resultSet;
    }


    /**
     * @param \App\DataTransferObject\ResultSetDataProvider $resultSet
     * @return CompetitionDataProvider
     */
    public function setResultSet(ResultSetDataProvider $resultSet)
    {
        $this->resultSet = $resultSet;

        return $this;
    }


    /**
     * @return CompetitionDataProvider
     */
    public function unsetResultSet()
    {
        $this->resultSet = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasResultSet()
    {
        return ($this->resultSet !== null && $this->resultSet !== []);
    }


    /**
     * @return \App\DataTransferObject\CompetitionValuesDataProvider
     */
    public function getCompetition(): CompetitionValuesDataProvider
    {
        return $this->competition;
    }


    /**
     * @param \App\DataTransferObject\CompetitionValuesDataProvider $competition
     * @return CompetitionDataProvider
     */
    public function setCompetition(CompetitionValuesDataProvider $competition)
    {
        $this->competition = $competition;

        return $this;
    }


    /**
     * @return CompetitionDataProvider
     */
    public function unsetCompetition()
    {
        $this->competition = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasCompetition()
    {
        return ($this->competition !== null && $this->competition !== []);
    }


    /**
     * @return \App\DataTransferObject\ResponseMatchDataProvider[]
     */
    public function getMatches(): array
    {
        return $this->matches;
    }


    /**
     * @param \App\DataTransferObject\ResponseMatchDataProvider[] $matches
     * @return CompetitionDataProvider
     */
    public function setMatches(array $matches)
    {
        $this->matches = $matches;

        return $this;
    }


    /**
     * @return CompetitionDataProvider
     */
    public function unsetMatches()
    {
        $this->matches = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasMatches()
    {
        return ($this->matches !== null && $this->matches !== []);
    }


    /**
     * @param \App\DataTransferObject\ResponseMatchDataProvider $ResponseMatch
     * @return CompetitionDataProvider
     */
    public function addResponseMatch(ResponseMatchDataProvider $ResponseMatch)
    {
        $this->matches[] = $ResponseMatch; return $this;
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'resultSet' =>
          array (
            'name' => 'resultSet',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\DataTransferObject\\ResultSetDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
          ),
          'competition' =>
          array (
            'name' => 'competition',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\DataTransferObject\\CompetitionValuesDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
          ),
          'matches' =>
          array (
            'name' => 'matches',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\DataTransferObject\\ResponseMatchDataProvider[]',
            'is_collection' => true,
            'is_dataprovider' => false,
            'isCamelCase' => false,
            'singleton' => 'ResponseMatch',
            'singleton_type' => '\\App\\DataTransferObject\\ResponseMatchDataProvider',
          ),
        );
    }
}
