<?php

include 'db.php';
$obj = new dbconfig();
$output = "";

?>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
<?php
        $result_per_page=3;
        $page="";
        if (isset($_POST["page"])) 
        { 
          $page  = $_POST["page"]; 
        } else 
        {
           $page=1; 
        }  
        $start_from = ($page-1) * $result_per_page;  
  
        $getd = $obj->get_data($result_per_page,$start_from);
        // $query = "select * from employee LIMIT $start_from, $result_per_page";
        // $row = mysqli_query($this->connection,$query);
        while($data = mysqli_fetch_array($getd))
        {
    ?>
    <tr>
      <th scope="row"><?php echo $data['id'] ?></th>
      <td><?php echo $data['Name'] ?></td>
      <td><?php echo $data['Email'] ?></td>
      <td><a href="edit.php?id=<?php echo $data['id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
      <td><a href="index.php?id=<?php echo $data['id'] ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
    </tr>
    <?php
        }
    ?>

</tbody>
</table>

  <div id = 'pagination'>
    <?php
  
      $res=$obj->pagination();
      $total_pages=ceil($res/$result_per_page);
       
          for($i=1; $i<=$total_pages; $i++){
            echo "<button style='margin:3px;padding:6px;' id='".$i."' class='pagination'>".$i."</button>";

          }

      
    ?>
    </div>

