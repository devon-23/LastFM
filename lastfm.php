<?php
class LastFM {

    public $apikey;

    function __construct($api) {
        $this->apiKey = $api;
    }

    function getRecentTracks($user) {
        $curl = curl_init("http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=$user&api_key=$this->apiKey&limit=25");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        $data = curl_exec($curl);
        curl_close($curl);
        $xml = new SimpleXMLElement($data);
        return $xml->recenttracks;
    }

    function getTopTracks($user) {
        $curl = curl_init("http://ws.audioscrobbler.com/2.0/?method=user.gettoptracks&user=$user&api_key=$this->apiKey");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        $data = curl_exec($curl);
        curl_close($curl);
        $sml = new SimpleXMLElement($data);
        //print_r($xml);
        return $sml->toptracks;
    }

    function getTopAlbums($user) {
        $curl = curl_init("http://ws.audioscrobbler.com/2.0/?method=user.gettopalbums&user=$user&api_key=$this->apiKey");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        $data = curl_exec($curl);
        curl_close($curl);
        $sml = new SimpleXMLElement($data);
        //print_r($zml);
        return $sml->topalbums;
    }

    function getFriends($user) {
        $curl = curl_init("http://ws.audioscrobbler.com/2.0/?method=user.getfriends&user=$user&api_key=$this->apiKey");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        $data = curl_exec($curl);
        curl_close($curl);
        $dml = new SimpleXMLElement($data);
        //print_r($zml);
        return $dml->friends;
    }

    function getArtists($user) {
        $curl = curl_init("http://ws.audioscrobbler.com/2.0/?method=library.getartists&api_key=$this->apiKey&user=$user&limit=1500");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        $data = curl_exec($curl);
        curl_close($curl);
        $rml = new SimpleXMLElement($data);
        //print_r($zml);
        return $rml->artists;
    }

    function getUnique($artist) {
        $curl = curl_init("http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist=$artist&api_key=$this->apiKey");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        $data = curl_exec($curl);
        curl_close($curl);
        $iml = new SimpleXMLElement($data);
        //print_r($data);
        return $iml; 
    }

    function getInfo($artist, $album) {
        $curl = curl_init("http://ws.audioscrobbler.com/2.0/?method=album.getinfo&api_key=$this->apiKey&artist=$artist&album=$album");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        $data = curl_exec($curl);
        curl_close($curl);
        $pml = new SimpleXMLElement($data);
        //print_r($data);
        return $pml;
    }

    function getTrackInfo($artist, $track) {
        $curl = curl_init("http://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key=$this->apiKey&artist=$artist&track=$track&user=devonbarks");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        $data = curl_exec($curl);
        curl_close($curl);
        $lml = new SimpleXMLElement($data);
        //print_r($data);
        return $lml;
    }

    function getArtistInfo($artist) {
        $curl = curl_init("http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist=$artist&api_key=$this->apiKey");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        $data = curl_exec($curl);
        curl_close($curl);
        $hml = new SimpleXMLElement($data);
        //print_r($data);
        return $hml;
    }

    function getWeeklyAlbums() {
        $curl = curl_init("http://ws.audioscrobbler.com/2.0/?method=user.getweeklyalbumchart&user=devonbarks&api_key=$this->apiKey&limit=5");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        $data = curl_exec($curl);
        curl_close($curl);
        $gml = new SimpleXMLElement($data);
        //print_r($data);
        return $gml;
    }

    function getWeeklyArtists() {
        $curl = curl_init("http://ws.audioscrobbler.com/2.0/?method=user.getweeklyartistchart&user=devonbarks&api_key=$this->apiKey&limit=5");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        $data = curl_exec($curl);
        curl_close($curl);
        $fml = new SimpleXMLElement($data);
        //print_r($data);
        return $fml;
    }

    function getWeeklyTracks() {
        $curl = curl_init("http://ws.audioscrobbler.com/2.0/?method=user.getweeklytrackchart&user=devonbarks&api_key=$this->apiKey&limit=5");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        $data = curl_exec($curl);
        curl_close($curl);
        $dml = new SimpleXMLElement($data);
        //print_r($data);
        return $dml;
    }
}