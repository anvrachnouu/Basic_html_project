<?php
// Σύνδεση με τη βάση δεδομένων
$conn = new mysqli("localhost", "root", "", "student3987.sql");

// Έλεγχος σύνδεσης
if ($conn->connect_error) {
    die("Σφάλμα σύνδεσης: " . $conn->connect_error);
}

// Λήψη του ID της εργασίας που θα επεξεργαστεί
$id = $_GET['id'];

// Ανάκτηση των δεδομένων της εργασίας από τη βάση δεδομένων
$sql = "SELECT * FROM assigments WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Η εργασία δεν βρέθηκε.";
    exit();
}

// Επεξεργασία της φόρμας όταν υποβληθεί
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $goals = $_POST['goals'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];

    // Ενημέρωση της εργασίας στη βάση δεδομένων
    $sql = "UPDATE assigments SET goals='$goals', description='$description', due_date='$due_date' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Η εργασία ενημερώθηκε επιτυχώς.";
    } else {
        echo "Σφάλμα κατά την ενημέρωση της εργασίας: " . $conn->error;
    }

    // Ανακατεύθυνση πίσω στη σελίδα εργασιών
    header("Location: homework_tutor.php");
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
    <title>Επεξεργασία Εργασίας</title>
</head>
<body>

<h2>Επεξεργασία Εργασίας</h2>

<form method="post" action="edit_homework.php?id=<?php echo $id; ?>">
    Στόχοι: <textarea name="goals" rows="5" cols="40" required><?php echo htmlspecialchars($row['goals']); ?></textarea><br><br>
    Εκφώνηση: <textarea name="description" rows="5" cols="40" required><?php echo htmlspecialchars($row['description']); ?></textarea><br><br>
    Ημερομηνία Παράδοσης: <input type="date" name="due_date" value="<?php echo $row['due_date']; ?>" required><br><br>
    <input type="submit" value="Ενημέρωση Εργασίας">
</form>

<a href="homework_tutor.php">Επιστροφή στις Εργασίες</a>

</body>
</html>
