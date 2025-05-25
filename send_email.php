<?php
// Συμπεριλάβετε το αρχείο σύνδεσης με τη βάση δεδομένων
include('db_connection.php');

session_start();

// Έλεγχος αν η φόρμα υποβλήθηκε και ο χρήστης είναι συνδεδεμένος
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['role'] == 'tutor') {
    $sender = $_SESSION['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Ανάκτηση των email και ονομάτων των tutors από τη βάση δεδομένων
    $sql = "SELECT email, first_name, last_name FROM users WHERE role = 'tutor'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Διαμόρφωση των email παραληπτών και αποθήκευση των ονομάτων
        $recipients = [];
        $names = [];
        while ($row = $result->fetch_assoc()) {
            $recipients[] = $row['email'];
            $names[] = $row['first_name'] . " " . $row['last_name'];
        }

        // Προετοιμασία του email
        $to = implode(",", $recipients);
        $headers = "From: " . $sender;

        // Αποστολή του email
        if (mail($to, $subject, $message, $headers)) {
            // Αν επιτυχής αποστολή, επιστροφή του μηνύματος με τα ονόματα
            echo json_encode([
                'status' => 'success',
                'message' => "Το email στάλθηκε επιτυχώς στους: " 
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => "Παρουσιάστηκε πρόβλημα κατά την αποστολή του email.". implode(", ", $names) . "."
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => "Δεν βρέθηκαν χρήστες με ρόλο tutor."
        ]);
    }
}
?>
