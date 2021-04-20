
<?php

    session_start();

    if (isset($_SESSION["user"])) {

        echo json_encode(["note 1", "note 2", "note 3"]);

    } else {
        http_response_code(401);
        echo json_encode(["status" => "ERROR", "message" => "Потребителят не е оторизиран!"]);
    }


?>