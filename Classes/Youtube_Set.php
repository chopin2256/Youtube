<?php

require_once("Youtube_Base.php");

class Youtube_Set extends Youtube_Base {
    
    /**
     * 
     * @Desc The q parameter specifies the query term to search for.
     */    
    public function q($value){
        parent::_buildQuery(__FUNCTION__, $value);
        return $this;
    }
    
    /**
     * 
     * @Desc The maxResults parameter specifies the maximum number of items that should be returned in the result set. Acceptable values are 0 to 50, inclusive. The default value is 5.
     * @values 0 - 50
     */
    public function maxResults($value){
        parent::_buildQuery(__FUNCTION__, $value);
        return $this;
    }        
    
    /**
     * 
     * @Desc The order parameter specifies the method that will be used to order resources in the API response. The default value is SEARCH_SORT_RELEVANCE.
     * @values date, rating, relevance, title, videoCount, viewCount
     */
    public function order($value){
         parent::_buildQuery(__FUNCTION__, $value);
         return $this;
    }
    
    /**
     * 
     * @Desc The regionCode parameter instructs the API to return search results for the specified country. The parameter value is an ISO 3166-1 alpha-2 country code.
     * @values US, CA, etc
     */
    public function regionCode($value){
        parent::_buildQuery(__FUNCTION__, $value);
         return $this;
    }
    /**
     * 
     * @Desc The safeSearch parameter indicates whether the search results should include restricted content as well as standard content.
     * @values moderate, none, strict
     */
    public function safeSearch($value){
        parent::_buildQuery(__FUNCTION__, $value);
        return $this;
    }
    
    /**
     * 
     * @Desc The videoDuration parameter filters video search results based on their duration.
     * @values any, long, medium, short
     */
    public function videoDuration($value){
         parent::_buildQuery(__FUNCTION__, $value);
         return $this;
    }
    
    /**
     * 
     * @Desc The videoEmbeddable parameter lets you to restrict a search to only videos that can be embedded into a webpage. If set to 'true', type must be set to 'video'
     * @values any, true
     */
    public function videoEmbeddable($value){
         parent::_buildQuery(__FUNCTION__, $value);
         return $this;
    }
    
    /**
     * 
     * @Desc The videoDefinition parameter lets you restrict a search to only include either high definition (HD) or standard definition (SD) videos. HD videos are available for playback in at least 720p, though higher resolutions, like 1080p, might also be available.
     * @values any, high, standard
     */
    public function videoDefinition($value){
         parent::_buildQuery(__FUNCTION__, $value);
         return $this;
    }
        
}