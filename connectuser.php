<?php
session_start();
require_once 'connexiondata.php';
if($_POST)
{
    extract($_POST);
    //requete
    $sql = "SELECT * from username where username='$username' and password=md5('$password')";
    //execution
    $result = $conn->query($sql);
    //lecture
    if ($result->num_rows > 0) {
        if($row = $result->fetch_assoc())
        {
          $_SESSION['user'] = $row;
          header('location:classes.php');
        }
    } 
    else
    {
        $_SESSION['info'] = 'Login/Password incorrecte(s)';
        header('location:login-users.php');
    }
    $conn->close();
}

?>