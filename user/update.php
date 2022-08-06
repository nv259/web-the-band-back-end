<?php
    $name = $email = $phone = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $phone = trim($_POST["phone"]);

        $query = "UPDATE UserInfo SET name = ? , email = ? , phone = ? WHERE user_id = ?";

        if ($stmt = $mysqli->prepare($query))
        {
            $stmt->bind_param("sssi", $param_name, $param_email, $param_phone, $param_user_id);

            $param_name = $name;
            $param_email = $email;
            $param_phone = $phone;
            $param_user_id = $_SESSION["id"];

            if ($stmt->execute())
            {
                // Success
                $_SESSION["name"] = $param_name;
                $_SESSION["email"] = $param_email;
                $_SESSION["phone"] = $param_phone;
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            $stmt->close();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        $mysqli->close();
    }
?>