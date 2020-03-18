<?php


namespace App\Service;

use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class EtablissementPublicApi
{

    private $code;

    public function __construct(String $code)
    {
        $this->code = $code;
    }

    public function getEtablissements()
    {
        $url = "https://etablissements-publics.api.gouv.fr/v3/communes/$this->code/pole_emploi";

        try {
            $ch = \curl_init();
            \curl_setopt($ch, CURLOPT_URL, $url);
            \curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = \curl_exec($ch);
            \curl_close($ch);
            $data = \json_decode($response, true)['features'];
            return $data;
        } catch (TransportExceptionInterface $e) {
            dump($e->getMessage());
        }
    }
}