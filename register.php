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

<!DOCTYPE html>
<html>
    <head>
        <title>Register</title> 
        <meta charset="utf-8">
        <link rel="stylesheet" href="./assets/css/register_style.css">
        <link rel="stylesheet" href="./assets/fonts/themify-icons/themify-icons.css">
    </head>

    <body>
        <div id="header">
            <i class="ti-face-smile logo"></i>
            <p class="register-line"> Register </p>
            <a href="#" class="need-help">Need help?</a>
        </div>

        <div id="content">
            <div class="register-wrap">
                <div class="register-content">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="register-form" method="post">
                        <h2 class="sign-up"> Sign Up </h2>
                        <p class="require-text"> 
                            Please fill this form to create a an account 
                            <br>
                            <br>
                            Username
                        </p>
                        <input type="text" name="name" id="" required value=""/> 
                        <p> Password </p>
                        <input type="password" name="password" id="" required />
                        <p> Confirm Password </p>
                        <input type="password" name="confirm_password" required />
                        <button type="submit" class="submit-btn btn"> Submit </button>
                        <button type="reset" class="reset-btn btn"> Reset </button>
                        <p style="margin-bottom: 30px"> 
                            <br>
                            Already have an account? <a href="./login.php">Login here</a>.
                        </p>
                    </form>
                </div>
            </div>
        </div>

        <div id="footer">
            
        </div>
    </body>
</html>