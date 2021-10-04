<?php
include 'connection.php';

if(isset($_POST['name']) && $_POST['email']){
    $msg=insert_data($conn);
}else{
    echo "Please Enter All Details";
}


function insert_data($conn){
    
    $Name = legal_input($_POST['name']);
    $Email = legal_input($_POST['email']);
    $Date = legal_input($_POST['date']);

    $query= "insert into crud(Name,Email,Date)values('$Name','$Email','$Date')";
    $exec = mysqli_query($conn,$query);
    
    if($exec){
        echo "Data has inserted successfully";
        //return $msg;
    }else{
        echo "Error" .$query. "<br>" .mysqli_error($conn);
        //return $msg;
    }

}

function legal_input($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
  }

?>
