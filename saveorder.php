<?php

    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "saathE";
    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    
    // Check for a database connection error
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $arr=json_decode($_COOKIE['itemc']);
    $orderid=$_COOKIE['orderid'];
    $mobno=$_COOKIE['mobno'];
    $adrtype=$_COOKIE['adrtype'];
    $locality=$_COOKIE['locality'];
    $city=$_COOKIE['city'];
    $pincode=$_COOKIE['pincode'];
    $name=$_COOKIE['name'];

    for($x=0;$x<6;$x++)
    {
        if($arr[$x]!=0)
        {
            $sql="INSERT INTO ordert VALUES ('$orderid','$x','$arr[$x]');";
            $conn->query($sql);
            
            $sql="UPDATE items SET isquantity=isquantity-'$arr[$x]' where iid='$x';";
            $conn->query($sql);
        }
    }
    
    $sql = "INSERT INTO addres (nme,oid,adrtype,locality,city,pincode,mobno) VALUES ('$name','$orderid','$adrtype','$locality','$city','$pincode','$mobno')";
    $conn->query($sql);

    echo '<script>alert("Order placed successfully!");
    localStorage.removeItem("itemcount");
    localStorage.removeItem("address");
    window.location.href="index.html";</script>';
    setcookie("mobno",false);
    setcookie("adrtype",false);
    setcookie("locality",false);
    setcookie("city",false);
    setcookie("pincode",false);
    setcookie("name",false);
    setcookie("total",false);
    setcookie("itemc",false);
    setcookie("orderid",false);
    $conn->close();
    exit();
?>
