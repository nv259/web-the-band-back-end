<?php 
    $query = "INSERT INTO Account (username, password) VALUES (?, ?)";
            
    if ($stmt = $mysqli->prepare($query))
    {
        $stmt->bind_param("ss", $param_username, $param_password);

        $param_username = $username;
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
?>