<?php
/**
 * Created by PhpStorm.
 * User: Karudev
 * Date: 09/12/2017
 * Time: 01:41
 */
namespace Karudev\Client\Model;

class Club
{
    /**
     * @var string
     */
    private $_code;

    /**
     * @var string
     */
    private $_name;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->_code;
    }

    /**
     * @param string $code
     * @return Club
     */
    public function setCode(string $code): Club
    {
        $this->_code = $code;
        return $this;
    }
}