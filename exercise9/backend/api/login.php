<?php

    require_once("../functions/login-func.php");

    if ($_POST && isset($_POST["email"]) && isset($_POST["password"])) {

        try {

            $user = login($_POST);

            if ($user) {

                session_start();
                $_SESSION["user"] = $user;

                echo json_encode(["status" => "SUCCES", "message" => "Входът е успешен!"]); 

            } else {
                http_response_code(400);
                echo json_encode(["status" => "ERROR", "message" => "Входът е неуспешен!"]); 
            }

        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(["status" => "ERROR", "message" => $e->getMessage()]); 
        }

    } else {
        http_response_code(400);
        echo json_encode(["status" => "ERROR", "message" => "Некоректни данни!"]); 
    }

?>