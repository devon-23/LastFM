<!DOCTYPE html>
<html lang="en">
    <title>LastFM</title>
    <script src='index.php'></script>
    <body>
    
    <h3><a href="/ETC/Coding/LastFM/directory.php">back</a></h3>
        <?php
        require 'lastfm.php';
        $lastfm = new LastFM("092d316884d8385f35ad8b84f5f42ef8");
        $tracks = $lastfm->getRecentTracks('devonbarks');
        $topTracks = $lastfm->getTopTracks('devonbarks');
        //print_r($tracks);
        ?>

    </body>

</html>