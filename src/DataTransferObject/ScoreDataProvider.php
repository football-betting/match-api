<?php
declare(strict_types=1);
namespace App\DataTransferObject;

/**
 * Auto generated data provider
 */
final class ScoreDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var \App\DataTransferObject\FullTimeDataProvider */
    protected $fullTime;


    /**
     * @return \App\DataTransferObject\FullTimeDataProvider
     */
    public function getFullTime(): FullTimeDataProvider
    {
        return $this->fullTime;
    }


    /**
     * @param \App\DataTransferObject\FullTimeDataProvider $fullTime
     * @return ScoreDataProvider
     */
    public function setFullTime(FullTimeDataProvider $fullTime)
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
            'type' => '\\App\\DataTransferObject\\FullTimeDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
          ),
        );
    }
}
