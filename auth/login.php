<?php require_once "../app.php"; ?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?=WEBSITE_URL.'assets/css/bootstrap.css'?>">

<title>Login</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto my-5">
            <div class="card ">
                <div class="card-header">
                    <h3 class="text-center">Login</h3>
                    <?php
                    
                    if (isset($_POST['submit']) && !empty($_POST['submit'])) {
                        foreach ($_POST as $key => $value) {
                            $$key = prepare_input($value);
                        }
                        // Validation
                        // email: required, email, max: 100
                        if (! is_required($email)) {
                            $errors['email'] = 'required';
                        } elseif (! is_email($email)) {
                            $errors['email'] = 'Must be Email';
                        } elseif (! is_not_more_than($email, MAXEMAILLENGTH)) {
                            $errors['email'] = 'Must be less than '.MAXEMAILLENGTH;
                        }

                        // password: required, string, max: 100
                        if (! is_required($password)) {
                            $errors['password'] = 'required';
                        } elseif (! is_string_modified($password)) {
                            $errors['password'] = 'Must be string';
                        } elseif (! is_not_more_than($password, MAXEMAILLENGTH)) {
                            $errors['password'] = 'Must be less than '.MAXPASSWORDLENGTH;
                        }

                        if (empty($errors)) {
                            $admin = get_one("admins", "admin_email = '$email'");
                            if (! empty($admin)) {
                                $password_match = password_verify($password, $admin['admin_password']);
                                echo $password_match;
                            }
                        }
                    }
                   //print_r($errors);
                    ?>
                    <div>
                        <form class="border p-5 my-3 " method="POST" action="login.php">
                            <div class="form-group">
                                <label for="email"  class="text-dark">Email :</label> <?=getError('email'); ?>
                                <input type="email" name="email" name="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="password"  class="text-dark ">Password : <?=getError('password');?></label>
                                <input type="password" name="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block" value="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo URL.'asset/js/jquery-3.5.1.slim.min.js'?>"></script>
<script src="<?php echo URL.'asset/js/bootstrap.js'?>"></script>
</body>
</html>
