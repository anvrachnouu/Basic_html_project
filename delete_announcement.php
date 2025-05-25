<?php
// Σύνδεση με τη βάση δεδομένων
$conn = new mysqli("localhost", "root", "", "student3987.sql");

// Έλεγχος σύνδεσης
if ($conn->connect_error) {
    die("Σφάλμα σύνδεσης: " . $conn->connect_error);
}

// Έλεγχος αν το ID έχει δοθεί μέσω GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Εντολή SQL για τη διαγραφή της ανακοίνωσης
    $sql = "DELETE FROM announcements WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Η ανακοίνωση διαγράφηκε επιτυχώς.";
    } else {
        echo "Σφάλμα κατά τη διαγραφή της ανακοίνωσης: " . $conn->error;
    }
} else {
    echo "Δεν έχει δοθεί ID ανακοίνωσης για διαγραφή.";
}

// Κλείσιμο σύνδεσης
$conn->close();

// Ανακατεύθυνση πίσω στη σελίδα των ανακοινώσεων
header("Location: announcement_tutor.php");
exit();
?>
