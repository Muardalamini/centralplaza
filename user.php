<?php
$server_name = "localhost";
$username = "root";
$password = "";
$databaseName = "centralplaza";

require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the POST data exists before accessing it
        $user_id = $_POST["user_id"];
        $name = $_POST["name"];
        $address = $_POST["address"];
        $phon_number = $_POST["phon_number"];
        $time_line_id = $_POST["time_line_id"];
       
        // Insert data into the "user" table using prepared statement
        $sql = "INSERT INTO user (user_id, name, address, phon_number, time_line_id) 
                VALUES (:user_id, :name, :address, :phon_number, :time_line_id)";
        
        $stmt = $conn->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":phon_number", $phon_number);
        $stmt->bindParam(":time_line_id", $time_line_id);
        
        try {
            if ($stmt->execute()) {
                echo "User data submitted successfully.";
            } else {
                echo "Error submitting user data.";
            }
        } catch (PDOException $e) {
            echo "PDO Exception: " . $e->getMessage();
        }
    } 

?>
