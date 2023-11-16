<?php

namespace MessengerOS\MessengerOS\Service;

class ApiService
{
    public function send($url, $data)
    {
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_SSL_VERIFYPEER => false
        ));

        $result = curl_exec ($ch);

        curl_close ($ch);

        return json_decode($result, true);
    }
}