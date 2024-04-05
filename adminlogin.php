<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "saathE";

    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    $sql="SELECT * FROM login";
    if($conn->query($sql)->num_rows===0)
    {
        echo '<script>alert("Username and Password is not set !\nEnter new Username and Password !")</script>';
    }
    $conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            background-color: rgb(214, 222, 247);
        }
        #d0{
            display: flex;
            margin: 100px 100px;
            border-radius: 20px;
            background-color: white;
        }
        
        img{
            width: 300px;
            align-self: center;
            margin-top: -50px;
            margin-left:50px;
        }
        h1{
            margin-top: 80px;
            margin-left: 100px;
            margin-bottom:0px;
            font-size: 7rem;
            background: linear-gradient(to right,violet,indigo,red);
            background-clip: text;
            color: transparent;    
        }
        h2{
            font-size: 3rem;
            margin-bottom:20px;
        }
        input{
            width: 300px;
            height: 30px;
            border-radius: 5px;
            margin: 10px;
        }
        button{
            color: white;
            background-color: rgb(159, 128, 187);
            height: 25px;
            width: 100px;
            border-radius: 15px;
            margin-top: 10px;
        }
        #d1{
            width: 50%;
            text-align:center;
        }
        #d2{
            padding: 100px;
            text-align:center;
        }
    </style>
</head>
<body>
    <div id="d0">
    <div id="d1">
        <h1>SaathE</h1>
        <img src="Images/cart.png">
    </div>
    <div id="d2">
        <h2>
            Admin Login
        </h2>
        <form method="post" action="adminloginvalidate.php">
        <input  type="text" name="usern" placeholder="Username"><br>
        <input type="password" name="passw" placeholder="Password"><br>
        <button type="submit">Log In</button>
    </form>
    <a href="index.html"><button>Go back</button></a>
    </div>
    </div>
</div>
</body>
</html>