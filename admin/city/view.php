<?php require_once '../../app.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=WEBSITE_URL;?>assets/css/bootstrap.css">

    <title>Medical Services</title>
  </head>
  <body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><?=WEBSITE_TITLE;?></a>
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
<div class="col-12">
     <h1 class="text-center my-3">View All Cities</h1>
</div>
 <div class="col-8 mx-auto my-5 border p-3">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Change Status</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $rows = medical_get_all('cities');
                foreach ($rows as $row) {?>
                    <tr>
                    <td><?=$row['city_id'];?></td>
                    <td><?=$row['city_name'];?></td>
                    <td><?=($row['city_is_active'] == 1) ? '<a href="#" class="btn btn-danger" >Unactive</a>' : '<a href="#" class="btn btn-success" >Active</a>'?></td>
                    <td>
                        <a href="<?=WEBSITE_URL?>admin/city/edit.php?city_id=<?=(int) $row['city_id']?>" class="btn btn-info" >Edit</a>
                    </td>
                    <td>
                        <a href="<?=ADMIN_URL?>/city/delete.php?city_id=<?=$row['city_id']?>" class="btn btn-danger" >Delete</a>
                    </td>
                </tr>
                <?php } ?>
                
        </tbody>
    </table>
</div>


</div>
    </div>

    <script src="<?=WEBSITE_URL;?>assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="<?=WEBSITE_URL;?>assets/js/popper.min.js"></script>
    <script src="<?=WEBSITE_URL;?>assets/js/bootstrap.js"></script>
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


