<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "mepet";
    

    $conn = new mysqli($servername,$username,$password,$databaseName);

    if (!$conn) {
        echo "<script language='javascript'> alert('ket noi that bai')</script>";
    }
    else
    {
        echo"aaaa";
    }

?>