<?php
    $query = "SELECT user_id FROM Account WHERE username = ?";

    if ($gui_stmt = $mysqli->prepare($query))
    {
        $gui_stmt->bind_param("s", $username);

        if ($gui_stmt->execute())
        {
            // Success
            $gui_stmt->bind_result($user_id);
            $gui_stmt->fetch();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        $gui_stmt->close();
    }
?>