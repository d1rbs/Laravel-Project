<?php


namespace App\services;


class CurlCreator
{
    public $link = '';

    public $method = 'POST';

    public $data = [];


    public function sendCurl()
    {

        $curl = curl_init();
        $curlOptions = [
            CURLOPT_URL => $this->link,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $this->method,
            CURLOPT_POSTFIELDS => json_encode($this->data),
            CURLOPT_HTTPHEADER => [
                "cache-control: no-cache",
                "content-type: application/json",
                "Access-Control-Allow-Origin: *"
            ],
            CURLOPT_SSL_VERIFYPEER => true
        ];

        curl_setopt_array($curl, $curlOptions);

        $exec = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        return ($err) ? false : json_decode($exec, true);


    }


}