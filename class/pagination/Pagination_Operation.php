<?php
class Pagination_Operation{
    private $_limit,
            $_page_value,
            $_isQuesry,
            $_table,
            $db;

    function __construct(string $tabelName)
    {
        $this->_limit=0;
        $this->_page_value=0;
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
     * @integer: $value=> this is where to start read data. 
     * ex:0 // the first position. witch is 0
     */
    function page(int $value){
        $this->_page_value=(int)$value;
        return $this;
    }
    private function operation(){
        try {
            $resudlt_query = "";
            $resudlt_query = $this->db->count($this->_table)->result();

            if ($this->db->error()) {
                throw new Exception($this->db->error());
            }
            $total_count = $resudlt_query;
            // check the target offset is > than 1
            $target_offset = $this->_page_value > 1 ? $this->_page_value : 1;
            var_dump($target_offset);
            $start = ($target_offset - 1) * $this->_limit;
            // check if the size limit is > 0
            $limit_size = $this->_limit > 0 ? $this->_limit : 1;
            $pages = ceil($total_count / $limit_size);
            return (object)["pages" => $pages, "target" => $start];
        } catch (Exception $ex) {
            return ["exception" => $ex->getMessage()];
        }
    }
    function result(){
        return $this->operation();
    }
}