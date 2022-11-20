<?php
declare(strict_types=1);
namespace App\DataTransferObject;

/**
 * Auto generated data provider
 */
final class GoalsDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var int */
    protected $home;

    /** @var int */
    protected $away;


    /**
     * @return int
     */
    public function getHome(): ?int
    {
        return $this->home;
    }


    /**
     * @param int $home
     * @return GoalsDataProvider
     */
    public function setHome(?int $home = null)
    {
        $this->home = $home;

        return $this;
    }


    /**
     * @return GoalsDataProvider
     */
    public function unsetHome()
    {
        $this->home = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasHome()
    {
        return ($this->home !== null && $this->home !== []);
    }


    /**
     * @return int
     */
    public function getAway(): ?int
    {
        return $this->away;
    }


    /**
     * @param int $away
     * @return GoalsDataProvider
     */
    public function setAway(?int $away = null)
    {
        $this->away = $away;

        return $this;
    }


    /**
     * @return GoalsDataProvider
     */
    public function unsetAway()
    {
        $this->away = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasAway()
    {
        return ($this->away !== null && $this->away !== []);
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'home' =>
          array (
            'name' => 'home',
            'allownull' => true,
            'default' => '',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'away' =>
          array (
            'name' => 'away',
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
