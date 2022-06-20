<?php 
    include_once('head.php');
    error_reporting(E_ALL ^ E_WARNING);
    $albumName = $_GET['album'];
    $artist = $_GET['artist'];
    if ($albumName != null && $artist != null):
        $albumInfo = $lastfm->getInfo(str_replace(' ','+', $artist), str_replace(' ', '+', $albumName));
    endif;
?>

<!-- Loads a different Album based on what was clicked from the collage page -->


<!DOCTYPE html>
<html lang="en">
    <head>
        <h2><a href="index.php?user=<?=$_GET["user"]?>">back</a></h2>
        <meta charset="UTF-8">
        <link rel="stylesheet" href='style.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $albumName ?> | <?= $artist ?></title>
    </head>
    <body style="background-color: #f8e3d8">
        <section>
            <?php if ($artist === null || $albumName === null): ?>
                <h3>album not found.</h3>
            <?php else: ?>
            <h3><?= $artist ?></h3>
            <h1><?= $albumName ?></h1>
            <?php endif; ?>
            <table style="float:left; font-size: 12pt; padding-left: 3.25%;">
                <tr>
                    <th># </th>
                    <th>Title </th> 
                    <th>Time </th>
                </tr>
            <?php foreach($albumInfo->album as $k=>$v):
                foreach($v->tracks as $f=>$g):
                    $i = 0; 
                    foreach($g->track as $y=>$u): $i++;
                        $time = "$u->duration"?>
                    <tr>
                        <td> <?= $i ?></td>
                        <td> <?= $u->name; ?></td>
                        <td> <?php if($time === 'userdata: NULL') {
                                        echo 'N/A';
                                    } else {
                                    echo gmdate("i:s", $time);
                            } ?></td>
                    </tr>
                <?php endforeach;
                  endforeach;
                endforeach; ?>
            </table>
        </section>
        <aside style="float: right;">
            <?php foreach($albumInfo->album as $k=>$v): ?>
                <img src="<?php echo $v->image[4]; ?>" alt="unable to load" style="right:50px; bottom:720px; border: 5px solid #000; float:right;">
                        <?php endforeach; ?>
            <?php foreach($albumInfo->album as $k=>$v):
                foreach($v->wiki as $f=>$g): 
                    $string = substr($g->summary, 0, strpos($g->summary, "<a"))?>
                    <p style="float: right;"><?= $string; ?></p>
            <?php endforeach;
            endforeach; ?>
        </aside>  
    </body>
</html>