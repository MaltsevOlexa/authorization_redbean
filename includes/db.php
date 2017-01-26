<?php
$mysqli = new mysqli("127.0.0.1", "root", "258561", "authorization");
if ($mysqli->connect_errno) {
    echo "Error connection to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} 
