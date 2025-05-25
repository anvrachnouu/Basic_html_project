<?php
// Σύνδεση με τη βάση δεδομένων
$conn = new mysqli("localhost", "root", "", "student3987.sql");

// Έλεγχος σύνδεσης
if ($conn->connect_error) {
    die("Σφάλμα σύνδεσης: " . $conn->connect_error);
}

// Έλεγχος αν έχει δοθεί το ID του εγγράφου προς διαγραφή
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ανάκτηση του ονόματος του αρχείου από τη βάση δεδομένων
    $sql = "SELECT file_name FROM documents WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $file_name = $row['file_name'];

        // Διαγραφή του αρχείου από τον φάκελο 'uploads'
        $file_path = "uploads/" . $file_name;
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Διαγραφή του εγγράφου από τη βάση δεδομένων
        $sql = "DELETE FROM documents WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "Το έγγραφο διαγράφηκε επιτυχώς.";
        } else {
            echo "Σφάλμα κατά τη διαγραφή του εγγράφου: " . $conn->error;
        }
    } else {
        echo "Το έγγραφο δεν βρέθηκε.";
    }
} else {
    echo "Μη έγκυρο αίτημα.";
}

$conn->close();

// Ανακατεύθυνση πίσω στη σελίδα documents_tutor.php
header("Location: documents_tutor.php");
exit();
?>
