#Youtube API -v3
####Notes
I've used the Zend library to query Youtube results, but the library is convoluted, difficult to extend, and written for version 2.  I created my own library specifically geared towards V3.  It's much easier to extend, and ALOT faster and less expensive in retriving Titles and VideoIDS.  This is for two reasons.  I am using version 3, and I also make use of static variables.  Thus, there is no need to continuously call the API on every "get" function until the "clear" function is called.

####References
* [Youtube API Documentation] (https://developers.google.com/youtube/v3/docs/search/list)
* [Example Rest Query] (https://www.googleapis.com/youtube/v3/search?part=id&maxResults=10&order=rating&q=zelda&safeSearch=none&type=video&videoDuration=long&videoEmbeddable=true&key={YOUR_API_KEY})
* [Obtaining your Youtube API] (https://cloud.google.com/console)

####How To Use
*  Be sure to require Youtube.php: `require_once('Youtube/Youtube.php');`
*  Instantiate your object: `$yt = new Youtube();`
*  Set your Youtube API key: `$yt->key('{API_KEY}');`
*  Set your Youtube search parameters:

```php
$yt->set()->
        q('Search Query')->
        maxResults(10)->
        order('relevance')->
        safeSearch('none')->
        videoDuration('any')->
        videoEmbeddable('true')->
        regionCode("US");
```

*  Get the Youtube Title and Youtube Video IDs as arrays:

```php
$id = $yt->get()->id();
$title = $yt->get()->title();
```

If for example, you set maxResults = 10, you will retrieve an output of 10 ids and 10 titles in a feed.  `$id` and `$title` are arrays that hold this feed, and they can be iterated through in a for loop.

*  Be sure you call the clear function after you are done retrieving results: `$yt->clear();`
*  A shell example is provided in `index.php`

####Real Example Usage
*  This script is used to power the video section part of [Game Binder] (http://www.gamebinder.com/)
*  Link to [Assassin's Creed Walkthrough] (http://www.gamebinder.com/game/12/assassins-creed/yt_walkthrough/)