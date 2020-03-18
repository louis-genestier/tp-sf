<?php


namespace App\Service;


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
            \curl_setopt($ch, CURLOPT_HEADER, 1);
            \curl_setopt($ch, CURLOPT_VERBOSE, 1);
            $response = \curl_exec($ch);
            \curl_close($ch);

            if (!$response) throw new \Exception('Problème lors de la recherche, veuillez réessayer dans quelques instant 😨');

            list($header, $body) = explode("\r\n\r\n", $response, 2);
            $httpCode = explode(' ', $header)[1];

            $body !== '[]' ? $data = \json_decode($body, true)['features'] : null;
            if (!empty($data) && $httpCode === "200") {
                return $data;
            } elseif ($httpCode !== "200") {
                throw new \Exception('Problème lors de la recherche, veuillez réessayer dans quelques instant 😨');
            } else {
                throw new \Exception('Aucune infrastructure');
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
}