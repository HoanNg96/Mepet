<?php
include('code.php');
if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: code.php");
}

if(!$_SESSION['username'])
{
    header('Location: login.php');
}
?>