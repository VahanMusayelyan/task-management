<?php

namespace system;

class Db {

    public $con;
    public $select;
    


    public function __construct() {

        $this->con = mysqli_connect("localhost","root","root","oop");
        if ($this->con->connect_errno) {
            echo $this->con->connect_error;
            exit;
        }
    }
    
     /* FILTER */

  /*  public function filter($data) {
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        $data = $this->con->escape_string($data);
        return $data;
    } */

    /* SELECT */

    public function select($query) {
        $this->select = $this->con->query($query);
        return $this;
    }

    /* SELRCT ALL */

    public function all() {
        if (!$this->select) {
            return [];
        }
        $data = [];
        while ($array = $this->select->fetch_assoc()) {
            $data[] = $array;
        }
        return $data;
    }

    /* SELECT ONE */

    public function one() {
        if (!$this->select) {
            return [];
        }
        return $this->select->fetch_assoc();
    }

    /* INSERT */

    public function insert($tb_name, $name,$email,$task) {

        $insert = $this->con->query("INSERT INTO $tb_name (`name`,`email`,`task`) VALUES ('$name','$email','$task')");
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }

    /* UPDATE */

    public function update($tb_name, $task,$status, $id) {

        
        $update = $this->con->query("UPDATE $tb_name SET `task` = '$task', `status` = '$status' WHERE `id` = '$id'");
       
        if ($update) {
            return true;
        } else {
            return false;
        }
    }





}
