<?php 

  
  $con = new mysqli("localhost","root","","hellodb");

if(isset($_POST['sublogin'])){ 
$ $email = $_POST['email'];
  $password = $_POST['password'];
$query = "select * from users where ( email = '$email')";
$res = mysqli_query($dbc,$query);
$numRows = mysqli_num_rows($res);
if($numRows  == 1){
        $row = mysqli_fetch_assoc($res);
        if(password_verify($password,$row['password'])){
           $_SESSION["login_sess"]="1"; 
             $_SESSION["login_email"]= $row['email'];
  header("location:account.php");
        }
        else{ 
     header("location:login.php?loginerror=".$login);
        }
    }
    else{
  header("location:login.php?loginerror=".$login);
    }
}
?>