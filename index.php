<?php
require_once('Youtube/Youtube.php');

$yt = new Youtube();  //Instantiate Youtube Object
$yt->key('{API_KEY}');  //Set Youtube API Key Here

//Set Youtube Search Parameters
$yt->set()->
        q('Search Query')->
        maxResults(10)->
        order('relevance')->
        safeSearch('none')->
        videoDuration('any')->
        videoEmbeddable('true')->
        regionCode("US");

//Now get the Title and VideoIDS
$num = count($yt->get()->id());  //Obtain number of results (taken from maxResults)
$ytIDArr = $yt->get()->id();  //Video ID array
$ytTitleArr = $yt->get()->title();  //Title array
for ($i = 0; $i < $num; $i++) {
    $ytID = $ytIDArr[$i];
    $ytTitle = $ytTitleArr[$i];

    //Your code here, for example, you can link to the youtube video results like so.  Ex:
    $link .= "<a href='http://www.youtube.com/watch?v=$ytID'>$ytTitle</a><br>";
}

$yt->clear();  //Clear query string, extremely important if iterating through multiple keywords!
?>
