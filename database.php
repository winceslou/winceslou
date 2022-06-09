<?php
    $server_name='localhost';
    $user_name='root';
    $password="";
    // $password="";
    $database="retwvsu";
    
    $connection=new mysqli($server_name,$user_name,$password,$database);
    if ($connection-> connect_error){
        die("Unabale to connect".$connection-> connect_error);
    }
    // echo"Database connection sucessfully";
?>