<?php
class Pagination_Operation{
    private $_limit,
            $_offset,
            $_isQuesry,
            $_table,
            $db;

    function __construct(string $tabelName)
    {
        $this->_limit=0;
        $this->_offset=0;
        $this->_isQuesry=false;
        $this->_table=$tabelName;
        // 
        $this->db=DB::getInstance();
    }
    /**
     * @integer:$limit=> this is the limit data to be display.ex:20
     */
    function limit(int $limit){
        $this->_limit=(int)$limit;
        return $this;
    }
    /**
     * @integer: $offset=> this is where to start read data. 
     * ex:0 // the first position. witch is 0
     */
    function offset(int $offset){
        $this->_offset=(int)$offset;
        return $this;
    }
    private function operation(){
        
    }
    function result(int $limit){
        return $this->operation();
    }
}