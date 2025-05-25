<?php
// Σύνδεση με τη βάση δεδομένων
$conn = new mysqli("localhost", "root", "", "student3987.sql");

// Έλεγχος σύνδεσης
if ($conn->connect_error) {
    die("Σφάλμα σύνδεσης: " . $conn->connect_error);
}

// Έλεγχος αν έχει δοθεί το ID του εγγράφου προς επεξεργασία
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ανάκτηση των τρεχουσών πληροφοριών του εγγράφου
    $sql = "SELECT * FROM documents WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Το έγγραφο δεν βρέθηκε.");
    }
} else {
    die("Μη έγκυρο αίτημα.");
}

// Επεξεργασία της φόρμας όταν υποβληθεί
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $file_name = basename($_FILES['file_name']['name']);
    
    if ($file_name) {
        // Καθορισμός του φακέλου αποθήκευσης
        $target_directory = "uploads/";
        $target_file = $target_directory . $file_name;

        // Διαγραφή του παλιού αρχείου
        $old_file_path = "uploads/" . $row['file_name'];
        if (file_exists($old_file_path)) {
            unlink($old_file_path);
        }

        // Μετακίνηση του νέου ανεβασμένου αρχείου στον κατάλληλο φάκελο
        move_uploaded_file($_FILES['file_name']['tmp_name'], $target_file);
    } else {
        $file_name = $row['file_name'];
    }

    // Ενημέρωση του εγγράφου στη βάση δεδομένων
    $sql = "UPDATE documents SET title='$title', description='$description', file_name='$file_name' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Το έγγραφο ενημερώθηκε επιτυχώς.";
        header("Location: documents_tutor.php");
        exit();
    } else {
        echo "Σφάλμα: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Επεξεργασία Εγγράφου</title>
</head>
<body>

<h2>Επεξεργασία Εγγράφου</h2>

<form method="post" action="" enctype="multipart/form-data">
    Τίτλος: <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required><br><br>
    Περιγραφή: <textarea name="description" rows="5" cols="40" required><?php echo htmlspecialchars($row['description']); ?></textarea><br><br>
    Επιλογή Αρχείου: <input type="file" name="file_name"><br><br>
    <input type="submit" value="Ενημέρωση Εγγράφου">
</form>

<a href="documents_tutor.php">Επιστροφή στα Έγγραφα</a>

</body>
</html>
