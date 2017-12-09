<?php
/**
 * Created by PhpStorm.
 * User: Karudev
 * Date: 09/12/2017
 * Time: 00:49
 */

namespace Karudev\Tests;

require __DIR__ . '/../vendor/autoload.php';


use Karudev\Client\FootballClient;
use PHPUnit\Framework\TestCase;

class FootballClientTest extends TestCase
{

    public function testGetClubs()
    {
        $footballClientMock = $this->getMockBuilder(FootballClient::class)
            ->enableOriginalConstructor()
            ->setConstructorArgs(['https://raw.githubusercontent.com/opendatajson/football.json/master/2017-18/en.1.clubs.json'])
            ->setMethods(null)
            ->getMock();

        $championship = $footballClientMock->getClubs();

        $this->assertEquals('English Premier League 2017/18',$championship->getName());

        $this->assertEquals(count($championship->getClubs()),20);

    }

}
