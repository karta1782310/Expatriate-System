<?php

require_once "Config.php";

class Database 
{
    private $db = null;    
    private static $instance = null;

    private function __construct()
    {
        global $hostname, $username, $password, $database;
        $this->db = new mysqli($hostname, $username, $password, $database);
        $this->db->set_charset("utf8");
    }

    public static function GetInstance()
    {
        if (self::$instance == null)
            self::$instance = new self();
        
        return self::$instance;
    }

    private function __clone()  {   }

    public function __destruct() 
    {
        if ($this->db != null)
           $this->db->close();
    }

    private function getParameter($params)
    {
        $type = "";
        $data = [""];
        foreach ($params as $param)
        {
            $type = $type.$param[0];
            $data[] = &$param[1];
        }
        $data[0] = $type;
        return $data;
    }

    //Read
    public function Select($sql, $params)
    {
        $rows = [];
        try 
        {
            //準備命令
            $stmt = $this->db->prepare($sql);
            
            //繫結參數
            if (count($params) > 0) 
            {
                $data = $this->getParameter($params);
                call_user_func_array([$stmt, "bind_param"], $data);
            }

            //執行SQL命令
            $stmt->execute();
            
            //取得結果資料集
            $result = $stmt->get_result();
                     
            while ($row = $result->fetch_assoc())
                $rows[] = $row;         
        }
        catch(Exception $e)
        {
            $rows = [];
        }

        $stmt->close();
        return $rows;
    }

    //Create
    public function Insert($sql, $params)
    {
        $ret = true;
        try {

            $stmt = $this->db->prepare($sql);

            if (count($params) > 0) 
            {
                $data = $this->getParameter($params);
                call_user_func_array([$stmt, "bind_param"], $data);
            }

            $stmt->execute();
        }
        catch(Exception $e)
        {
            $ret = false;
        }
        $stmt->close();
        return $ret;
    }

    //Delete
    public function Delete($sql, $params)
    {
        $ret = true;
        try {

            $stmt = $this->db->prepare($sql);

            if (count($params) > 0) 
            {
                $data = $this->getParameter($params);
                call_user_func_array([$stmt, "bind_param"], $data);
            }

            $stmt->execute();
        }
        catch(Exception $e)
        {
            $ret = false;
        }
        
        $stmt->close();
        return $ret;        
    }

    //Update
    public function Update($sql, $params)
    {
        $ret = true;
        try {

            $stmt = $this->db->prepare($sql);

            if (count($params) > 0) 
            {
                $data = $this->getParameter($params);
                call_user_func_array([$stmt, "bind_param"], $data);
            }

            $stmt->execute();
        }
        catch(Exception $e)
        {
            $ret = false;
        }
        
        $stmt->close();
        return $ret;       
    }
}


?>