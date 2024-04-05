<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "saathE";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Query to fetch data from the payment table
$sql = "SELECT * FROM payment";
$result = $conn->query($sql) or die($conn->error);

echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>Payment History</title>";
echo "<style>";
echo "body { font-family: Arial, sans-serif; background-color: #d6def7; }";
echo "h1 { text-align: center; color: #333; }";
echo "button { margin : 10px; border-radius :10px;padding : 5px;}";
echo "table { border-collapse: collapse; width: 80%; margin: 20px auto; }";
echo "th, td { border: 1px solid #333; padding: 10px; text-align: center; }";
echo "th { background-color: #8aa4f2; color: #fff; }";
echo "tr{ background-color: #f2f4fa; }";
echo "</style>";
echo "</head>";
echo "<body>";
echo '<a href ="adminmain.html"><button>Main Menu</button></a>';


if ($result->num_rows > 0) {
    echo "<h1>Payment History</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Order Id</th><th>Amount</th><th>Time</th></tr>";
    $tamount=0;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["oid"] . "</td>";
        echo "<td>" . $row["total"] . "</td>";
        echo "<td>" . $row["time"] . "</td>";
        $tamount=$tamount+$row["total"];
        echo "</tr>";
    }

    echo "</table>";
    echo "<center>Total Amount : ₹".$tamount;
} else {
    echo "<br><br>Transaction History Absent !<br><br>";

}

// Close the database connection
$conn->close();
?>
