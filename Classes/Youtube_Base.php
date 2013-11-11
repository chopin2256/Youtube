<?php

abstract class Youtube_Base {

    /**
     *
     * @Desc Youtube cur "GET" method 
     */
    private $_curlGET = "GET";

    /**
     *
     * @Desc counter to ensure _getArrayData is only run once during "get" actions.  This saves on API hits.
     */
    static protected $_counter = 0;

    /**
     *
     * @var string Set your url here 
     */
    private $_url = "https://www.googleapis.com/youtube/v3/search?part=snippet&type=video";

    /**
     *
     * @Desc Hold the API key in a separate variable, so that when we purge a _queryString, the API key will preserve
     */
    static private $_queryKey;

    /**
     *
     * @var string Query string that gets passed into curl. Must be static, in order to retain value throughout duration of script
     */
    static protected $_queryString;

    /**
     *
     * @Desc Youtube json converted array, saved until string has been purged
     * @var array 
     */
    static protected $_arrayData;

    /**
     * 
     * @Desc Pieces the query together to form the complete string
     * @param string $functionName The name of the function
     * @param string,int $value The Youtube query
     */
    protected function _buildQuery($functionName, $value) {
        $value = urlencode($value);  //encode string
        $this->_builtQuery("&$functionName=$value", $functionName);
    }

    /**
     * 
     * @Desc The finalized query that sets _queryString, which then gets passed into Curl
     * @param string $string
     */
    private function _builtQuery($string, $functionName) {
        if ($functionName == "key") { //If we are storing the API key in the string, separate value into $_queryKey in order to preserve this value when we purge the $_queryString
            self::$_queryKey = $string;
        } else {
            self::$_queryString .= $string;
        }
    }

    /**
     * @return Returns the Youtube Array to be parsed
     */
    protected function _getArrayData() {
        if (self::$_counter == 0) {  //Only run curl on first iteration, until data has been purged
            $url = $this->_url . self::$_queryKey . self::$_queryString;  //Finalized url pieced together
            $curl = curl_init($url);  //Initialize the url
            $this->_curlOptions($curl, $this->_curlGET);  //Set the options, also set GET command
            self::$_arrayData = json_decode(curl_exec($curl), true); //Executes rest command via curl, and converts json output into php array  
        }
        self::$_counter = 1;
        return self::$_arrayData;
    }

    //Curl options are set here
    private function _curlOptions($curl, $type) {
        return curl_setopt_array(
                $curl, array(
            CURLOPT_HTTPHEADER => array('Content-type: application/json'), //Options for Json
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $type  //The type of request (can be Put, Get or Delete)
                )
        );
    }

}
