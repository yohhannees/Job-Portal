<?php 
session_start();
session_destroy();
if(isset($_GET['val'])){
    if($_GET['val']==1){
        header("location:Admin.php");
    }
    else{
header("location:companyLogin.php");}
}else{
header("location:signin.php");}
?>
