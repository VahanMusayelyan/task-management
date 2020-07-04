<?php
$res = $this->result[0];
if(!isset($res)){
    echo "<script>window.location.href='/';</script>";
    exit();
}
    
?>
<form action="/todos/update" method="POST"> 
    <div class="panel panel-default allcontent">
        <div class="panel-heading color_login"><h3>Add Todo</h3> </div>
        <div class="form-group">
            <label for="usr">Name:</label>
            <input type="text" class="form-control" id="usr" name="name" value="<?=$this->result[0]['name']?>" disabled="disabled">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" value="<?=$this->result[0]['email']?>" disabled="disabled">
            <input type="text" name="edit" value="<?=$this->result[0]['id']?>" hidden="hidden">
        </div>
        <div class="form-group">
            <label for="task">Task:</label>
            <textarea class="form-control task" id="task" name="task"><?=$this->result[0]['task']?></textarea>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="comp" value="1" <?php if($this->result[0]['status'] == 1){ echo "checked"; }?>>
            <label class="form-check-label" for="comp">
             Complete task
            </label>
         </div>
         <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="incomp" value="0" <?php if($this->result[0]['status'] == 0){ echo "checked"; }?>>
            <label class="form-check-label" for="incomp">
              Incomplete task
            </label>
         </div>


        <button type="submit" value="Add" name="submit_task" class="btn btn-primary button_task">Update Todo</button>
    </div>
</form>

   
