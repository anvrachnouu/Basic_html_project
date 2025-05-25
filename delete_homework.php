<?php
// Σύνδεση με τη βάση δεδομένων
$conn = new mysqli("localhost", "root", "", "student3987.sql");

// Έλεγχος σύνδεσης
if ($conn->connect_error) {
    die("Σφάλμα σύνδεσης: " . $conn->connect_error);
}

// Λήψη του ID της εργασίας που θα διαγραφεί
$id = $_GET['id'];

// Διαγραφή της εργασίας από τη βάση δεδομένων
$sql = "DELETE FROM assigments WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Η εργασία διαγράφηκε επιτυχώς.";
} else {
    echo "Σφάλμα κατά τη διαγραφή της εργασίας: " . $conn->error;
}

$conn->close();

// Ανακατεύθυνση πίσω στη σελίδα εργασιών
header("Location: homework_tutor.php");
exit();
?>
