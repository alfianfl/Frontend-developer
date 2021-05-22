<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mycurl {

    public function delete($url, $arrayHeader)
    {
        $ch = curl_init();

        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_FAILONERROR => true,
            CURLOPT_HTTPHEADER => $arrayHeader
        ));

        $result = curl_exec($ch);

        curl_close($ch);

        return json_decode($result, true);
    }

    public function put($url, $data, $arrayHeader)
    {
        $ch = curl_init();

        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => $arrayHeader
        ));

        $result = curl_exec($ch);

        curl_close($ch);

        return json_decode($result, true);
    }

    public function post($url, $data, $arrayHeader)
    {
        $ch = curl_init();

        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => $arrayHeader
        ));

        $result = curl_exec($ch);

        curl_close($ch);

        return json_decode($result, true);
    }

    public function get($url, $arrayHeader)
    {
        $ch = curl_init();

        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_TIMEOUT => 60,
            CURLOPT_HTTPHEADER => $arrayHeader
        ));

        $result = curl_exec($ch);

        curl_close($ch);

        return json_decode($result, true);
    }
}