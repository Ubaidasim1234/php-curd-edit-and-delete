<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>PHP IMAGE CRUD</title>
  </head>
  <body>

  <div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="text-white"> PHP IMAGE CRUD - HOW TO FATCH IMAGE IN PHP</h4>
                </div>
                <div class="card-body">


                <?php
                if(isset($_SESSION['status']) && $_SESSION != ''){

                    ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong><?php echo $_SESSION['status'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-lable="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php
                    unset($_SESSION['status']);
                }
                
                ?>

             <?php
             $conn=mysqli_connect("localhost","root","","form");

             $query = "SELECT * FROM user ";
             $query_run = mysqli_query($conn,$query);

             
             ?>


                     <table class="table">
                        <thead>
                 <tr>
                    <th>ID</th>
                    <th>Stud Name</th>
                    <th>Stud Class</th>
                    <th>Phone No</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    
                 </tr>
                            <tbody>

                            <?php
                            
                         if(mysqli_num_rows( $query_run) > 0) 
                         {
                            foreach($query_run as $row)
                            {
                            
                                ?>

                               <tr>
                                <td><?php  echo $row['id']; ?></td>
                                <td><?php  echo $row['stud_name']; ?></td>
                                <td><?php  echo $row['stud_class']; ?></td>
                                <td><?php  echo $row['stud_phone']; ?></td>
                                <td>
                        <img src="<?php  echo "upload/" .$row['stud_image']; ?>" width="100px" alt="image">
                                </td>

                                <td><a href="edit.php?id = <?php  echo $row['id'];   ?>" class="btn btn-info">EDIT</a></td>

                                <td>
                                    <!-- <a href="delete.php" class="btn btn-danger">DELETE</a> -->

                                    <form action="code.php" method="POST">
                                        
                                    <input type="hidden" name="delete_id" vlaue="<?php  echo $row['id']; ?>">
                                    <input type="hidden" name="del_stud_image" value="<?php  echo $row['stud_image']; ?>">

                                    <button type="submit" name="delete_stud_image" class="btn btn-danger">Delete</button>

                                    </form>

                                    </td>


                                
                                </tr>

                                <?php

                            

                            }
                         }
                         else{

                            ?>

                             <tr>
                               <td>No Record Avaliable</td>
                            </tr>


                            <?php

                            


                         }
                         ?>
                        
                                 <!-- <tr>
                                    <td>id</td>
                                </tr>  -->
                            </tbody>
                        </thead>
                     </table>
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