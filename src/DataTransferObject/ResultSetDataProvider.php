<?php
declare(strict_types=1);
namespace App\DataTransferObject;

/**
 * Auto generated data provider
 */
final class ResultSetDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var int */
    protected $count;

    /** @var string */
    protected $first;

    /** @var string */
    protected $last;

    /** @var int */
    protected $played;


    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }


    /**
     * @param int $count
     * @return ResultSetDataProvider
     */
    public function setCount(int $count)
    {
        $this->count = $count;

        return $this;
    }


    /**
     * @return ResultSetDataProvider
     */
    public function unsetCount()
    {
        $this->count = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasCount()
    {
        return ($this->count !== null && $this->count !== []);
    }


    /**
     * @return string
     */
    public function getFirst(): string
    {
        return $this->first;
    }


    /**
     * @param string $first
     * @return ResultSetDataProvider
     */
    public function setFirst(string $first)
    {
        $this->first = $first;

        return $this;
    }


    /**
     * @return ResultSetDataProvider
     */
    public function unsetFirst()
    {
        $this->first = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasFirst()
    {
        return ($this->first !== null && $this->first !== []);
    }


    /**
     * @return string
     */
    public function getLast(): string
    {
        return $this->last;
    }


    /**
     * @param string $last
     * @return ResultSetDataProvider
     */
    public function setLast(string $last)
    {
        $this->last = $last;

        return $this;
    }


    /**
     * @return ResultSetDataProvider
     */
    public function unsetLast()
    {
        $this->last = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasLast()
    {
        return ($this->last !== null && $this->last !== []);
    }


    /**
     * @return int
     */
    public function getPlayed(): int
    {
        return $this->played;
    }


    /**
     * @param int $played
     * @return ResultSetDataProvider
     */
    public function setPlayed(int $played)
    {
        $this->played = $played;

        return $this;
    }


    /**
     * @return ResultSetDataProvider
     */
    public function unsetPlayed()
    {
        $this->played = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasPlayed()
    {
        return ($this->played !== null && $this->played !== []);
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'count' =>
          array (
            'name' => 'count',
            'allownull' => false,
            'default' => '',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'first' =>
          array (
            'name' => 'first',
            'allownull' => false,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'last' =>
          array (
            'name' => 'last',
            'allownull' => false,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'played' =>
          array (
            'name' => 'played',
            'allownull' => false,
            'default' => '',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
        );
    }
}
