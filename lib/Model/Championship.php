<?php
/**
 * Created by PhpStorm.
 * User: Karudev
 * Date: 09/12/2017
 * Time: 01:31
 */
namespace Karudev\Client\Model;

class Championship
{
    /**
     * @var string
     */
    private $_name;

    /**
     * @var array
     */
    private $_clubs = [];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->_name;
    }

    /**
     * @param string $name
     * @return Championship
     */
    public function setName(string $name): Championship
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getClubs(): array
    {
        return $this->_clubs;
    }

    /**
     * @param array $clubs
     * @return Championship
     */
    public function setClub(array $clubs): Championship
    {
        $this->_clubs = $clubs;
        return $this;
    }

    /**
     * @param Club $club
     * @return Championship
     */
    public function addClub(Club $club): Championship
    {
        $this->_clubs[] = $club;
        return $this;
    }




}