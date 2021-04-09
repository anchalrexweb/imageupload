<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exception handling</title>
</head>
<body>
    <?php
        $num = 5;
        try{
            if($num>=10){
            echo $num;
            }else{
                throw new Exception("please enter number greater than 10 <br>" );
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
        finally{
            echo "final block";
        }
    ?>
</body>
</html>