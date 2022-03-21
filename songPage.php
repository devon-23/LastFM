<?php 
    include_once('head.php');
    error_reporting(E_ALL ^ E_WARNING);
    $track = $_GET['track'];
    $artist = $_GET['artist'];
    if ($track != null && $artist != null):
        $trackInfo = $lastfm->getTrackInfo(str_replace(' ','+', $artist), str_replace(' ', '+', $track));
    endif;
?>

<!-- Loads a different song based on what was clicked from the index page -->


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href='style.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $track ?> | <?= $artist ?></title>
    </head>
    <body style="background-color: #f8e3d8">
    <section>
        <?php if ($artist === null || $track === null): ?>
                <h3>song not found.</h3>
        <?php else: ?>
            <h3><?= $artist ?></h3>
            <h1><?= $track ?></h1>
        <?php endif; ?>
        
    </section>
    <aside style="float: right;">
        <?php foreach($trackInfo->track as $k=>$v): 
                foreach($v->album as $f=>$g):?>
                    <img src="<?php echo $g->image[3]; ?>" alt="unable to load" style="right:50px; bottom:720px; border: 5px solid #000; float:right;">
            <?php endforeach; 
        endforeach;?>
        <?php foreach($trackInfo->track as $k=>$v):
            foreach($v->wiki as $f=>$g): 
                $string = substr($g->summary, 0, strpos($g->summary, "<a"))?>
                <p style="float: right;"><?= $string; ?></p>
        <?php endforeach;
            endforeach; ?>
    </aside>
        
    </body>
</html>