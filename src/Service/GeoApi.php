<?php


namespace App\Service;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GeoApi
{

    private $zip;
    private $city;


    public function __construct(String $city, String $zip)
    {
        $this->city = $city;
        $this->zip = $zip;
    }

    public function getCityCode()
    {
        $url = "https://geo.api.gouv.fr/communes?codePostal=$this->zip&nom=$this->city&fields=nom,code,codesPostaux,codeDepartement,codeRegion,population&format=json&geometry=centre";
        try {
            $data = [];

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
            $body !== '[]' ? $data = \json_decode($body, true)[0] : null;

            if (!empty($data) && $httpCode === "200") {
                return $data['code'];
            } elseif ($httpCode !== "200") {
                throw new \Exception('Problème lors de la recherche, veuillez réessayer dans quelques instant 😨');
            } else {
                throw new NotFoundHttpException('Aucune ville trouvée 😔');
            }
        } catch (\Exception $e) {
            throw $e;
        }

    }
}