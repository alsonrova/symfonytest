<?php 
namespace App\Service;

use GuzzleHttp\Client;

class SwapiDataService
{
    private $apiBaseUrl = 'https://swapi.dev/api/';

    private $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client([
            'base_uri' => $this->apiBaseUrl,
            'verify'   => false,
        ]);
    }

    public function getStarship($id)
    {
        $response = $this->httpClient->get('starships/' . $id);
        return json_decode($response->getBody(), true);
    }

    public function getStarships()
    {
        $response = $this->httpClient->get('starships');
        return json_decode($response->getBody(), true);
    }

    public function getPeople($id)
    {
        $response = $this->httpClient->get('people/' . $id);
        return json_decode($response->getBody(), true);
    }

    public function getPeoples()
    {
        $response = $this->httpClient->get('people');
        return json_decode($response->getBody(), true);
    }

    public function getPlanet($id)
    {
        $response = $this->httpClient->get('planets/' . $id);
        return json_decode($response->getBody(), true);
    }

    public function getPlanets()
    {
        $response = $this->httpClient->get('planets');
        return json_decode($response->getBody(), true);
    }

    public function getFilm($id)
    {
        $response = $this->httpClient->get('films/' . $id);
        return json_decode($response->getBody(), true);
    }

    public function getFilms()
    {
        $response = $this->httpClient->get('films');
        return json_decode($response->getBody(), true);
    }

}

?>