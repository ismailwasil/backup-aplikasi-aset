<?php
if (function_exists('sqlsrv_connect')) {
    echo "sqlsrv extension is enabled.";
} else {
    echo "sqlsrv extension is not enabled.";
}

$serverName = "10.91.12.82"; // Replace with your SQL Server instance name or IP address.
$databaseName = "aset_website"; // Replace with your database name.
$username = "bppkad"; // Replace with your SQL Server username.
$password = "^pc$As+MGHubEs@xdedi"; // Replace with your SQL Server password.

try {
    $conn = new PDO("sqlsrv:Server=$serverName;Database=$databaseName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

    // Perform your database operations here...

    // Close the connection when done (optional, as PDO closes automatically at script end)
    //$conn = null;
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>