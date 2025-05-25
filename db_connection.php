<?php
// Στοιχεία σύνδεσης με τη βάση δεδομένων
$servername = "localhost"; // ή 127.0.0.1
$username = "root"; // Το default username στο XAMPP είναι "root"
$password = ""; // Το default password είναι κενό
$dbname = "student3987.sql"; // Το όνομα της βάσης δεδομένων που δημιούργησες

// Δημιουργία σύνδεσης
$conn = new mysqli($servername, $username, $password, $dbname);

// Έλεγχος σύνδεσης
if ($conn->connect_error) {
    die("Η σύνδεση απέτυχε: " . $conn->connect_error);
}

// Επιτυχής σύνδεση
//echo "Σύνδεση επιτυχής!";
?>
