<?php

include_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $title = $_POST['title'];
    $note = $_POST['note'];
    $color = $_POST['color'];   

    $query = "INSERT INTO notes (title, note, color) VALUES (:title, :note, :color) ";

    $sql = $conn->prepare($query);

    $sql->bindParam(':title', $title);
    $sql->bindParam(':note', $note);
    $sql->bindParam(':color', $color);

    if ($sql->execute()) {
        $res['status'] = true;
        $res['message'] = "Successfully!";
    } else {
        $res['status'] = false;
        $res['message'] = "Failure!";
    }

} else {
    $res['status'] = false;
    $res['message'] = "Errors";
}

echo json_encode($res);