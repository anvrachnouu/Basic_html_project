<?php
// Σύνδεση με τη βάση δεδομένων
$conn = new mysqli("localhost", "root", "", "student3987.sql");

// Έλεγχος σύνδεσης
if ($conn->connect_error) {
    die("Σφάλμα σύνδεσης: " . $conn->connect_error);
}

// Επεξεργασία της φόρμας όταν υποβληθεί
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $goals = $_POST['goals'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $file_name = $_POST['file_name']; // Η εκφώνηση ως κείμενο

    // Εισαγωγή νέας εργασίας στη βάση δεδομένων
    $sql = "INSERT INTO assigments (goals, file_name, description, due_date) VALUES ('$goals', '$file_name', '$description', '$due_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Νέα εργασία προστέθηκε επιτυχώς.";
    } else {
        echo "Σφάλμα: " . $sql . "<br>" . $conn->error;
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
    <title>Προσθήκη Νέας Εργασίας</title>
</head>
<body>

<h2>Προσθήκη Νέας Εργασίας</h2>

<form method="post" action="add_homework.php">
    Στόχοι: <textarea name="goals" rows="5" cols="40" required></textarea><br><br>
    Εκφώνηση: <textarea name="file_name" rows="5" cols="40" required></textarea><br><br>
    Παραδοτέα: <textarea name="description" rows="5" cols="40" required></textarea><br><br>
    Ημερομηνία Παράδοσης: <input type="date" name="due_date" required><br><br>
    <input type="submit" value="Προσθήκη Εργασίας">
</form>

<a href="homework_tutor.php">Επιστροφή στις Εργασίες</a>

</body>
</html>
