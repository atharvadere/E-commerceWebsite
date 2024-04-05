<?php

    $conn = new mysqli("localhost", "root", "", "saathE");
    $total=$_COOKIE['total'];
    $sql="INSERT INTO payment(total) VALUES ('$total')";
    $conn->query($sql);
    $sql="SELECT oid FROM payment ORDER BY oid DESC LIMIT 1";
    $result=$conn->query($sql);
    $orderid=$result->fetch_assoc();
    setcookie("orderid",$orderid['oid']);
    header("Location: displaybill.html");
    $conn->close();

?>