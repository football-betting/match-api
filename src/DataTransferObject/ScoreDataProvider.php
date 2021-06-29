<?php
declare(strict_types=1);
namespace App\DataTransferObject;

/**
 * Auto generated data provider
 */
final class ScoreDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var \App\DataTransferObject\GoalsDataProvider */
    protected $fullTime;

    /** @var \App\DataTransferObject\GoalsDataProvider */
    protected $extraTime;

    /** @var \App\DataTransferObject\GoalsDataProvider */
    protected $penalties;


    /**
     * @return \App\DataTransferObject\GoalsDataProvider
     */
    public function getFullTime(): GoalsDataProvider
    {
        return $this->fullTime;
    }


    /**
     * @param \App\DataTransferObject\GoalsDataProvider $fullTime
     * @return ScoreDataProvider
     */
    public function setFullTime(GoalsDataProvider $fullTime)
    {
        $this->fullTime = $fullTime;

        return $this;
    }


    /**
     * @return ScoreDataProvider
     */
    public function unsetFullTime()
    {
        $this->fullTime = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasFullTime()
    {
        return ($this->fullTime !== null && $this->fullTime !== []);
    }


    /**
     * @return \App\DataTransferObject\GoalsDataProvider
     */
    public function getExtraTime(): GoalsDataProvider
    {
        return $this->extraTime;
    }


    /**
     * @param \App\DataTransferObject\GoalsDataProvider $extraTime
     * @return ScoreDataProvider
     */
    public function setExtraTime(GoalsDataProvider $extraTime)
    {
        $this->extraTime = $extraTime;

        return $this;
    }


    /**
     * @return ScoreDataProvider
     */
    public function unsetExtraTime()
    {
        $this->extraTime = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasExtraTime()
    {
        return ($this->extraTime !== null && $this->extraTime !== []);
    }


    /**
     * @return \App\DataTransferObject\GoalsDataProvider
     */
    public function getPenalties(): GoalsDataProvider
    {
        return $this->penalties;
    }


    /**
     * @param \App\DataTransferObject\GoalsDataProvider $penalties
     * @return ScoreDataProvider
     */
    public function setPenalties(GoalsDataProvider $penalties)
    {
        $this->penalties = $penalties;

        return $this;
    }


    /**
     * @return ScoreDataProvider
     */
    public function unsetPenalties()
    {
        $this->penalties = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasPenalties()
    {
        return ($this->penalties !== null && $this->penalties !== []);
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'fullTime' =>
          array (
            'name' => 'fullTime',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\DataTransferObject\\GoalsDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
          ),
          'extraTime' =>
          array (
            'name' => 'extraTime',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\DataTransferObject\\GoalsDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
          ),
          'penalties' =>
          array (
            'name' => 'penalties',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\DataTransferObject\\GoalsDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
          ),
        );
    }
}
