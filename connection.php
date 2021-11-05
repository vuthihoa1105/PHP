<?php
$host = 'localhost';
$name = 'root';
$password = '';
$dbname = 'qlsv_2_11';

$conn = mysqli_connect($host,$name,$password,$dbname);

if(!$conn) 
{
    die("Connection failed: ");
}
?>