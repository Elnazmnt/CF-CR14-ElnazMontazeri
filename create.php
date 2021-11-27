<?php require_once "actions/db_connect.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add offer</title>
    <?php require_once  'components/boot.php' ?>
</head>
<body style="background-image: url('pictures/photo.jpg');background-attachment: fixed; background-size: cover; " class="container">

    <!-- start Form -->
    
        <legend class="mt-4 h2" style="color: black;font-family: 'Dancing Script', cursive;background-color:#f7e8e3 ;opacity:0.8;">Add offer</legend>
        <div class="mt-3  p-2 text-dark bg-opacity-50" style="background-color:#f7e8e3 ;opacity:0.8;">
          
            <form action ="actions/a_create.php" method= "post"  enctype="multipart/form-data">
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label mt-2 fs-6">locationName</label>
                    <input type="text" class="form-control" name="locationName" id="validationCustom01" required>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label mt-2 fs-6">choose Image</label>
                    <input class="form-control" type="file" name="img" id="formFile">
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label mt-2 fs-6">price</label>
                    <input type="text" class="form-control" name="price" id="validationCustom01" required>

                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label mt-2 fs-6">description</label>
                    <input type="text" class="form-control" name="description" id="validationCustom01" required>

                </div>
               
               
               
               
                <button type="submit" class="btn btn-outline-dark mt-4" style="background-color:#025b0e;">Insert Item </button>
                <a href="index.php">
                    <button type="button" class="btn btn-outline-dark mt-4" style="background-color:#fa448c;">Home</button>
                </a>
            </form>
    
    <!-- end Form -->
</body>
</html>