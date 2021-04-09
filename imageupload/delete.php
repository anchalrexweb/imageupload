<?php
    $con = mysqli_connect("localhost","root","","imageupload");
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    $del = "DELETE FROM `imagetable` WHERE id = $id";
    mysqli_query($con, $del);
    header("location:index.php");
    }
?>