<?php


namespace App\services;


class SwapiService
{

    public function __construct()
    {
        //
    }

    /**
     * @return bool|mixed
     */
    public function getHomeWorld()
    {
        $curl = new CurlCreator();
        $curl->link = "https://swapi.dev/api/planets/";
        $curl->method = 'GET';

        $curl->homeworld = $curl->link;

        $result = $curl->sendCurl();

        return $result['results'];
    }

    /**
     * @return bool|mixed
     */
    public function getFilms()
    {
        $curl = new CurlCreator();
        $curl->link = "https://swapi.dev/api/films/";
        $curl->method = 'GET';

        $curl->films= $curl->link;

        $result = $curl->sendCurl();

        return $result['results'];
    }

    /**
     * @return bool|mixed
     */
    public function getPeople()
    {
        $curl = new CurlCreator();
        $curl->link = "https://swapi.dev/api/people/";
        $curl->method = 'GET';

        $curl->people= $curl->link;

        $result = $curl->sendCurl();

        return $result['results'];
    }
}