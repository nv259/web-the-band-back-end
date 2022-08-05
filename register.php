<?php
    include "./config/config.php";
    include "./helpers/format.php";
?>

<?php
    // Create instance variable to format username 
    $instance = new Format();

    $username = $password = $confirm_password = "";
    $username_error = $password_error = $confirm_password_error = "";

    // Validate Username
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // echo "Still worked";
        // echo htmlspecialchars($_SERVER["PHP_SELF"]);

        include_once "./DAL/DAO/register/check_username.php";

        // Validate password
        if (strlen(trim($_POST["password"])) < 6)
        {
            $password_error = "Password must have at least 6 characters.";
            echo "<script type='text/javascript'>alert('$password_error');</script>";
        }
        else $password = trim($_POST["password"]);

        // Validate confirm password 
        $confirm_password = trim($_POST["confirm_password"]);
        if ($password != $confirm_password)
        {
            $confirm_password_error = "Password did not match.";
            echo "<script type='text/javascript'>alert('$confirm_password_error');</script>";
        }

        // Insert into database
        if (empty($username_error) && empty($password_error) && empty($confirm_password_error))
        {
            include_once "./DAL/DAO/register/create_Account.php";
            include_once "./DAL/DAO/register/get_user_id.php";
            include_once "./DAL/DAO/register/create_space_for_user_info.php";
        }

        $mysqli->close();
    }
?>

<?php
    include "register.html";
?>