<?php

require_once("Youtube_Base.php");

class Youtube_Get extends Youtube_Base {
    
    /**
     * 
     * @Desc Obtains Youtube videoId
     */
    public function id(){
        $datas = $this->_getArrayData();
        
        $i = 0;
        foreach ($datas['items'] as $values) {            
            foreach ($values['id'] as $k => $v) {
                if ($k == 'videoId') {
                    $result[$i] = $v;
                    $i++;
                }                 
            }
        }
        return $result;
    }
    
    /**
     * 
     * @Desc Obtains Youtube video title
     */
    public function title(){
        $datas = $this->_getArrayData();
        
        $i = 0;
        foreach ($datas['items'] as $values) {            
            foreach ($values['snippet'] as $k => $v) {
                if ($k == 'title') {
                    $result[$i] = $v;
                    $i++;
                }                 
            }
        }
        return $result;
    }
}
