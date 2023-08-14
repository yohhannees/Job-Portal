<?php 
include_once 'database.php';
session_start();

if(isset($_POST['upload'])){
$file= rand(1000,100000)."-".$_FILES['file']['name'];
$file_loc=$_FILES['file']['tmp_name'];
$file_size=$_FILES['file']['size'];
$file_type=$_FILES['file']['type'];
$folder="upload/";
$new_size=$file_size/1024;
$new_file_name=strtolower($file);
$final_file=str_replace(' ','-',$new_file_name);
if(move_uploaded_file($file_loc,$folder.$final_file)){
$sql="UPDATE users SET file_name= '$final_file',  type= '$file_type', size = '$new_size' WHERE id=".$_SESSION['id'];
$conn->query($sql);
header("location: Apply.php");
}
else{
    echo 'error';
}

}