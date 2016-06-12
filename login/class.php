<?php

class DB_Connect{
    var $link;
    var $num_rows;
    var $error;

    function DB_Connect($db,$host='localhost:3306',$user='root',$pass='pude2015')
    {
        $this->link = @mysql_connect($host,$user,$pass) or die("Could not connect: ".mysql_error());
        @mysql_select_db($db) or die(mysql_error());
        @mysql_query("set names 'GBK'");
        $this->error=mysql_error();
    }
    
    function closesql()
    {
        @mysql_close($this->link);
    }

    function fetch_list($sql,$type=1)
    {
        if($type==1)$mysql_type=MYSQL_BOTH;
        if($type==2)$mysql_type=MYSQL_ASSOC;
        if($type==3)$mysql_type=MYSQL_NUM;
        $result=@mysql_query($sql);
        $this->error=mysql_error();
        $this->num_rows = @mysql_num_rows($result);
        if($result){
        while ($line = @mysql_fetch_array($result,$mysql_type)) {
            $rows[]=$line;
            }
        @mysql_free_result($result);
        return $rows;
        }else{
        return FALSE;
        }
    }

    function fetch_rows($sql,$type=1)
    {
        if($type==1)$mysql_type=MYSQL_BOTH;
        if($type==2)$mysql_type=MYSQL_ASSOC;
        if($type==3)$mysql_type=MYSQL_NUM;
        $result=@mysql_query($sql);
        $this->error=mysql_error();
        $this->num_rows = @mysql_num_rows($result);
        if($result){
        $rows=@mysql_fetch_array($result,$mysql_type);
        @mysql_free_result($result);
        return $rows;
        }else{
        return FALSE;
        }
    }

    function query($sql)
    {
        $result=@mysql_query($sql);
        $this->num_rows = @mysql_affected_rows();
        $this->error=mysql_error();
        return $result;
    }

    function get_num()
    {
        return $this->num_rows;
    }

    function get_error()
    {
        return $this->error;
    }
}
?>
