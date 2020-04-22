<?php
            if (isset($_GET['magnet_uri']) && !empty($_GET['magnet_uri'])) { $magnet_uri = $_GET["magnet_uri"]; $images_uri = $_GET["images_uri"];  $images_uri = 'load_page.php?images='.$images_uri; }
            else { //die($magnet_uri_placeolder);	 
            
            $style = '  <style>
                        @import url("https://fonts.googleapis.com/css?family=Quicksand&display=swap");
                        .background{
                        position:absolute;
                        top:0;
                        bottom:0;
                        left:0;
                        right:0;
                        background-color:#1e88e5;
                        text-align:center;
                        font-family: "Quicksand", sans-serif;
                        color:white;
                        }
                        
                        .inputText{
                        width:80%;
                        margin:20px;
                        padding:10px;
                        border:0px;
                        background-color:white;
                        color: #1e88e5;
                        border-radius:5px;
                        font-size:32px;
                        }
                        
                        .submitbox{
                        width:10%;
                        margin:20px;
                        padding:10px;
                        border:0px;
                        background-color:white;
                        color: #1e88e5;
                        border-radius:5px;
                        font-size:32px;
                        }
                        
                        .inputText:focus{
                        outline:none;
                        box-shadow: none;
                        }
                        
                        ::placeholder{
                        font-weight: italic;
                        color:crimson;
                        }
                        .inputText:hover{
                        /*   box-shadow: 0px 0px 2px 2px gainsboro; */
                        cursor:pointer;
                        }
                        </style>';
            
            $html = '<div class="background">
                    <h1>Magnet Player</h1>
                    <small>Using webtor</small>
                    <!--  Input tag  -->
                    <br>
                    <form action="?">
                    <input type="text" class="inputText" id="magnet_uri" name="magnet_uri" placeholder="Enter Magnet Link"><br>
                    <input type="submit" class="submitbox" value="Play">
                    </form>
                     <h4>@2020</h4>
                     </div>';
                    die($style.$html);
            }

                        ?>
<!doctype html>
<html>
<head>
    <title>Yify Player</title>
    <style>
        #player {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-right: -50%;
            transform: translate(-50%, -50%);
        }
        body {
            position: relative;
            height: 100vh;
            background-color: gray;
        }
    </style>
</head>
<body>
    <div id="player" class="webtor" />
    <script>
        window.webtor = window.webtor || [];
        window.webtor.push({
            id: 'player',
            magnet: '<?php echo $magnet_uri; ?>&dn=Player&tr=udp%3A%2F%2Fexplodie.org%3A6969&tr=udp%3A%2F%2Ftracker.coppersurfer.tk%3A6969&tr=udp%3A%2F%2Ftracker.empire-js.us%3A1337&tr=udp%3A%2F%2Ftracker.leechers-paradise.org%3A6969&tr=udp%3A%2F%2Ftracker.opentrackr.org%3A1337&tr=wss%3A%2F%2Ftracker.btorrent.xyz&tr=wss%3A%2F%2Ftracker.fastcast.nz&tr=wss%3A%2F%2Ftracker.openwebtorrent.com&ws=https%3A%2F%2Fwebtorrent.io%2Ftorrents%2F',
            on: function(e) {
                if (e.name == window.webtor.TORRENT_FETCHED) {
                    console.log('Torrent fetched!')
                }
                if (e.name == window.webtor.TORRENT_ERROR) {
                    console.log('Torrent error!')
                }
            },
             poster: '<?php echo $images_uri; ?>',
            // subtitles: [
            //     {
            //         srclang: 'en',
            //         label: 'test',
            //         src: 'https://raw.githubusercontent.com/andreyvit/subtitle-tools/master/sample.srt',
            //      }
            // ],
        });
    </script>
    <script src="webtor_min.js" charset="utf-8"></script>
</body>
</html>
