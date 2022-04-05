<?php 
    include_once('head.php');
    error_reporting(E_ALL ^ E_WARNING);
    $artist = $_GET['artist'];
    if ($artist != null):
        $artistInfo = $lastfm->getArtistInfo(str_replace(' ','+', $artist));
    endif;
?>

<!-- Loads a different artist based on what was clicked from the index page -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href='style.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $artist ?></title>
    </head>
    <body style="background-color: #f8e3d8">
    <section>
        <?php if ($artist === null): ?>
                <h3>artist not found.</h3>
        <?php else: ?>
            <h3><?= $artist ?></h3>
        <?php endif; ?>
        
    </section>
    <aside style="float: right;">
        <?php foreach($artistInfo->artist as $k=>$v): ?>
                    <img src="<?php echo $v->image[3]; ?>" alt="unable to load" style="right:50px; bottom:720px; border: 5px solid #000; float:right;">
            <?php endforeach; ?>
        <?php foreach($artistInfo->artist as $k=>$v):
            foreach($v->bio as $f=>$g): 
                $string = substr($g->summary, 0, strpos($g->summary, "<a"))?>
                <p style="float: right;"><?= $string; ?></p>
        <?php endforeach;
            endforeach; ?>
    </aside>
        
    </body>
</html>