Youtube API -v3

#Youtube API Documentation: https://developers.google.com/youtube/v3/docs/search/list

#Example Rest Query: https://www.googleapis.com/youtube/v3/search?part=id&maxResults=10&order=rating&q=zelda&safeSearch=none&type=video&videoDuration=long&videoEmbeddable=true&key={YOUR_API_KEY}

#Obtaining your Youtube API: https://cloud.google.com/console

-Notes
I've used the Zend library to query Youtube results, but it the library is convoluted, and written for version 2.  I created my own library specifically geared towards V3.  It's much easier to extend, and ALOT faster in retriving Titles and VideoIDS.

##########
How to use
##########

1.  Be sure to require Youtube.php: require_once('Youtube/Youtube.php');
2.  Instantiate your object: $yt = new Youtube();
3.  Set your Youtube API key: $yt->key('{API_KEY}');
4.  Set your Youtube search parameters:

$yt->set()->
        q('Search Query')->
        maxResults(10)->
        order('relevance')->
        safeSearch('none')->
        videoDuration('any')->
        videoEmbeddable('true')->
        regionCode("US");

5.  Get the Youtube Title and Youtube Video IDs as arrays:

$id = $yt->get()->id();
$title = $yt->get()->title();

If for example, you set maxResults = 10, you will retrieve an output of 10 ids and 10 titles in a feed.  $id and $title are arrays that hold this feed, and they can be iterated through in a for, or foreach loop.

6.  A shell example is provided in index.php

##################
Real Example Usage
##################

This script is used to power the video section part of www.gamebinder.com
Ex: http://www.gamebinder.com/12/assassins-creed/yt_walkthrough/