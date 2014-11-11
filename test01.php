<?php

function callInstagram($url)
    {
    $ch = curl_init();
    curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => 2
    ));

    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
    }

    $tag = 'sancocho';
    $client_id = "31f2ea34caf44bfc98ad94b493200e10";
    $url = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?client_id='.$client_id;

    $inst_stream = callInstagram($url);
    $results = json_decode($inst_stream, true);

    //Now parse through the $results array to display your results... 
    $i = 1;
    foreach($results['data'] as $item){
        $image_link = $item['images']['low_resolution']['url'];
        //echo '<img src="'.$image_link.'" />';
        echo $item['id'].' - <br /> <img src="'.$image_link.'" />';
        //echo '<pre>'; print_r($item); echo '</pre>';
        $i++;
    }

?>    