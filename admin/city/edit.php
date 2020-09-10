<?php require_once '../../app.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=WEBSITE_URL?>assets/css/bootstrap.css">

    <title>Medical Services</title>
  </head>
  <body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">A-ULER</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Cities
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="add.php">Add New</a>
                    <a class="dropdown-item" href="view.php">View All</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Services
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Add New</a>
                    <a class="dropdown-item" href="#">View All</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Managers
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Add New</a>
                    <a class="dropdown-item" href="#">View All</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Orders</a>
            </li>



            <li class="nav-item active">
                <a class="nav-link" href="#" target="_blank">Visit Site <span class="sr-only">(current)</span></a>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0" method="POST" action="#">
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" name="logout">Logout</button>
        </form>
       
    </div>
</nav>



<div class="container">
    <div class="row">
<!-- task  -->
<!-- confirm password -->
<!-- validate type in array -->

    <div class="col-8 mx-auto my-5">
        <div class="card-header">
            <h3 class="text-center">Edit Info About City</h3>
           
            <div>
                <?php
                // Check and Get Data From Database 
                if (isset($_GET['city_id']) && !empty($_GET['city_id'])) {
                    $city_id = prepare_input($_GET['city_id']);
                    $row = medical_get_one('cities',"city_id = '$city_id'");
                }
                // Check and Update Data
                if(isset($_POST['submit'])) {
                    $city_name = prepare_input($_POST['city_name']);
                    // Validation 
                    // required , string , max:100
                    if (! is_required($city_name)) {
                        $errors['city_name'] = 'required';
                    } elseif (! is_string_modified($city_name)) {
                        $errors['city_name'] = 'Must be string';
                    } elseif (! is_not_more_than($city_name,MAXCITYNAMELENGTH)) {
                        $errors['city_name'] = 'Max Length 100';
                    }
                    if (empty($errors)) {
                        $check_operation = medical_update_city_name('cities', $city_id, $city_name);
                        if ($check_operation) {
                            echo "<div class='alert alert-success'>Data Updated Succefully</div>";
                            redirect('admin/city/edit.php?city_id='.$row['city_id']);
                        } else {
                            echo "<div class='alert alert-danger'>Faild To Update Data</div>";
                        }
                    }
                }
                ?>
                <form class="border p-5 my-3 " method="POST" action="">
                    <div class="form-group">
                        <label for="name"  class="text-dark "> Name</label>
                        <input type="hidden" name="id">
                        <input type="text" name="city_name" class="form-control" id="name" value="<?=(isset($row['city_name'])) ? $row['city_name'] : ''?>">
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>


</div>
</div>

<script src="<?=WEBSITE_URL?>assets/js/jquery-3.5.1.slim.min.js"></script>
<script src="<?=WEBSITE_URL?>assets/js/popper.min.js"></script>
<script src="<?=WEBSITE_URL?>assets/js/bootstrap.js"></script>
    <script>

        $(".delete-record").click(()=>{
            let state = confirm("Are You Shure From Deleteing This Order ?");
            if(state)
            {
                return true;
            }
            else 
            {
                return false;
            }
        })

    </script>



</body>
</html>

