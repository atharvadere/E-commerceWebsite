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

    $sql="SELECT isquantity from items order by iid ASC";
    $x=0;
    $res=$conn->query($sql);

    while($row=$res->fetch_assoc())
    {
        if($arr[$x]>$row['isquantity'])
        {
            echo '<script>alert("Sorry! Item you chose is OUT OF Stock !\nUnable to proceed !\nPlease try after sometime !\nSorry for inconvinience caused !");window.location.href="website.html";</script>';
            $conn->close();
            exit();
        }
        $x++;
    }
    echo '<script>
    if(localStorage.getItem("address")===null)
        window.location.href="addressinfo.html";
    else
        window.location.href="qrpage.html";
        </script>';
    $conn->close();
    exit();
?>
