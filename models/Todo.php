<?php

namespace models;

use system\Model;
use system\Db;

class Todo extends Model {

    private $id;

    const TABLE = 'todo';

    public function index() {
        $tb_name = self::TABLE;
        $page = 1;
        $res = $this->db->select("select * from $tb_name order by id desc LIMIT 3 OFFSET 0")->all();
        $result = $this->db->select("select * from $tb_name")->all();
        $count = count($result);
        $massiv = array($res, $count,$page);

        if ($res) {
            return $massiv;
        } else {
            return false;
        }
    }

    public function insert() {
        $tb_name = self::TABLE;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $task = $_POST['task'];
        if(empty($name) || empty($task) || empty($email)){
            header("Location: /");
        }
        $task = htmlspecialchars($task);
        $resins = $this->db->insert($tb_name, $name, $email, $task);
        $res = $this->db->select("select * from $tb_name order by id desc LIMIT 3 OFFSET 0")->all();
        $result = $this->db->select("select * from $tb_name")->all();
        $count = count($result);
        $page = 1;
        $process = null;
        
        if($resins){
            $process = "<h3 class='btn btn-danger'> Task is added </h3>";
        }
        $massiv = array($res, $count,$page,$process);

        if ($res) {
            return $massiv;
        } else {
            return false;
        }
    }

    public function edit($id) {
        $tb_name = self::TABLE;
        $result = $this->db->select("select * from $tb_name where id = $id")->one();
        $resultall = $this->db->select("select * from $tb_name")->all();
        $massiv = array($result, $resultall);

        if ($result) {
            return $massiv;
        } else {
            return false;
        }
    }

    public function update($id, $task, $status) {
        $tb_name = self::TABLE;
        $task = htmlspecialchars($task);

        $res = $this->db->update($tb_name, $task, $status, $id);

        $result = $this->db->select("select * from $tb_name")->all();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function page($page) {
        $tb_name = self::TABLE;
        $offset = ($page-1) * 3;

        $result = $this->db->select("select * from $tb_name LIMIT 3 OFFSET $offset")->all();
        $res = $this->db->select("select * from $tb_name")->all();
        $count = count($res);
        $massiv = array($result, $count,$page);

        if ($result) {
            return $massiv;
        } else {
            return false;
        }
    }
    
    
    public function filter($param, $type,$page) {
        $tb_name = self::TABLE;
        $offset = ($page-1) * 3;

        $result = $this->db->select("select * from $tb_name order by $param $type LIMIT 3 OFFSET $offset")->all();
         $res = $this->db->select("select * from $tb_name")->all();
        $count = count($res);
        $massiv = array($result, $count,$page,$param,$type);

        if ($result) {
            return $massiv;
        } else {
            return false;
        }
    }

}
