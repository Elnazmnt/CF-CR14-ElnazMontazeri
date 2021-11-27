<?php
require_once "../components/db_connect.php";
require_once  "file_upload.php";

if ($_POST) {
    $id = $_POST['id'];
    $locationName = $_POST['locationName'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $uploadError = '';

    $img = file_upload($_FILES['img']);
    if ($img->error === 0) {
        ($_POST["img"] == "default.jpg") ?: unlink("../pictures/$_POST[img]");

        $sql = "UPDATE offers SET locationName = '$locationName', price ='$price', img ='$img->fileName' ,description ='$description'  WHERE id = {$id}";
    } else {
        $sql = "UPDATE offers SET locationName = '$locationName', price ='$price',description ='$description'  WHERE id = {$id}";
    }


    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
        $uploadError = ($img->error !=0)? $img->ErrorMessage :'';
    } else {
       
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_error($connect);
        $uploadError = ($img->error !=0)? $img->ErrorMessage :'';
       
    }
    mysqli_close($connect);    
} 
else {
    header("location: ../error.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <?php require_once '../components/boot.php' ?>
</head>

<body style="background-image: url('../pictures/photo.jpg');background-attachment: fixed; background-size: cover; " class="container">
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Update request response</h1>
        </div>
        <div class="alert alert-<?php echo $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../update.php?id=<?= $id; ?>'><button class="btn btn-warning" type='button'>Back</button></a>
            <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
        </div>
    </div>
</body>

</html>