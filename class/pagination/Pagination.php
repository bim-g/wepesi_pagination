<?php
class Pagination{
    /**
     * @string : $tableName=> this is the name of the table where the we are going to pass our request
     * the module will return an instatance pagination_operation
     */
    function getPagesDetail(string $tableName){
        return new Pagination_Operation($tableName);
    }
}