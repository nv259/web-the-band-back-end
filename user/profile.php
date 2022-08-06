<?php
    session_start();
    
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false)
    {
        header("location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> User Profile </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/fonts/themify-icons/themify-icons.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/profile.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>

    <body>
        <div id="header">
            <i class="ti-face-smile logo"></i>
            <p class="register-line"> User profile </p>
            <a href="#" class="need-help">Need help?</a>
        </div>

        <div id="content">
            <div id="side-bar">
                <div class="row">
                    <img src="../assets/img/temp_avatar/avatar.png" alt="avatar" class="img-circle avatar-img">
                </div>

                <div class="row">
                    <a href="profile.php">
                        <b>
                            <i class="ti-user left"></i>
                            Your Account
                        </b>
                    </a>
                </div>

                <div class="row">
                    <a href="cart.php">
                        <i class="ti-shopping-cart-full left"></i>
                        Your Cart
                    </a>
                </div>

                <div class="row <?php if ($_SESSION['role'] != 1) echo "hidden"; ?>">
                    <a href="../admin/admin.php">
                        <i class="ti-eye left"></i>
                        Admin Rights
                    </a>
                </div>

                <div class="row <?php if ($_SESSION['role'] != -1) echo "hidden"; ?>">
                    <a href="../staff/staff.php">
                        <i class="ti-book left"></i>
                        Staff Rights
                    </a>
                </div>
            </div>

            <div id="container">
                <h3>User Profile</h3>
                <p style="opacity: 0.7;">Please update your profile frequently for better privacy</p>
                <hr>

                <div class="">
                    <form action="profile.php" method="post" style="margin-top: 32px">
                        <div class="username row"> 
                            <div class="left">Username</div>
                            <div class="right">
                                <?php echo $_SESSION["username"]; ?>
                            </div>
                        </div>
                        
                        <div class="user_name row">
                            <div class="left">Name</div>
                            <input class="right" type="text" name="name" id="name" value="<?php echo $_SESSION['name']?>" placeholder="Enter your name" required />
                        </div>
    
                        <div class="user_email row">
                            <div class="left">Email</div>
                            <input class="right" type="email" name="email" id="email" value="<?php echo $_SESSION['email']?>" placeholder="Enter your email" required />
                        </div>
    
                        <div class="user_phone row">
                            <div class="left">Mobile</div>
                            <input class="right" type="text" name="phone" id="phone" value="<?php echo $_SESSION['phone']?>" placeholder="Enter your phone" required />
                        </div>
    
                        <div class="user_create_at row">
                            <div class="left">Create at</div>
                            <div class="right">
                                <?php echo $_SESSION['create_at'] ?>
                            </div>
                        </div>
    
                        <div class="user_role row" style="margin-bottom: 32px;">
                            <div class="left">Role</div>
                            <div class="right">
                            <?php 
                                    switch ($_SESSION['role']) 
                                    {
                                        case -1:
                                            echo "Staff";
                                            break;
                                        case 0:
                                            echo "User";
                                            break;
                                        case 1:
                                            echo "Admin";
                                            break;
                                        default: 
                                            echo "wut????";
                                            break;
                                    }
                                ?>
                            </div>
                        </div>
    
                        <div class="operations row">
                            <a href="user_update.php?username=admin" class="btn btn-success" style="margin:0 16px 0 84px">Save</a>
                            <a href="user_reset_password.php?username=admin" class="btn btn-danger">Reset password</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="clear"></div>
        </div>

        <div id="footer">

        </div>
    </body>
</html>