<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    // print_r($file);
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg' ,'png' ,'pdf');
    
    if(in_array($fileActualExt,$allowed)) {
        if($fileError === 0){
            if($fileSize < 1000000) {
                $fileNameNew = uniqid('',true).".".$fileActualExt;

                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                echo "uploads success";

            }else{
                echo "File Too Big!!";
            }
        }else{
            echo "There was an error uploading the file";    
        }

    } else {
        echo "cant upload this type of file";
    }
}
?>
<body>
    <form action="file upload.php" method="POST" enctype="multipart/form-data">

    <input type="file" name="file">
    <button type="submit" name="submit">Upload</button>

    </form>
</body>
</html>