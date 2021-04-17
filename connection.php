<?php

/**
 * Sesuaikan berdasarkan kredensial database dan nama database
 */
$host = 'localhost';
$username = 'user';
$password = 'aaaaaaaa';
$dbname = 'ppdb_builder';

$db = new mysqli($host, $username, $password, $dbname);
$db_error = false;

if ($db->connect_errno) {
    echo 'Database Error';
    exit();
}
