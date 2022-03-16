<!DOCTYPE html>
<html lang="en">
    <title>LastFM</title>
    <script src='index.php'></script>
    <body>
        <h3><a href="/directory.php">back</a></h3>
        <?php
        require 'lastfm.php';
        $lastfm = new LastFM("092d316884d8385f35ad8b84f5f42ef8");
        //$tracks = $lastfm->getRecentTracks('devonbarks');
        //$topTracks = $lastfm->getTopTracks('devonbarks');
        //$topAlbums = $lastfm->getTopAlbums('devonbarks');
        //$topFriends = $lastfm->getFriends('devonbarks');
        //$allArtists = $lastfm->getArtists('devonbarks');
        //$albumInfo = $lastfm->getInfo('Cher', 'Believe');
        //print_r($albumInfo);
        ?>
    </body>
</html>