<?php
    $query = "SELECT user_id FROM Account WHERE username = ?";

    if ($stmt = $mysqli->prepare($query))
    {
        $stmt->bind_param("s", $param_username);
        
        // Set parameter
        $param_username = trim($_POST["username"]);

        if ($stmt->execute())
        {
            // store result
            $stmt->store_result();

            if ($stmt->num_rows() == 1)
            {
                // this username is already taken
                $username_error = "This username is already taken.";
                echo "<script type='text/javascript'>alert('$username_error');</script>";
            }
            else {
                $username = trim($_POST["username"]);
            }
        }
        else echo "Oops! Something went wrong. Please try again later.";

        $stmt->close();
    }
?>