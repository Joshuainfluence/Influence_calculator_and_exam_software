<?php
require_once(__DIR__ . "/constants.php");
function connection()
{
    try {
        $connection = mysqli_connect(HOST, USER, PASSWORD, DB);
        if (mysqli_connect_error()) {
            throw new Exception("Error connecting to database", 1);
        } else {
            return $connection;
        }
    } catch (\Exception $e) {
        die($e->getMessage());
    }
}
