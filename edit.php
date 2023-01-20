

<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>PHP IMAGE CURD</title>
  </head>
  <body>

  <div class="continer mt-4">
    <div class="row">
        <div class="col-md-12">
     <div class="card">
        <div class="card-header bg-warning">
            <h4> PHP IAMGE CURD - EDIT DATA AND IMAGE IN PHP</h4>
        </div>
        <div class="card-body">

        <?php
        
        $conn = mysqli_connect("localhost","root","","form");
        $id = $_GET['id'];
        $query = "SELECT * FROM user WHERE id='$id' ";
        $query_run = mysqli_query($conn,$query); 

        if(mysqli_num_rows($query_run) > 0){

            foreach($query_run as $row){

                ?>


           <form action="code.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="stud_id" value=" <?php echo $row['id'] ?>"  />

            <div class="form-group">
                  <label for="">Student Name</label>
                  <input type="text" name="stud_name" value=" <?php echo $row['stud_name'] ?>" required class="form-control" placeholder="Enter Name">
            </div>

            <div class="form-group">
                <label for="">Student Class</label>
                <input type="text" name="stud_class" value=" <?php echo $row['stud_class'] ?>" required class="form-control" placeholder="Enter Class">
            </div>


            <div class="form-group">
                <label for="">Student Phone</label>
                <input type="text" name="stud_phone" value=" <?php echo $row['stud_phone'] ?>"  required class="form-control" placeholder="Enter Phone Number">
            </div>


            <div class="form-group">
                <label for="">Student Image</label>
                <input type="file" name="stud_image" class="form-control">
                <input type="hidden" name="stud_image_old" value="<?php echo $row['stud_image'] ?>" >
            </div>

            <img src="<?php echo "upload/".$row['stud_image']; ?>" width="100px">

            <div class="form-group">
               <button type="submit" name="update_stud_image" class="btn btn-primary">Update Data</button>
            </div>
            </form>


                <?php
            }

        }else{
          
            echo "No Record Avaliable";
        }
        
        ?>


      </div>
      </div>
      </div>
     </div>
    </div>





    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

  </body>
</html>