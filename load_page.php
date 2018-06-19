<?php

if(!$_POST['page']) die("0");
//$page = (int)$_POST['page'];
$image_url = $_POST['page'];
$image_url = str_replace('#','',$image_url);
//$image_url = str_replace('?pageContent2','',$image_url);

//$image_url= 'https://yts.am/assets/images/movies/'.$_POST['page'].'medium-cover.jpg';
//if (file_exists('pages/page_'.$page.'.html')) {

$envc = file_get_contents($image_url);
$imageDataEncoded = base64_encode($envc);

echo '<img src="data:image/gif;base64,'.$imageDataEncoded.'" />';

//}
//else echo 'There is no such page!';
?>
