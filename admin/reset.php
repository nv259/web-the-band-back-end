<?php
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    // echo $url; // Outputs: Full URL
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    // echo $params['id']; // Get id from $url

    require_once "../config/config.php";

    $query = "UPDATE Account SET password='$2y$10$0X2iq2LaEBJU41cf48TwuOW8tA4h3MesM7jOW3jf69FSyTRs7gt0i' WHERE user_id = ?";
    
    if ($stmt = $mysqli->prepare($query))
    {   
        $stmt->bind_param("i", $param_user_id);
        $param_user_id = $params['id'];

        if ($stmt->execute())
        {
            header("location: admin.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        $stmt->close();
    }

    $mysqli->close();

    header("location: error.php");
    exit();
?>