<?php
    require 'lastfm.php';
    $user = $_GET["user"];
    if ($_GET["user"] == NULL) {
        $user = 'devonbarks';
    }

    $lastfm = new LastFM("092d316884d8385f35ad8b84f5f42ef8");
    $topArtists = $lastfm->getTopArtists($user);
    $topTracks = $lastfm->getTopTracks($user);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
        <title>Document</title>
    </head>
    <body>
        <div class="container">
            <canvas id="artists" height="40vh" width="80vw"></canvas>
        </div>

        <div class="container">
            <canvas id="tracks" height="40vh" width="80vw"></canvas>
        </div>

        <script id="top-artist">
            let artists = document.getElementById('artists').getContext('2d');

            let topArtists = new Chart(artists, {
                type: 'bar',
                data: {
                    labels: [
                        <?php foreach ($topArtists->artist as $k=>$v): ?>
                        '<?= $v->name ?>',
                        <?php endforeach; ?>
                    ],
                    datasets: [{
                        label: 'Top 10 Artists',
                        data: [
                            <?php foreach ($topArtists->artist as $k=>$v): ?>
                            '<?= $v->playcount ?>',
                            <?php endforeach; ?>
                        ],
                        backgroundColor: [
                            '#4e79a7',
                            '#59a14f',
                            '#9c755f',
                            '#f28e2b',
                            '#edc958',
                            '#bab0ac',
                            '#e15759',
                            '#b07aa1',
                            '#76b7b2',
                            '#ff9da7'
                        ]
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Top 10 Played Artists',
                        fontSize: 25
                    },
                    legend: {
                        display: true,
                        position: 'right'
                    }
                }
            })
        </script>

        <script id="top-artist2">
            let tracks = document.getElementById('tracks').getContext('2d');

            let topTracks = new Chart(tracks, {
                type: 'doughnut',
                data: {
                    labels: [
                        <?php foreach ($topTracks->track as $k=>$v): ?>
                        "<?= $v->name ?>",
                        <?php endforeach; ?>
                    ],
                    datasets: [{
                        label: 'Top 10 Artists',
                        data: [
                            <?php foreach ($topTracks->track as $k=>$v): ?>
                            '<?= $v->playcount ?>',
                            <?php endforeach; ?>
                        ],
                        backgroundColor: [
                            '#4e79a7',
                            '#59a14f',
                            '#9c755f',
                            '#f28e2b',
                            '#edc958',
                            '#bab0ac',
                            '#e15759',
                            '#b07aa1',
                            '#76b7b2',
                            '#ff9da7'
                        ]
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Top 10 Played Songs',
                        fontSize: 25
                    },
                    legend: {
                        display: true,
                        position: 'right'
                    }
                }
            })
        </script>

        <script id="top-songs">
            let songs = document.getElementById('songs').getContext('2d');

            let topSongs = new Chart(songs, {
                type: 'pie',
                data: {
                    labels: [
                        <?php foreach ($topTracks->track as $k=>$v): ?>
                        '<?= $v->name ?>',
                        <?php endforeach; ?>
                    ],
                    datasets: [{
                        label: 'Top 10 Artists',
                        data: [
                            <?php foreach ($topTracks->track as $k=>$v): ?>
                            '<?= $v->playcount ?>',
                            <?php endforeach; ?>
                        ],
                        backgroundColor: [
                            '#4e79a7',
                            '#59a14f',
                            '#9c755f',
                            '#f28e2b',
                            '#edc958',
                            '#bab0ac',
                            '#e15759',
                            '#b07aa1',
                            '#76b7b2',
                            '#ff9da7'
                        ]
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Top 10 Played Artists',
                        fontSize: 25
                    },
                    legend: {
                        display: true,
                        position: 'right'
                    }
                }
            })
        </script>
    </body>
</html>