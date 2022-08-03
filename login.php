<?php 
    session_start();

    // Check if the user is already logged in
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
    {
        // Direct user to index php
        header("location: index.php");
        exit;
    }

    require_once "./config/config.php";
    require_once "./helpers/format.php";

    $name = $password = "";
    $name_error = $password_error = $login_error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = trim($_POST["name"]);
        $password = trim($_POST["password"]);

        $query = "SELECT user_id, name, password FROM Account WHERE name = ?";
        
        if ($stmt = $mysqli->prepare($query))
        {
            // echo "got user_id, name, password\n";

            $stmt->bind_param("s", $param_name);

            $param_name = $name;
            // echo $name;
            // echo $password;

            if ($stmt->execute())
            {
                $stmt->store_result();

                if ($stmt->num_rows == 1)
                {
                    // echo "\nusername exist";

                    $stmt->bind_result($id, $name, $hashed_password);
                    if ($stmt->fetch())
                    {
                        if (password_verify($password, $hashed_password)) 
                        {
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["name"] = $name;

                            header("location: index.php");
                        }   
                        else {
                            echo "Password_verify doesn't work.";
                            $login_error = "Invalid username or password.";
                        }
                    }
                }
                else {
                    $login_error = "Invalid username or password.";
                }
            } else echo "Oops! Something went wrong. Please try again later.";

            $stmt->close();
        }

        $mysqli->close();
    }
?>

<?php
    include "login.html";
?>