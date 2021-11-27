<?php
function file_upload($img)
{
   $result = new stdClass();//this object will carry status from file upload
   $result->fileName = 'avatar.png';
   $result->error = 1;//it could also be a boolean true/false
   //collect data from object $picture
   $fileName = $img["name"];
   $fileType = $img["type"];
   $fileTmpName = $img["tmp_name"];
   $fileError = $img["error"];
   $fileSize = $img["size"];
   $fileExtension = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));    
   $filesAllowed = ["png", "jpg", "jpeg"];
   if ($fileError == 4) {      
       $result->ErrorMessage = "No img was chosen. It can always be updated later.";
       return $result;
   } else {
       if (in_array($fileExtension, $filesAllowed)) {
           if ($fileError === 0) {
               if ($fileSize < 5000000) { //500kb this number is in bytes
                   //it gives a file name based microseconds
                   $fileNewName = uniqid('') . "." . $fileExtension; // 1233343434.jpg i.e
                   $destination = "../pictures/$fileNewName";
                   if (move_uploaded_file($fileTmpName, $destination)) {
                       $result->error = 0;
                       $result->fileName = $fileNewName;
                       return $result;
                   } else {    
                       $result->ErrorMessage = "There was an error uploading this file.";
                       return $result;
                   }
               } else {                                      
                   $result->ErrorMessage = "This picture is bigger than the allowed 500Kb. <br> Please choose a smaller one and Update your profile.";
                   return $result;
               }
           } else {                              
               $result->ErrorMessage = "There was an error uploading - $fileError code. Check php documentation.";
               return $result;
           }
       } else {                      
           $result->ErrorMessage = "This file type cant be uploaded.";
           return $result;
       }
   }
}