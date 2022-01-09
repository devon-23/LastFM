<?php
class LastFM {

    public $apikey;

    function __construct($api) {
        $this->apiKey = $api;
    }

    function getRecentTracks($user) {
        $curl = curl_init("http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=$user&api_key=$this->apiKey");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        $data = curl_exec($curl);
        curl_close($curl);
        $xml = new SimpleXMLElement($data);
        return $xml->recenttracks;
    }

    function getFriends($user) {
        $curl = curl_init("http://ws.audioscrobbler.com/2.0/?method=user.getfriends&user=$user&api_key=$this->apiKey");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        $data = curl_exec($curl);
        curl_close($curl);
        $xml = new SimpleXMLElement($data);
        //print_r($xml);
        return $xml->friends;
    }
}