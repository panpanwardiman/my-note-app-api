<?php

include_once('connection.php');

$query = "SELECT * FROM notes ORDER BY id DESC";

$sql = $conn->prepare($query);
$sql->execute();

$notes = $sql->fetchAll();

foreach ($notes as $note) {
    $data[] = [
        'id' => $note['id'],
        'title' => $note['title'],
        'note' => $note['note'],
        'color' => $note['color'],
    ];
}

$json = [
    'status' => true,
    'message' => "Successfully!",
    'data' => $data
];

// close connection
$sql = null;

echo json_encode($json);

