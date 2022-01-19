<!DOCTYPE html>
<html lang="en">
    <title>LastFM</title>
    <script src='index.php'></script>
    <body>

      
        <?php
        require 'lastfm.php';
        $lastfm = new LastFM("092d316884d8385f35ad8b84f5f42ef8");
        $tracks = $lastfm->getRecentTracks('devonbarks');
        $top = $lastfm->getTopTracks('devonbarks');
        $topAlbums = $lastfm->getTopAlbums('devonbarks');
        //print_r($tracks);
        ?>

        <h1>Recently played songs</h1>
        <ol class="playlist">
            <?php foreach($tracks->track as $k=>$v): ?>
                <li>
                    <span class="name"><?php echo $v->name; ?></span>
                    <span>   ---    </span>
                    <span class="artist"><?php echo $v->artist; ?></span>
                </li>
            <?php endforeach; ?>
        </ol>


        <h1>Top Tracks:</h1>
        <ol class="top tracks">
            <?php foreach($tracks->track as $k=>$v): ?>
                <li>
                    <span class="artist"><?php echo $v->artist; ?></span>
                </li>
            <?php endforeach; ?>
        </ol>

        <table>
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Time Played</th>
            </tr>
            <?php foreach($tracks->track as $k=>$v): ?>
            <tr>
                <td><span class="title"><?php echo $v->name; ?></span></td>
                <td><span class="artist"><?php echo $v->artist; ?></span></td>
                <td><span class="date"><?php echo $v->date; ?></span></td>
            </tr>
            <?php endforeach; ?>
        </table>
        
    </body>
</html>