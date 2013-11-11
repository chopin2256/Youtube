Youtube API -v3

Youtube API Documentation: https://developers.google.com/youtube/v3/docs/search/list
Example Rest Query: https://www.googleapis.com/youtube/v3/search?part=id&maxResults=10&order=rating&q=zelda&safeSearch=none&type=video&videoDuration=long&videoEmbeddable=true&key={YOUR_API_KEY}
Obtaining your Youtube API: https://cloud.google.com/console

I've used the Zend library to query Youtube results, but it the library is convoluted, and written for version 2.  I created my own library specifically geared towards V3.  It's much easier to extend, and ALOT faster in retriving Titles and VideoIDS.