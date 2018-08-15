<?php

//if(!$_POST['page']) die("0");
$request = $_POST['page'];
$request2 = str_replace('#','',$request);
$request2 = str_replace('LANGUAGE','',$request2);

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




/* 
if (strpos($request, '') !== false) {
    echo '';
}
*/
?>
