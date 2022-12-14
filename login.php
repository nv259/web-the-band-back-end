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

    $username = $password = "";
    $username_error = $password_error = $login_error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);

        $query = "SELECT Account.user_id, username, name, phone, password, email, create_at, role FROM Account JOIN UserInfo  ON Account.user_id = UserInfo.user_id WHERE Account.username = ?";
        
        if ($stmt = $mysqli->prepare($query))
        {
            // echo "got user_id, username, password\n";

            $stmt->bind_param("s", $param_username);

            $param_username = $username;
            // echo $username;
            // echo $password;

            if ($stmt->execute())
            {
                $stmt->store_result();

                if ($stmt->num_rows == 1)
                {
                    // echo "\nusername exist";

                    $stmt->bind_result($id, $username, $name, $phone, $hashed_password, $email, $create_at, $role);
                    if ($stmt->fetch())
                    {
                        if (password_verify($password, $hashed_password)) 
                        {
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["email"] = $email;
                            $_SESSION["name"] = $name;
                            $_SESSION["phone"] = $phone;
                            $_SESSION["create_at"] = $create_at;
                            $_SESSION["role"] = $role;

                            header("location: index.php?name=$username&email=$email");
                        }   
                        else {
                            // echo "Password_verify doesn't work.";
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