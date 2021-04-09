<?php
$con = mysqli_connect("localhost","root","","imageupload");
$id = $_GET['id'];
// echo $id;
$edit = "SELECT * FROM `imagetable` WHERE id = $id";
$edit_result = mysqli_query($con,$edit);
$edit_row = mysqli_fetch_assoc($edit_result);
// echo $edit_row['image'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>

    <div class="container">
        <form method="post" enctype="multipart/form-data"> 
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" value="<?php echo $edit_row['email']; ?>"  name="email1">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" value="<?php echo $edit_row['password']; ?>" name="pwd1" >
            </div>
            <div class="form-group">
                <label for="img">Image:</label>
                
                <input type="file" class="form-control" name="img1">
                <!-- <input type="file" name="file" value="" > -->
                <?php  if($edit_row['image'] != null){?>
                <input type = "hidden" class="form-control" id="hidden_image" name="oldimage" value="<?php echo $edit_row['image'];?>">
                <image src="<?php echo $edit_row['image'];?>" id="image" class="rounded-circle" width="100" height="100" name="oldimage">
                <button   type="submit" id="del">delete</button>
                <?php }else {?>
                <p>NO IMAGE FOUND</p>
                <?php } ?>
            </div>
            <button type="submit" class="btn btn-primary" name="update">update</button>
        </form>
    </div>

    <script>
    $(document).ready(function(){
        

        $("#del").on("click",function(e){
            e.preventDefault();
            $("#image").remove();
            $("#del").hide();
            $("#hidden_image").val("");
        });
    }); 

    </script>
    <?php 
    
        if(isset($_POST['update'])){
            $email1 = $_POST['email1'];
            $password1= $_POST['pwd1'];
            $image1 = $_FILES['img1'];
            $oldimage = $_POST['oldimage'];
            
            $filename1 = $image1['name'];
            if($filename1 != null){
                $file_temp_name1 = $image1['tmp_name'];

                $fileext1 =  explode(".",$filename1);
                $file_check1 = strtolower(end($fileext1));
                $file_ext_store1 = array("png","jpg","jpeg");
                
                if(in_array($file_check1,$file_ext_store1)){
                    $dest_file1 = "uploads/".$filename1;
                    move_uploaded_file($file_temp_name1, $dest_file1);
                    $sql = "UPDATE `imagetable` SET `email`='$email1',`password`='$password1',`image`='$dest_file1' WHERE id='$id'";
                    mysqli_query($con,$sql); ?>
                    <script> window.open("index.php","_self"); </script>
         <?php  } }else{
             $null = 'NULL';
             $sql_update = "UPDATE `imagetable` SET `email`='$email1',`password`='$password1',`image`= '$oldimage' WHERE id='$id'";
             mysqli_query($con,$sql_update);
             header("location:index.php");
         }
        }
            
        
    ?>

</body>
</html>