<?php


namespace App\Service;


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
            $ch = \curl_init();
            \curl_setopt($ch, CURLOPT_URL, $url);
            \curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = \curl_exec($ch);
            \curl_close($ch);
            $data = \json_decode($response, true)[0];
            if (!empty($data)) {
                return $data['code'];
            }
            return null;
        } catch (\Exception $e) {
            return null;
        }

    }
}