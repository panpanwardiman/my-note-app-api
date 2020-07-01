<?php

include_once("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM notes WHERE id=:id";

    $sql = $conn->prepare($query);

    $sql->bindParam(':id', $id);

    if ($sql->execute()) {
        $res = [
            'status' => true,
            'message' => "Successfully deleted."
        ];
    } else {
        $res = [
            'status' => false,
            'message' => "Failure deleted."
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