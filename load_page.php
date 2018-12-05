<?php
if(!$_POST['page']) die("0"); //if not post die with error code 0
$request = $_POST['page'];
$request2 = str_replace('#','',$request);
$request2 = str_replace('LANGUAGE','',$request2);
$request2 = str_replace('SCREENSHOTS','',$request2);
$request2 = str_replace('RIPs','',$request2);
$request2 = str_replace('SUBs','https://www.yifysubtitles.com/movie-imdb/',$request2);

if (strpos($request, 'movies') !== false) {
$image_url = $request2;
$envc = file_get_contents($image_url);
$imageDataEncoded = base64_encode($envc);
echo '<img src="data:image/gif;base64,'.$imageDataEncoded.'" />';
}

if (strpos($request, 'LANGUAGE') !== false) {
    $re = '/<span title="Language" class="icon-volume-medium"><\/span> (.*?) <div><\/div>/m';
    $str = file_get_contents($request2);
    preg_match_all($re, $str, $matches);
    //Print_r($matches);
    $language_post_request_result = implode (",",$matches[0]);
    echo strip_tags($language_post_request_result);
}
if (strpos($request, 'SCREENSHOTS') !== false) {
    $screenshots_url_imdb = 'https://www.imdb.com/title/'.$request2.'/mediaindex';
    $str_ss = file_get_contents($screenshots_url_imdb);
    $re_ss = '/"\nsrc="(.*?)"\n\/><\/a>/m';
    preg_match_all($re_ss, $str_ss, $matches);
    $string1 = $matches[1];
    echo '<img height=100 width=100 src='.implode('/><img height=100 width=100 src=',$string1).'/>';
}
if (strpos($request, 'RIPs') !== false) {
    $re = '/<p class="hidden-xs hidden-sm">(.*?)<div class="bottom-info">/s'; 
    $str = file_get_contents($request2);
    preg_match_all($re, $str, $matches);
    //Print_r($matches);
    $language_post_request_result = implode (",",$matches[1]);
    echo strip_tags($language_post_request_result);
}
if (strpos($request, 'SUBs') !== false) {
    $re = '/<div class="table-responsive">(.*?)<\/table><\/div>/m';
    $str = file_get_contents($request2);
    $countSub = preg_match_all($re, $str, $matches);
    $subtitles = str_replace('href="','href="https://www.yifysubtitles.com/',$matches[0][0]);
    $subtitles = str_replace('<th>uploader</th>','',$subtitles);
    $subtitles1 = str_replace('<th>other</th>','',$subtitles);
    $subtitles1 = str_replace('<th>download</th>','',$subtitles1);
    $subtitles1 = str_replace('"><span class="text-muted">','.zip"><span class="text-muted">',$subtitles1);
    $subtitles1 = str_replace('/subtitles/','subtitle/',$subtitles1);
    $re02 = '/<td class="other-cell"><\/td>(.*?)download<\/a><\/td>/s';
    $subtitles1 = preg_replace($re02, '', $subtitles1);
    if ($countSub>=1) {echo $subtitles1;} else { echo "No Subtitles found please search on Google"; }
    
}
/* 
if (strpos($request, '') !== false) {
    echo '';
}
$genres1[] = implode(",",$movie->genres);
*/
?>
