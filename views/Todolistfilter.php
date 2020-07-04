
<form action="/todos/insert" method="POST"> 
    <div class="panel panel-default allcontent">
        <div class="panel-heading color_login"><h3>Add Todo</h3> </div>
        <div class="form-group">
            <label for="usr">Name:</label>
            <input type="text" class="form-control" id="usr" name="name" >
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="task">Task:</label>
            <textarea class="form-control task" id="task" name="task"></textarea>
        </div>


        <button type="submit" value="Add" name="submit_task" class="btn btn-primary button_task">Add Todo</button>
    </div>
</form>

<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Number</th>
                <th>Name
                    <div class="filterDiv">
                        <a class="bottom" href="/todos/filter/name/asc"><i class="fa fa-sort-down"></i></a>
                        <a class="top" href="/todos/filter/name/desc"><i class="fa fa-sort-up"></i></a>
                    </div>
                </th>
                <th>Email
                    <div class="filterDiv">
                        <a class="bottom" href="/todos/filter/email/asc"><i class="fa fa-sort-down"></i></a>
                        <a class="top" href="/todos/filter/email/desc"><i class="fa fa-sort-up"></i></a>
                    </div></th>
                <th>Task</th>
                <th>Status
                    <div class="filterDiv">
                        <a class="bottom" href="/todos/filter/status/asc"><i class="fa fa-sort-down"></i></a>
                        <a class="top" href="/todos/filter/status/desc"><i class="fa fa-sort-up"></i></a>
                    </div></th>
                <?php
                if ($_SESSION['admin'] == "adminka") {
                    ?>
                    <th>Edit</th>

                    <?php
                }
                ?>
            </tr>
        </thead>
        <tbody>

            <?php
            $i = 0;
            $param = $this->result[3];
            $type = $this->result[4];
            
            $number = $this->result[1] / 3;
            $count = intval(ceil($number));
            
            $page = $this->result[2];
            
            $k = (($page - 1) * 3 );
            $i = $k;
                
            
            
            foreach ($this->result[0] as $key => $value) {
                $i++;

                echo "<tr><td>" . $i . "</td>"
                . "<td>" . $value['name'] . "</td>"
                . "<td>" . $value['email'] . "</td>"
                . "<td>" . $value['task'] . "</td>";


                if ($_SESSION['admin'] == "adminka") {

                    if ($value['status'] == 1) {
                        echo "<td> Done </td>";
                    } else {
                        echo "<td> In process </td>";
                    }

                    echo "<th><form action='/todos/edit' method='POST'>"
                    . "<button class='btn btn-primary'>Edit</button>"
                    . "<input value=" . $value['id'] . " type='hidden' name='edit'></th>"
                    . "</form></tr>";
                } else {
                    if ($value['status'] == 1) {
                        echo "<td> Done </td></tr>";
                    } else {
                        echo "<td> In process </td></tr>";
                    }
                }
            }
            ?>



        </tbody>
    </table>
    <div class="pagination">
      
        <?php
        $uri = $_SERVER['REQUEST_URI'];

        $page = intval($page);
         
        if($page-1 !== 0){?>
           
            <a href='/todos/page/<?=$page-1?>'>&laquo;</a>
        <?php
        
        }
        
        for ($j = 1; $j < $count + 1; $j++) {
            if ($j == $page) {
                echo "<a class='active' href='/todos/filter/".$param."/".$type."/".$j . "'>" . $j . "</a>";
            } else {
                echo "<a href='/todos/filter/".$param."/".$type."/".$j . "'>" . $j . "</a>";
            }
        }
        
        if($count !== $page){?>
           
            <a href='/todos/page/<?=$page+1?>'>&raquo;</a>
        <?php
        
        echo $actual_link;
        
        }
        ?>
        
        
    </div>

</div>       
