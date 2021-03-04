<?php
class Message{
    private $db;

    function __construct()
    {
        $this->db=DB::getInstance();
    }
    function getMessage(int $pages)
    {
        try {
            $limit = 6;
            $pagination = (new Pagination)->getPagesDetail("message")->limit($limit)->offset($pages)->result();
            // get start offet && number of pages
            $offset = $pagination->target;
            $totalpages = $pagination->pages;
            var_dump($pagination);
            $req = $this->db->get("message")->limit((int)$limit)->offset((int)$offset)->result();
            $result = [ "totalPages" => $totalpages, "activepages" => $pages, "result" => $req,];
            return $result;
        } catch (Exception $ex) {
            return ["exception"=>$ex->getMessage()];
        }
    }
    
}