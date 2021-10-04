<?php
include('connection.php');
$limit = 4;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM crud ORDER BY name ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($conn, $sql);  
?>
<table class="table table-bordered table-striped">  
<thead>  
<tr>
              <th>Sr No</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Date</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
</thead>  
<tbody>  
<?php  
while ($row = mysqli_fetch_array($rs_result)) {  
?>  
           <tr>
      <td><?php echo $row['Id']; ?></td>
      <td><?php echo $row['Name']; ?></td>
      <td><?php echo $row['Email']; ?></td>
      <td><?php echo $row['Date']; ?></td>
      <td><a href="edit.php?id=<?php echo $row['Id']; ?>">Edit</a></td>
      <td><a href="delete.php?id=<?php echo $row['Id']; ?>">Delete</a></td>
    </tr>
<?php  
};  
?>  
</tbody>  
</table>    