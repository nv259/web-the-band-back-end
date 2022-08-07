<?php
    require_once "../DAL/check_loggedin.php";
    require_once "../config/config.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Your Cart </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/fonts/themify-icons/themify-icons.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/cart.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>

    <body>
        <div id="header">
            <i class="ti-face-smile logo"></i>
            <p class="register-line"><?php echo $_SESSION["username"]; ?></p>
            <a href="#" class="need-help">Need help?</a>
        </div>

        <div id="content">
            <div id="side-bar">
                <div class="row">
                    <img src="../assets/img/temp_avatar/avatar.png" alt="avatar" class="img-circle avatar-img">
                </div>

                <div class="row">
                    <a href="profile.php">
                        <i class="ti-user left"></i>
                        Your Account
                    </a>
                </div>

                <div class="row">
                    <a href="cart.php">
                        <b>
                            <i class="ti-shopping-cart-full left"></i>
                            Your Cart
                        </b>
                    </a>
                </div>

                <div class="row <?php if ($_SESSION["role"] != 1) echo 'hidden'; ?>">
                    <a href="../admin/admin.php">
                        <i class="ti-eye left"></i>
                        Admin Rights
                    </a>
                </div>

                <div class="row <?php if ($_SESSION["role"] != -1) echo 'hidden'; ?>">
                    <a href="../staff/staff.php">
                        <i class="ti-book left"></i>
                        Staff Rights
                    </a>
                </div>
            </div>

            <div id="container">
                <?php 
                    $query = "SELECT place, _time, description, src, amount FROM cart JOIN category ON cart.ticket_id = category.ticket_id WHERE customer_id = " . $_SESSION['id'];

                    // echo $query;

                    if ($result = $mysqli->query($query))
                    {
                        $quantity = 0;
                        if ($result->num_rows > 0)
                        {
                            while ($row = $result->fetch_array())
                            {
                                if ($row["amount"] <= 0) continue;
                                echo '<div class="goods row">';
                                    echo '<img src="' . $row["src"] . '" alt="img" class="goods-img">';
                                    
                                    echo '<div class="caption">';
                                        echo '<h4>' . $row["place"] . '<i class="h6"> ' . $row["_time"] . '</i> </h4>';
                                        echo '<h5>' . $row["description"] . '</h5>';
                                    echo '</div>';

                                    echo '<div class="quantity">';
                                        echo '<p>' . $row["amount"] .  '</p>';
                                        $quantity += $row["amount"];
                                    echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo "Your cart is empty now :(";
                        } 
                        
                        echo '<div class="amount">';
                            echo '<b>Amount: '. $quantity * 15 . '$</b>';
                        echo '</div>';
                        $result->free();
                    }
                   
                    $mysqli->close();
                ?>

            </div>

            <div class="clear"></div>
        </div>


        <div id="footer">
                
        </div>
    </body>
</html>
