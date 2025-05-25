<?php
// Σύνδεση με τη βάση δεδομένων
$conn = new mysqli("localhost", "root", "", "student3987.sql");

// Έλεγχος σύνδεσης
if ($conn->connect_error) {
    die("Σφάλμα σύνδεσης: " . $conn->connect_error);
}

// Επεξεργασία της φόρμας όταν υποβληθεί
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];

    // Εισαγωγή νέας ανακοίνωσης στη βάση δεδομένων
    $sql = "INSERT INTO announcements (date, subject, content) VALUES ('$date', '$subject', '$content')";

    if ($conn->query($sql) === TRUE) {
        echo "Νέα ανακοίνωση προστέθηκε επιτυχώς.";
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
    <title>Προσθήκη Ανακοίνωσης</title>
</head>
<body>

<h2>Προσθήκη Νέας Ανακοίνωσης</h2>

<form method="post" action="add_announcement.php">
    Ημερομηνία: <input type="date" name="date" required><br><br>
    Θέμα: <input type="text" name="subject" required><br><br>
    Περιεχόμενο: <textarea name="content" rows="5" cols="40" required></textarea><br><br>
    <input type="submit" value="Προσθήκη Ανακοίνωσης">
</form>

<a href="announcement_tutor.php">Επιστροφή στις Ανακοινώσεις</a>

</body>
</html>
