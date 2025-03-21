<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $_POST['item_name'];
    $item_description = $_POST['item_description'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO items (name, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $item_name, $item_description);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Item</title>
    <link rel="stylesheet" href="../css/main.css">

</head>
<body>
    <h2>Create New Item</h2>
    <form method="post" action="create.php">
        <label for="item_name">Item Name:</label><br>
        <input type="text" id="item_name" name="item_name" required><br><br>
        <label for="item_description">Item Description:</label><br>
        <textarea id="item_description" name="item_description" required></textarea><br><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
