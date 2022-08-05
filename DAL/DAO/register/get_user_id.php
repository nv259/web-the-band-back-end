<?php
    $query = "SELECT user_id FROM Account WHERE username = ?";

    if ($stmt = $mysqli->prepare($query))
    {
        $stmt->bind_param("s", $username);

        if ($stmt->execute())
        {
            // Success
            $stmt->bind_result($user_id);
            $stmt->fetch();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        $stmt->close();
    }
?>