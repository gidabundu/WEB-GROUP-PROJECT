<?php 
$serverName="localhost";
$userName="root";
$password="";
$conDB=mysqli_connect($serverName,$userName,$password);

if(!$conDB){
    die('Connection Error: '.mysqli_connect_error());
}

// Create database football_agent
$dbForm="CREATE DATABASE football_agent";
if(mysqli_query($conDB,$dbForm)){
    echo "Database Created Successfully";
} else {
    echo "Error Creating the Database: ".mysqli_error($conDB);
}
?>
