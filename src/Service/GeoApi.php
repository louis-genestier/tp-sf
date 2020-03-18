<?php


namespace App\Service;


use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class GeoApi
{

    private $zip;
    private $city;
    /** * @var \Symfony\Contracts\HttpClient\HttpClientInterface */
    private $client;


    public function __construct(String $city, String $zip)
    {
        $this->city = $city;
        $this->zip = $zip;
        $this->client = HttpClient::create();
    }

    public function getCityCode()
    {
        $url = "https://geo.api.gouv.fr/communes?codePostal=$this->zip&nom=$this->city&fields=nom,code,codesPostaux,codeDepartement,codeRegion,population&format=json&geometry=centre";
        try {
            $response = $this->client->request('GET', $url);
            $data = \json_decode($response->getContent(), true);
            if (!empty($data)) {
                return $data[0]['code'];
            }
            return null;
        } catch (TransportExceptionInterface $e) {
            return null;
        }

    }
}