<?php

include_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST['id'];
    $title = $_POST['title'];
    $note = $_POST['note'];
    $color = $_POST['color'];

    $query = "UPDATE notes SET title=:title, note=:note, color=:color WHERE id=:id";

    $sql = $conn->prepare($query);

    $sql->bindParam(":title", $title);
    $sql->bindParam(":note", $note);
    $sql->bindParam(":color", $color);
    $sql->bindParam(":id", $id);

    if ($sql->execute()) {
        $res = [
            'status' => true,
            'message' => "Successfully updated."
        ];
    } else {
        $res = [
            'status' => false,
            'message' => "Failure updated."
        ];
    }
} else {
    $res = [
        'status' => false,
        'message' => "Error"
    ];
}

$sql = null;

echo json_encode($res);