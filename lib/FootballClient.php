<?php
/**
 * Created by PhpStorm.
 * User: Karudev
 * Date: 09/12/2017
 * Time: 00:25
 */
namespace Karudev\Client;


use GuzzleHttp\Client;
use Karudev\Client\Model\Championship;
use Karudev\Client\Model\Club;
use Zend\Hydrator\Reflection as ReflectionHydrator;

class FootballClient extends Client
{
    /**
     * @var string
     */
    private $_url = null;

    /**
     * @var ReflectionHydrator
     */
    private $_hydrator;


    public function __construct(string $url)
    {
        $this->_hydrator = new ReflectionHydrator();
        $this->_url = $url;
        parent::__construct();

    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->_url;
    }

    /**
     * @param string $url
     * @return FootballClient
     */
    public function setUrl(string $url): FootballClient
    {
        $this->_url = $url;
        return $this;
    }


    /**
     * @return array
     */
    public function getClubs() : Championship
    {
        $response = $this->request('GET', $this->_url);
        $data = \GuzzleHttp\json_decode($response->getBody()->getContents());



        $championship = new Championship();


        $championshipFields['_name'] = $data->name;

        foreach ($data->clubs as $club){
            $clubFields['_name'] = $club->name;
            $clubFields['_code'] = $club->code;
            $c = new Club();
            $c = $this->_hydrator->hydrate($clubFields, $c);
            $championship->addClub($c);
        }




        $championship = $this->_hydrator->hydrate($championshipFields, $championship);

        return $championship;

    }



}

