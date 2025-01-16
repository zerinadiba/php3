<?php

session_start();
if (isset($_SESSION['author'])) {

  if ($_SESSION['author']==1) {

    header('Location:index.php');
  }
}else{
  if (isset($_COOKIE['author'])) {
    if ($_COOKIE['author']==true) {
      header('Location:index.php');
    }
  }
}


// db connection
include "lib/connection.php";



if (isset($_POST['btn_login']) ){

$email= $_POST['email'];
$pass= md5( $_POST['password']);
$login= isset($_POST['keep_login'])?1:0;

$loginquery="SELECT * FROM `users`WHERE email='$email',AND pass='$pass'";

$resultlogin= $conn->query($loginquery);

 //echo $resultlogin-> num_rows; 

 if ($resultlogin-> num_rows>0) 
 {
 	 $_SESSION ['author']=1;

   if ($login==1) {
     setcookie('author',true,time()+(60*60*24*10),'/');
   }

 	 header('Location:index.php');

 }else{
 die( $conn -> error );
 }

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log in</title>
</head>
<body style="background:white;
	  align-items: center;
	  justify-content:center;">


 <form style="background: whitesmoke;
	margin: 50px;
	padding: 50px;
	border: 10px solid ;
	border-radius: 9px;
	color:black;
	font-size: 20px;" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <div class="mb-3" style="margin-bottom: 20px;">
    <label for="exampleInputEmail1" class="form-label" style="    font-size: 30px;">1. Email address</label>
    <input type="email" class="email" id="email" name="email" aria-describedby="emailHelp" style="
      width: 171px;
    height: 40px;
    background-color: azure;">
    <div id="emailHelp" class="form-text" style="color: ;">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3" style="margin-bottom: 20px;" >
    <label for="exampleInputPassword1" class="form-label" style="    font-size: 30px;">2.Password</label>
    <input type="password" class="password" id="password" name="password"  style="
      width: 171px;
    height: 40px;
    background-color: azure;">
  </div>
  <div class="mb-3 form-check" style="margin-bottom: 20px;">
    <input type="checkbox" class="keep_login" id="keep_login" name="keep_login" 
    style=
    "width: 25px;
    height: 25px;">
    <label class="keep_login" for="exampleCheck1" style="font-size: 25px;">Keep me logged in.</label>
  </div>
  <button type="submit" class="btn btn_login" id="btn_login" name="btn_login" style="width: 90px;
    height: 40px;
    font-size: 22px;
    color: white;
    background-color: black;
    border-radius: 10px;">Login</button>

</form>















</body>
</html>