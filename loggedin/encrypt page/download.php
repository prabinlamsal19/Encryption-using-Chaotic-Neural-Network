<?php

// connect to the database

$conn = mysqli_connect('localhost', 'root', '', 'demos');
$sql = "SELECT * FROM uploads ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
