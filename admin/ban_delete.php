<?php 

// db connection
include "../lib/connection.php"; 


// delete query
if (isset($_GET['id'])) {         

    $d_id = $_GET['id'];         

    $delete_sql = "DELETE FROM `banner` WHERE id=$d_id";   

    

    if( $conn -> query($delete_sql) ){     

        header('Location:banner.php');       

 }else{

      die( $conn -> error );               

 }

} else{

    header('Location:banner.php');  


}




 ?>