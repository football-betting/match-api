<?php
declare(strict_types=1);
namespace App\DataTransferObject;

/**
 * Auto generated data provider
 */
final class FullTimeDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var int */
    protected $homeTeam;

    /** @var int */
    protected $awayTeam;


    /**
     * @return int
     */
    public function getHomeTeam(): ?int
    {
        return $this->homeTeam;
    }


    /**
     * @param int $homeTeam
     * @return FullTimeDataProvider
     */
    public function setHomeTeam(?int $homeTeam = null)
    {
        $this->homeTeam = $homeTeam;

        return $this;
    }


    /**
     * @return FullTimeDataProvider
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
     * @return int
     */
    public function getAwayTeam(): ?int
    {
        return $this->awayTeam;
    }


    /**
     * @param int $awayTeam
     * @return FullTimeDataProvider
     */
    public function setAwayTeam(?int $awayTeam = null)
    {
        $this->awayTeam = $awayTeam;

        return $this;
    }


    /**
     * @return FullTimeDataProvider
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
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'homeTeam' =>
          array (
            'name' => 'homeTeam',
            'allownull' => true,
            'default' => '',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'awayTeam' =>
          array (
            'name' => 'awayTeam',
            'allownull' => true,
            'default' => '',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
        );
    }
}
