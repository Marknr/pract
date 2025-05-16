<?php
session_start();

if (isset($_POST["photo_id"], $_POST["text"], $_SESSION["user_id"])) {
    require "vendor/autoload.php";
    $db = new \Photos\DB();
    $photo_id = intval($_POST["photo_id"]);
    $user_id = intval($_SESSION["user_id"]);
    $text = trim($_POST["text"]);

    if ($text !== "") {
        $comment = $db->add_comment($photo_id, $user_id, $text);
        echo json_encode($comment);
    }
    
}