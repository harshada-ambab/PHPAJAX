<?php
//include 'crud.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Crud</title>
</head>
<body>
    <div class="container">
        <h1>PHP CRUD Operation</h1><br>
        <form id="crud" action="" method="">
        <p style="color:red"><?php if(!empty($msg)){echo $msg; }?></p>
        <div style="color:green" id="msg"></div>
        <input type='text' name='name' id='name' placeholder='Enter Name' required>
        <input type='email' name='email' id='email' placeholder='Enter Email' required> 
            
        
        <input type="date" name="date" id="date" required><br>
        <button type="submit" id="submit" name="insert">Insert data</button>
        
        </form>
        <br><br>
        <hr>
        <br>
         
          
      <?php
       include 'connection.php';
       $limit=4;
       $qry = "select * from crud";
       $rs = mysqli_query($conn,$qry);
       $NOR = mysqli_num_rows($rs);
   
       $NOP = ceil($NOR/$limit);
      ?>
  <div id ="table"></div>
  
  

 
               
               <ul class="pagination">
               <?php 
               if(!empty($NOP)){
                   for($i=1; $i<=$NOP; $i++){
                           if($i == 1){
                               ?>
                           <li class="pageitem active" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" data-id="<?php echo $i;?>" class="page-link" ><?php echo $i;?></a></li>
                                                       
                           <?php 
                           }
                           else{
                               ?>
                           <li class="pageitem" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" class="page-link" data-id="<?php echo $i;?>"><?php echo $i;?></a></li>
                           <?php
                           }
                   }
               }
                           ?>
               </ul>
          
     
 

  
          
          </div>
  </div>
  <script src="ajax.js"></script>

</body>
<script>
    $(document).ready(function() {
        $("#table").load("pagination.php?page=1");
        $(".page-link").click(function(){
            var id = $(this).attr("data-id");
            var select_id = $(this).parent().attr("id");
            $.ajax({

                url: "pagination.php",
                type: "GET",
                data: {
                    page : id
                },
                cache: false,
                success: function(dataResult){
                    $("#table").html(dataResult);
                    $(".pageitem").removeClass("active");
                    $("#"+select_id).addClass("active");
                    
                }
            });
        });
    });
</script>
</html>