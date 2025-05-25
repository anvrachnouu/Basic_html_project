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

    // Ανάκτηση των στοιχείων της ανακοίνωσης από τη βάση δεδομένων
    $sql = "SELECT * FROM announcements WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $date = $row['date'];
        $subject = $row['subject'];
        $content = $row['content'];
    } else {
        echo "Η ανακοίνωση δεν βρέθηκε.";
        exit();
    }
} else {
    echo "Δεν έχει δοθεί ID ανακοίνωσης για επεξεργασία.";
    exit();
}

// Επεξεργασία της φόρμας όταν υποβληθεί
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];

    // Ενημέρωση της ανακοίνωσης στη βάση δεδομένων
    $sql = "UPDATE announcements SET date='$date', subject='$subject', content='$content' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Η ανακοίνωση ενημερώθηκε επιτυχώς.";
    } else {
        echo "Σφάλμα κατά την ενημέρωση της ανακοίνωσης: " . $conn->error;
    }

    // Ανακατεύθυνση πίσω στη σελίδα των ανακοινώσεων
    header("Location: announcement_tutor.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Επεξεργασία Ανακοίνωσης</title>
</head>
<body>

<h2>Επεξεργασία Ανακοίνωσης</h2>

<form method="post" action="">
    Ημερομηνία: <input type="date" name="date" value="<?php echo $date; ?>" required><br><br>
    Θέμα: <input type="text" name="subject" value="<?php echo $subject; ?>" required><br><br>
    Περιεχόμενο: <textarea name="content" rows="5" cols="40" required><?php echo $content; ?></textarea><br><br>
    <input type="submit" value="Ενημέρωση Ανακοίνωσης">
</form>

<a href="announcement_tutor.php">Επιστροφή στις Ανακοινώσεις</a>

</body>
</html>
