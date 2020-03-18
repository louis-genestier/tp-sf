<?php


namespace App\Service;


use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class EtablissementPublicApi
{

    private $code;
    /** * @var \Symfony\Contracts\HttpClient\HttpClientInterface */
    private $client;

    public function __construct(String $code)
    {
        $this->code = $code;
        $this->client = HttpClient::create();
    }

    public function getEtablissements()
    {
        $url = "https://etablissements-publics.api.gouv.fr/v3/communes/$this->code/pole_emploi";

        try {
            $response = $this->client->request('GET', $url);
            $data = \json_decode($response->getContent(), true)['features'];
            return $data;
        } catch (TransportExceptionInterface $e) {
            dump($e->getMessage());
        }
    }
}