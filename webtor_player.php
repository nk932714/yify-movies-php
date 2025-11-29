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
    
    <script src="https://cdn.jsdelivr.net/npm/@webtor/embed-sdk-js/dist/index.min.js" charset="utf-8" async></script>
</head>
<body>
<video crossorigin="anonymous" src='<?php echo $magnet_uri; ?>&dn=Sintel&tr=udp%3A%2F%2Fexplodie.org%3A6969&tr=udp%3A%2F%2Ftracker.coppersurfer.tk%3A6969&tr=udp%3A%2F%2Ftracker.empire-js.us%3A1337&tr=udp%3A%2F%2Ftracker.leechers-paradise.org%3A6969&tr=udp%3A%2F%2Ftracker.opentrackr.org%3A1337&tr=wss%3A%2F%2Ftracker.btorrent.xyz&tr=wss%3A%2F%2Ftracker.fastcast.nz&tr=wss%3A%2F%2Ftracker.openwebtorrent.com&ws=https%3A%2F%2Fwebtorrent.io%2Ftorrents%2F' controls data-config='{"baseUrl": "https://webtor.io"}' poster="<?php $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http"; $host = $_SERVER['HTTP_HOST']; $current_url = $_SERVER['REQUEST_URI']; $base_url = strtok($current_url, '?'); $full_url = $protocol . '://' . $host . dirname($base_url) . '/';  echo $full_url; echo $images_uri; ?>" crossorigin="anonymous"></video>
    <script src="https://cdn.jsdelivr.net/npm/@webtor/embed-sdk-js/dist/index.min.js" charset="utf-8" async></script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9a61a1d1ebe07ea9',t:'MTc2NDQxNDM0OQ=='};var a=document.createElement('script');a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"647b13b578d2407caf0637f0e11ad6a2","server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>

</body>
</html>
