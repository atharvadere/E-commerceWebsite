<?php

if($_SERVER['REQUEST_METHOD']==='POST')
{
    
    $conn = new mysqli("localhost", "root", "", "saathE");

    $usrname=$_POST['usern'];
    $pasword=$_POST['passw'];
    
    $sql="SELECT * FROM login";

    if($conn->query($sql)->num_rows===0)
    {   
        $sql="INSERT INTO login VALUES ('$usrname','$pasword')";
        $conn->query($sql);
        echo '<script>alert("Username and password set successfully !\n");window.location.href="adminmain.html";</script>';

    }
    else
    {
        $sql="SELECT * FROM login where usrname='$usrname' AND pasword='$pasword'";
        
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {   
            header("Location: adminmain.html"); //no gap between n:
        }    
        else
        {
            echo '<script>alert("Sorry Username/Password is incorrect\nPlease try again !");window.location.href="adminlogin.php";</script>';
        }
    }
    $conn->close();
}

?>