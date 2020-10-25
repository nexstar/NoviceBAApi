<?php

namespace App\Service\Other;

class CurlService
{

    /**
     * @param $url
     * @return bool|string
     */
    public function Get($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    /**
     * @param $url
     * @param $array
     * @return bool|string
     */
    public function Post($url, $array)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($array));
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

}
