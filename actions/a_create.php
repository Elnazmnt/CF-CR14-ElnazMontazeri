<?php
require_once "../components/db_connect.php";
require_once  "file_upload.php";

if ($_POST) { 
$locationName = $_POST["locationName"];
$img =file_upload($_FILES["img"]);
$price = $_POST["price"];
$description = $_POST["description"];
$uploadError = '';

$sql="INSERT INTO offers(locationName,img,price,description) VALUES 
('$locationName','$img->fileName','$price','$description')";

if (mysqli_query($connect, $sql)=== true){
    $class = "success";
    $message = "The entry below was successfully created <br>
    
    
        <table class='table w-50'>
        <tr>
       
        <th >locationName</th>
        <th >price</th> 
        <th >description</th>
      
       

    </tr>
        <tr>
       
        <td>$locationName</td>
        <td>$price</td>
        <td>$description</td>
      
       
        </tr></table><hr>";
        
    $uploadError = ($img->error !=0)? $img ->ErrorMessage :'';

} else {
    $class = "danger";
    $message = "Error while creating record. Try again: <br>" . $connect->error;
    $uploadError = ($img->error !=0)? $img->ErrorMessage :'';
}

mysqli_close($connect);
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Document</title>
    <?php require_once "../components/boot.php"?>
</head>
<body style="background-image: url('../pictures/photo.jpg');background-attachment: fixed; background-size: cover; " class="container">
    

<div class="container">
            <div class="mt-3 mb-3">
                <h1>Create request response</h1>
           </div>
            <div class="alert alert-<?=$class;?>"  role="alert">
               <p><?php echo ($message) ?? ''; ?></p>
               <p><?php echo ($uploadError) ?? '' ; ?></p>
                <a href='../index.php'><button class="btn btn-primary"  type='button'>Home</button></a>
            </div>
       </ div>


</body>
</html>