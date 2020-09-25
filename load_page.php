<?php
if (isset($_POST['page'])) { 
$request = $_POST['page'];
$request2 = str_replace('#','',$request);
$request2 = str_replace('LANGUAGE','',$request2);
$request2 = str_replace('SCREENSHOTS','',$request2);
$request2 = str_replace('RIPs','',$request2);
$request2 = str_replace('SUBs','https://www.yifysubtitles.org/movie-imdb/',$request2);
$request2 = str_replace('ytlikes','',$request2);

if (strpos($request, 'medium-cover') !== false) {
$image_url = $request2;
$arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
            ),
        );
$envc = @file_get_contents($image_url, true, stream_context_create($arrContextOptions));
$imageDataEncoded = base64_encode($envc);
//echo '<img src="data:image/gif;base64,'.$imageDataEncoded.'" />';
$value = str_replace("medium-cover","large-cover",$image_url);
echo '<a href="load_page.php?images='.$value.'" data-lightbox="'.rand(100,100000).'" ><img src="data:image/gif;base64,'.$imageDataEncoded.'" /></a>';
}

if (strpos($request, 'LANGUAGE') !== false) {
    $re = '/<span title="Language" class="icon-volume-medium"><\/span> (.*?) <div><\/div>/m';
    $str = @file_get_contents($request2, true);
    if ($str === false) { die("Language: Something went wrong! try again after some time."); }
    preg_match_all($re, $str, $matches);
    //Print_r($matches);
    $language_post_request_result = implode (",",$matches[0]);
    echo strip_tags($language_post_request_result);
}
if (strpos($request, 'SCREENSHOTS') !== false) {
    $screenshots_url_imdb = 'https://www.imdb.com/title/'.$request2.'/mediaindex';
    $str_ss = @file_get_contents($screenshots_url_imdb, true);
    if ($str_ss === false) { die("Screenshots: Something went wrong! try again after some time."); }
    $re_ss = '/"\nsrc="(.*?)"\n\/><\/a>/m';     /* find thumbnails */
    $re_links_ss = '/"contentUrl": "(.*?)"/s';  /*  real image link behind thumbnails */
    preg_match_all($re_ss, $str_ss, $matches);
    preg_match_all($re_links_ss, $str_ss, $matches_links);
    $string_ss = $matches[1]; 
    $string_link = $matches_links[1];
    foreach( $string_link as $index => $value ) {
                                                    echo '<a href="'.$value.'" data-lightbox="'.$request2.'" ><img  src='.$string_ss[$index].' /></a>';
                                                 }
}
if (strpos($request, 'RIPs') !== false) {
    $re = '/<p class="hidden-xs hidden-sm">(.*?)<div class="bottom-info">/s'; 
    $str = @file_get_contents($request2, true);
    if ($str === false) { die("Rips: Something went wrong! try again after some time."); }
    preg_match_all($re, $str, $matches);
    //Print_r($matches);
    $language_post_request_result = implode (",",$matches[1]);
    echo strip_tags($language_post_request_result);
}
if (strpos($request, 'SUBs') !== false) {
    $re = '/<div class="table-responsive">(.*?)<\/table>\s+<\/div>/ms';
    $str = @file_get_contents($request2, true);
    if ($str === false) { die("Subs: Something went wrong! try again after some time."); }
    $countSub = preg_match_all($re, $str, $matches);
    if($countSub >=1){        $subtitles = str_replace('href="','href="https://www.yifysubtitles.org/',$matches[0][0]); } else {    $subtitles = ""; }
    $subtitles = str_replace('<th>uploader</th>','',$subtitles);
    $subtitles1 = str_replace('<th>other</th>','',$subtitles);
    $subtitles1 = str_replace('<th>download</th>','',$subtitles1);
    $subtitles1 = str_replace('<td class="uploader-cell"><a','<td class="uploader-cell"><aa',$subtitles1);
    $subtitles1 = str_replace('"><span class="text-muted">','.zip"><span class="text-muted">',$subtitles1);
    $subtitles1 = str_replace('/subtitles/','subtitle/',$subtitles1);
    $re02 = '/<td class="other-cell"><\/td>(.*?)download<\/a><\/td>/s';
    $subtitles1 = preg_replace($re02, '', $subtitles1);
    if ($countSub>=1) {echo $subtitles1;} else { echo "No Subtitles found please search on Google"; }   
}
if (strpos($request, 'ytlikes') !== false) {
    $url = "https://www.youtube.com/watch?v=".$request2;
    $options = array(   'http'=>array(    'method'=>"GET", 'header'=>"Accept-language: en\r\n" ) );
    $context = stream_context_create($options);
    $raw = @file_get_contents($url, false, $context);
    $re_views = '/"viewCount":{"simpleText":"(.*?) views"}/ms';
    $re_likes = '/"like this video along with(.*?)other/m';
    $re_dislikes = '/"dislike this video along with(.*?)other/m';
    $count_views = preg_match_all($re_views, $raw, $matches_views);
    preg_match_all($re_likes, $raw, $matches_likes);
    preg_match_all($re_dislikes, $raw, $matches_dislikes);
    if ($count_views>=1 && @$matches_likes[1][0] !=''){ $data = 'Y-Tube: Views='.$matches_views[1][0].':: Likes &#128077= '.$matches_likes[1][0].'::Dislikes &#128078= '.$matches_dislikes[1][0];
        echo '<p>'.$data.'</p><div id="'.$request2.'1" class="snackbar">'.$data.'</div>'; }
    elseif ($count_views>=1){ $data = 'Y-Tube: Views='.$matches_views[1][0].':: Likes &#128077= HIDDEN ::Dislikes &#128078= HIDDEN';
        echo '<p>'.$data.'</p><div id="'.$request2.'1" class="snackbar">'.$data.'</div>'; }
    else { $data="Something went wrong"; echo '<p>'.$data.'</p><div id="'.$request2.'1" class="snackbar">'.$data.'</div>'; }
}
}
elseif(isset($_GET['images'])) { 
    header("Content-type: image/jpeg");
    $url = rawurldecode($_GET['images']);
    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
            ),
        );  
    $str = @file_get_contents($url, true, stream_context_create($arrContextOptions));
    echo $str;
}

else{ die("Something went wrong! which we can't fix."); }
/* 
if (strpos($request, '') !== false) {
    echo '';
}
$genres1[] = implode(",",$movie->genres);
*/
?>
