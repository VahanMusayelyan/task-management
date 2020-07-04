<?php

namespace controllers;

use system\Controller;
use models\Todo;

class Todos extends Controller {

    public function __construct() {

        parent::__construct();
    }

    public function index() {
        
        $model = new Todo;
        
        $res = $model->index();
        
        $this->view->result = $res;
        
        $this->view->render('todolist');
    }
    
    public function insert() {
        $model = new Todo;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $task = $_POST['task'];
        
        $result = $model->insert($name,$email,$task);
       
        $this->view->result = $result;
        

        $this->view->render('todolist');
    }
    
    public function edit() {
        $model = new Todo;
        $id = $_POST['edit'];
        $result = $model->edit($id);
       
        $this->view->result = $result;

        $this->view->render('todoedit');
    }
    
    public function update() {
        $model = new Todo;
        $id = $_POST['edit'];
        $task = $_POST['task'];
        $status = $_POST['status'];

        $result = $model->update($id,$task,$status);
       
        $this->view->result = $result;
        echo "<script>window.location.href='/';</script>";
        /* $this->view->render('todolist');*/
    }
   
    
    public function page($page) {
        
        $model = new Todo;
        $result = $model->page($page);
       
        $this->view->result = $result;
  
        $this->view->render('todolistpage');
    }
    
    
        public function log_out() {

        unset($_SESSION['admin']);
        header("Location: /");
    }
    
        public function filter($type,$param,$page = 1) {

        $model = new Todo;
        $result = $model->filter($type,$param,$page);
       
        $this->view->result = $result;



        $this->view->render('todolistfilter');
    }

}
