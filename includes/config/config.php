<?php

$conn = new mysqli("127.0.0.1","root","root1234","nkursdb_demodatabase");
if ($conn->connect_error) {
    die("Connection Failed!".$conn->connect_error);
}

?>