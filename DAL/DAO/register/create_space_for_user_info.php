<?php
    $query = "INSERT INTO UserInfo (user_id) VALUES (?)";

    if ($stmt = $mysqli->prepare($query))
    {
        $stmt->bind_param("s", $user_id);

        $stmt->execute();

        $stmt->close();
    }
?>