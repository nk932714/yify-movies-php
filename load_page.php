<?php
if(!$_POST['page']) die("0"); //if not post die with error code 0
$request = $_POST['page'];
$request2 = str_replace('#','',$request);
$request2 = str_replace('LANGUAGE','',$request2);
$request2 = str_replace('SCREENSHOTS','',$request2);

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



/* 
if (strpos($request, '') !== false) {
    echo '';
}
$genres1[] = implode(",",$movie->genres);
*/
?>
