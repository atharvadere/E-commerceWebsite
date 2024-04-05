<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $iid = $_POST['iid'];
    $quantity= $_POST['quantity'];

    // Establish a database connection
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "saathE";

    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    // Check for a database connection error
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "UPDATE items SET isquantity=isquantity+'$quantity' where iid='$iid';";
    $conn->query($sql);
    if(mysqli_affected_rows($conn)==1)
        echo '<script>alert("Stock updated !")</script>';
    else
        echo '<script>alert("Invalid Id !")</script>';
    
    echo "<meta http-equiv='refresh' content='0'>";
    $conn->close();
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restock</title>
    <style>
        body{
            background-color: rgb(214, 222, 247);
        }
        #d0{
            display: flex;
            margin: 120px 100px;
            border-radius: 20px;
            background-color: white;
        }
        
        img{
            width: 275px;
            margin-top: -100px;
        }
        h1{
    
            font-size: 7rem;
            background: linear-gradient(to right,violet,indigo,red);
            -webkit-background-clip: text;
            color: transparent;
        }
        h2{
            font-size: 2rem;
            margin-bottom : 10px;
        }
        input{
            width: 300px;
            height: 40px;
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
            align-content : center;
            text-align: center;
        }
        #d2{
            padding: 100px;
            text-align: center;
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
            Stock Items
        </h2>
        <form method="post" action="restock.php">
        <input  type="number" name="iid" placeholder="Item id" required><br>
        <input type="number" name="quantity" placeholder="Quantity" required><br>
        <button type="submit">Add stock</button>
    </form>
    <a href="adminmain.html"><button>Go back</button></a>
    </div>
</div>
</body>
</html>