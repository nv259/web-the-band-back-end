<?php
    include "./config/config.php";
    include "./helpers/format.php";
?>

<?php
    // Create instance variable to format username 
    $instance = new Format();

    $name = $password = $confirm_password = "";
    $name_error = $password_error = $confirm_password_error = "";

    // Validate Username
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // echo "Still worked";
        // echo htmlspecialchars($_SERVER["PHP_SELF"]);

        $query = "SELECT user_id FROM Account WHERE name = ?";

        if ($stmt = $mysqli->prepare($query))
        {
            $stmt->bind_param("s", $param_name);
            
            // Set parameter
            $param_name = $instance->validation($_POST["name"]);

            if ($stmt->execute())
            {
                // store result
                $stmt->store_result();

                if ($stmt->num_rows() == 1)
                {
                    // this username is already taken
                    $name_error = "This username is already taken.";
                }
                else {
                    $name = trim($_POST["name"]);
                }
            }
            else echo "Oops! Something went wrong. Please try again later.";

            $stmt->close();
        }

        // Validate password
        if (strlen(trim($_POST["password"])) < 6)
        {
            $password_error = "Password must have at least 6 characters.";
        }
        else $password = trim($_POST["password"]);

        // Validate confirm password 
        $confirm_password = trim($_POST["confirm_password"]);
        if ($password != $confirm_password)
            $confirm_password_error = "Password did not match.";

        // Insert into database
        if (empty($name_error) && empty($password_error) && empty($confirm_password_error))
        {
            $query = "INSERT INTO Account (name, password) VALUES (?, ?)";
            
            if ($stmt = $mysqli->prepare($query))
            {
                $stmt->bind_param("ss", $param_name, $param_password);

                $param_name = $name;
                $param_password = password_hash($password, PASSWORD_DEFAULT);

                if ($stmt->execute())
                {
                    // Redirect to login page
                    echo "Logged in";
                    header("location: login.php");
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                $stmt->close();
            }
        }

        $mysqli->close();
    }
?>

<?php
    include "register.html";
?>