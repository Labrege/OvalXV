<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/dbh.inc.php');
$servername = "localhost";
$dbusername = "u519972031_solal";
$dbpassword = "OvalXV75016";
$dbname = "u519972031_DB";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}
/*
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "DB";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}

