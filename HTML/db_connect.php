<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "computer_parts_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example query function
function getProducts($search = '', $inStockOnly = false) {
    global $conn;
    
    $sql = "SELECT * FROM products WHERE 1=1";
    
    if (!empty($search)) {
        $search = $conn->real_escape_string($search);
        $sql .= " AND (product_name LIKE '%$search%' 
                 OR manufacturer LIKE '%$search%'
                 OR description LIKE '%$search%')";
    }
    
    if ($inStockOnly) {
        $sql .= " AND in_stock = TRUE";
    }
    
    $sql .= " ORDER BY product_name ASC";
    
    $result = $conn->query($sql);
    $products = [];
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    
    return $products;
}

// Close connection (call when done)
// $conn->close();
?>