<?php

include 'db.php';
$obj = new dbconfig();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <title>Crud In OOPS</title>
</head>
<body>
<div class="container">
<form action="index.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Enter email" required>
  </div>
  
  <button type="submit" name="btn_save" class="btn btn-primary">Insert</button>
</form>

<?php
    
    if(isset($_POST['btn_save'])){
        $Name = $_POST['name'];
        $Email = $_POST['email'];

        
            $res=$obj->insert($Name,$Email);

            if($res)
            {
                echo '<div class="alert alert-success"> Your Record Has Been Saved</div>';
            }
            else{
                echo "Error";
            }
    }
?>
<hr>

    <?php
    // $result_per_page=3;
    // if(isset($_GET['page']))
    // {
    //     $page=$_GET['page'];
    // }else{
    //     $page=1;
    // }
    // $start_from=($page-1)*$result_per_page;
    ?>
  <div id="table"></div>



    <?php
         if(isset($_GET['id'])){
             $id = $_GET['id'];
            $res2= $obj->delete($id);
            if($res2==true){
                echo "<div class='alert alert-primary' role='alert'>
                        Data has deleted Successfully.
                     </div>";
            }else{
                echo "<div class='alert alert-dan   e.preventDefault();se try again !
                    </div>";
            }
         }
        
    ?>
   
    
    
    

</div>
</body>

<script>
    $(document).ready(function() {
        load();
         function load(page){
            $.ajax({
                 url: "pagination.php",
                 type: "POST",
                 data: { page : page},
                 success:function(data){
                     $("#table").html(data);
                 }
            });
         }
      
      
        $(document).on("click",".pagination",function(){
            var page = $(this).attr("id");
            load(page);
            console.log(page);
        })
    });
</script>
</html>