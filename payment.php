<?php
$server_name = "localhost";
$username = "root";
$password = "";
$databaseName = "centralplaza";

require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $payment= $_POST["payment"];
    $deposit = $_POST["deposit"];
    $full_price = $_POST["full_price"];
    $user_id = $_POST["user_id"];
   
   
    
    // Insert data into the "complaint" table using prepared statement
    $sql = "INSERT INTO payment (payment, deposit, full_price, user_id) 
            VALUES (:payment, :deposit, :full_price, :user_id)";
    
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(":payment", $payment);
    $stmt->bindParam(":deposit", $deposit);
    $stmt->bindParam(":full_price", $full_price);
    $stmt->bindParam(":user_id", $user_id);
   
    
    try {
        if ($stmt->execute()) {
            echo "Complaint submitted successfully.";
        } else {
            echo "Error submitting complaint.";
        }
    } catch (PDOException $e) {
        echo "PDO Exception: " . $e->getMessage();
    }
}

?>