<?php

$conn = new mysqli('localhost', 'root', '1234');

$sql = "CREATE DATABASE banco";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
    $conn2 = new mysqli('localhost', 'root', '1234','banco');
} else {
    echo "Error creating database: " . $conn2->error;
}
$query = '';
$sqlScript = file('banco.sql');
foreach ($sqlScript as $line) {

    $startWith = substr(trim($line), 0, 2);
    $endWith = substr(trim($line), -1, 1);

    if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
        continue;
    }

    $query = $query . $line;
    if ($endWith == ';') {
        mysqli_query($conn2, $query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query . '</b></div>');
        $query = '';
    }
}
