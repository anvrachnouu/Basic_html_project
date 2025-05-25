<?php
// Σύνδεση με τη βάση δεδομένων
$conn = new mysqli("localhost", "root", "", "student3987.sql");

// Έλεγχος σύνδεσης
if ($conn->connect_error) {
    die("Σφάλμα σύνδεσης: " . $conn->connect_error);
}

// Επεξεργασία της φόρμας όταν υποβληθεί
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $file_name = $_FILES['file_name']['name'];

    // Καθορισμός του φακέλου αποθήκευσης
    $target_directory = "uploads/";
    $target_file = $target_directory . basename($file_name);

    // Μετακίνηση του ανεβασμένου αρχείου στον κατάλληλο φάκελο (π.χ. 'uploads/')
    if (move_uploaded_file($_FILES['file_name']['tmp_name'], $target_file)) {
        // Εισαγωγή νέου εγγράφου στη βάση δεδομένων
        $sql = "INSERT INTO documents (title, description, file_name) VALUES ('$title', '$description', '$file_name')";

        if ($conn->query($sql) === TRUE) {
            echo "Νέο έγγραφο προστέθηκε επιτυχώς.";
            // Ανακατεύθυνση πίσω στη σελίδα documents_tutor.php για εμφάνιση του νέου εγγράφου
            header("Location: documents_tutor.php");
            exit();
        } else {
            echo "Σφάλμα: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Σφάλμα κατά την αποστολή του αρχείου.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Προσθήκη Νέου Εγγράφου</title>
</head>
<body>

<h2>Προσθήκη Νέου Εγγράφου</h2>

<form method="post" action="add_documents.php" enctype="multipart/form-data">
    Τίτλος: <input type="text" name="title" required><br><br>
    Περιγραφή: <textarea name="description" rows="5" cols="40" required></textarea><br><br>
    Επιλογή Αρχείου: <input type="file" name="file_name" required><br><br>
    <input type="submit" value="Προσθήκη Εγγράφου">
</form>

<a href="documents_tutor.php">Επιστροφή στα Έγγραφα</a>

</body>
</html>

      
