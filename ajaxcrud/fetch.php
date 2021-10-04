<table>
            <tr>
              <th>Sr No</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Date</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
  <?php

    include 'connection.php';
    $result_per_page = 3 ;
    $qry = "select * from crud";
    $rs = mysqli_query($conn,$qry);
    $NOR = mysqli_num_rows($rs);

    $NOP = ceil($NOR/$result_per_page);

   
      if (!isset ($_GET['page']) ) {  
          $page = 1;  
      } else {  
          $page = $_GET['page'];  
      }  

      $first_result = ($page-1)*$result_per_page;

      $fetch= "select * from crud limit $first_result,$result_per_page";
      $result = mysqli_query($conn,$fetch);
      while($data = mysqli_fetch_array($result))
      {
  ?>
    <tr>
      <td><?php echo $data['Id']; ?></td>
      <td><?php echo $data['Name']; ?></td>
      <td><?php echo $data['Email']; ?></td>
      <td><?php echo $data['Date']; ?></td>
      <td><a href="edit.php?id=<?php echo $data['Id']; ?>">Edit</a></td>
      <td><a href="delete.php?id=<?php echo $data['Id']; ?>">Delete</a></td>
    </tr>
  <?php
      }
    
  ?>
  
  </table>

  