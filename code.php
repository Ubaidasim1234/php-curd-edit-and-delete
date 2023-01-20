<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php


session_start();

$conn = mysqli_connect("localhost","root","","form");

if(isset($_POST['save_stud_image'])){
    
    $name = $_POST['stud_name'];
    $class = $_POST['stud_class'];
    $phone = $_POST['stud_phone'];
    $image = $_FILES['stud_image'] ['name'];

    $allowed_exttension = array('gif' , 'jpg' , 'png', 'jpeg');
    $filename = $_FILES['stud_name'] ['name'];
    $file_extention = pathinfo($filename ,PATHINFO_EXTENTION);
    IF (!in_array($file_extention,$allowed_exttension)){

        $_SESSION['status'] = " You Are Allowed With Only Png,Jpg,Jpeg and Gif ";
        header('location: create.php');
    }
    else{

        if(file_exists("upload/" . $_FILES['stud_image'] ['name']))
        {

            $filename = $_FILES['stud_image']['name'];
            $_SESSION['status'] = "Image Alredy Exists ". $filename;
            header('location: create.php');

        }else{

            $query = "INSERT INTO `user`(stud_name, stud_class, stud_phone, stud_image) VALUES ('$name','$class','$phone','$image')";
            $query_run = mysqli_query($conn,$query)

                if($query_run){
                    move_uploaded_file($_FILES['stud_image']['temp_name'], "upload/".$_FILES['stud_image']['name']);
                    $_SESSION['status'] = " Image Stored Successfully ";
                    header('location: create.php');
                }
                else{
                    $_SESSION['status'] = "Image Not Stored.!";
                    header('location: create.php');
                }
            }
        }
    }


if(isset($_POST['update_stud_image'])){

    $stud_id = $_POST['stud_id']; 
    $name = $_POST['stud_name'];
    $class = $_POST['stud_class'];
    $phone = $_POST['stud_phone'];

    $image = $_FILES['stud_image'] ['name'];
    $old_image = $_POST['stud_image_old'];
 
    if($new_image != ''){
        $update_filename = $_FILES['stud_image']['name'];

    }else{
        $update_filename = $image_old;
    }

    if($_FILES['stud_image']['name'] !='')
        {
            if(file_exists("upload/" . $_FILES['stud_image'] ['name']))
            {
    
                $filename = $_FILES['stud_image']['name'];
                $_SESSION['status'] = "Image Alredy Exists ". $filename;
                header('location: index.php');
    
            }

        }else{

       $query = "UPDATE user SET  stud_name = '$name', stud_class = '$class', stud_phone = '$phone', stud_image = '$update_filename' WHERE id='$stud_id' ";
       $query_run = mysqli_connect($conn,$query);

       if($query_run){

        if($_FILES-['stud_image']['name'] !='')
        {

            move_uploaded_file($_FILES['stud_iamge']['temp_name'], "upload/" .$_FILES['stud_iamge']['name']);
            unlink("upload/" .$old_image);
        }

        $_SESSION=['status'] = "Data updated successfully";
        header('location: index.php');

       }else{

        $_SESSION=['status'] = "Data Not updated.! ";
        header('location: index.php');

       }
        }
}


if(isset($_POST['delete_stud_image'])){

    $id = $_POST['delete_id'];
    $stud_image = $_POST['del_stud_image'];

    $query = "DELETE FROM user WHERE id='$id' ";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        unlink("uppload/".$stud_image);
        $_SESSION=['status'] = "Data or iamge deleted successfully";
        header('location: index.php');
   }
   else{
    $_SESSION=['status'] = "Data Not deleted";
    header('location: index.php');
}
}



?>
    
</body>
</html>