<?php
// Σύνδεση με τη βάση δεδομένων
$conn = new mysqli("localhost", "root", "", "student3987.sql");

// Έλεγχος σύνδεσης
if ($conn->connect_error) {
    die("Σφάλμα σύνδεσης: " . $conn->connect_error);
}

// Ανάκτηση όλων των εργασιών από τη βάση δεδομένων
$sql = "SELECT * FROM assigments ORDER BY due_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Εργασίες</title>
    <style>
	     body {
            font-family: 'Times New Roman', serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            width: 75%;
            margin: auto;
        }

        #header {
            padding: 1em;
            text-align: center;
        }

        #content {
            display: flex;
            justify-content: space-between;
            padding: 1em;
        }

        .column {
            width: 20%;
            padding: 10px;
        }

        .column a {
            display: block;
            margin: 10px 0;
            text-decoration: none;
            color: purple;
        }

        .main-column {
            width: 75%;
            padding-left: 20px;
        }

        .assignment-title {
            color: MediumSeaGreen;
            font-weight: bold;
            font-size: 1.2em;
            margin-bottom: 10px;
            position: relative;
        }

        .action-links {
            position: absolute;
            top: 0;
            right: 0;
            font-size: 0.8em;
        }

        .assignment-content {
            margin-bottom: 20px;
        }

        .assignment-content p {
            margin: 5px 0;
            text-indent: 50px;
        }

        .assignment-content ol {
            margin-left: 70px;
        }

        .assignment-deadline {
            color: red;
            font-weight: bold;
        }

        hr {
            border: 1px solid #ccc;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .right-align {
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div id="header">
            <h1>Εργασίες</h1>
        </div>

        <div id="content">
            <div class="column">
                <div>
                    <p><a href="index_tutor.php">Αρχική σελίδα</a></p>
                    <p><a href="announcement_tutor.php">Ανακοινώσεις</a></p>
                    <p><a href="communication_tutor.php">Επικοινωνία</a></p>
                    <p><a href="documents_tutor.php">Έγραφα μαθήματος</a></p>
                    <p><a href="homework_tutor.php">Εργασίες</a></p>
                </div>
            </div>

            <div class="main-column">
                <div>
                    <p><a href="add_homework.php">Προσθήκη νέας εργασίας</a></p>
                    <hr>
                </div>

                <!-- Δυναμικές Εργασίες από τη βάση δεδομένων -->
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='assignment-content'>";
                        echo "<h2 class='assignment-title' style='color: MediumSeaGreen;'>Εργασία " . htmlspecialchars($row['id']);
                        echo "<span class='action-links'>";
                        echo "<a href='edit_homework.php?id=" . $row['id'] . "'>Επεξεργασία</a> | ";
                        echo "<a href='delete_homework.php?id=" . $row['id'] . "' onclick='return confirm(\"Είστε σίγουροι ότι θέλετε να διαγράψετε αυτή την εργασία;\");'>Διαγραφή</a>";
                        echo "</span>";
                        echo "</h2>";

                        // Στόχοι
                        echo "<p>Στόχοι: Οι στόχοι της εργασίας είναι:</p>";
                        echo "<ol>";
                        $goals = explode("\n", $row['goals']);
                        foreach ($goals as $goal) {
                            echo "<li>" . htmlspecialchars($goal) . "</li>";
                        }
                        echo "</ol>";

                        // Εκφώνηση
                        echo "<p class='indented-paragraph'><em>Εκφώνηση:</em></p>";
                        echo "<p><span style='display: block; margin-left: 30px;'>" . htmlspecialchars($row['description']) . "</span></p>";

                        // Παραδοτέα
                        echo "<p><em>Παραδοτέα:</em></p>";
                        echo "<ol>";
                        $deliverables = explode("\n", $row['description']);
                        foreach ($deliverables as $deliverable) {
                            echo "<li>" . htmlspecialchars($deliverable) . "</li>";
                        }
                        echo "</ol>";

                        // Ημερομηνία Παράδοσης
                        echo "<p class='assignment-deadline'><b>Ημερομηνία παράδοσης:</b> " . htmlspecialchars($row['due_date']) . "</p>";

                        // Εισαγωγή ανακοίνωσης στη βάση δεδομένων
                        $announcement_subject = "Υποβλήθηκε η εργασία " . htmlspecialchars($row['id']);
                        $announcement_content = "Η ημερομηνία παράδοσης της εργασίας είναι " . htmlspecialchars($row['due_date']);
                        $announcement_date = date('Y-m-d');

                        $insert_announcement_sql = "INSERT INTO announcements (date, subject, content) VALUES ('$announcement_date', '$announcement_subject', '$announcement_content')";
                        $conn->query($insert_announcement_sql);

                        echo "<hr>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Δεν υπάρχουν νέες εργασίες.</p>";
                }
                ?>

                <!-- Στατικό περιεχόμενο εργασιών -->
                <div class="assignment-content">
                    <h2 class="assignment-title">Εργασία 1</h2>
                    <p>Στόχοι: Οι στόχοι της εργασίας είναι:</p>
                    <ol>
                        <li>Στόχος 1</li>
                        <li>Στόχος 2</li>
                    </ol>
                    <p class='indented-paragraph'><em>Εκφώνηση:</em></p>
                    <p><span style="display: block; margin-left: 30px;">Κατεβάστε την εκφώνηση της εργασίας από <a href="ergasia1.doc" download>εδώ</a></p>

                    <p><em>Παραδοτέα:</em></p>
                    <ol>
                        <li>Γραπτή αναφορά σε Word</li>
                        <li>Παρουσίαση σε PowerPoint</li>
                    </ol>
                    <p class="assignment-deadline"><b>Ημερομηνία παράδοσης:</b> 12/5/2009</p>
                </div>

                <hr>

                <div class="assignment-content">
                    <h2 class="assignment-title">Εργασία 2</h2>
                    <p>Στόχοι: Οι στόχοι της εργασίας είναι:</p>
                    <ol>
                        <li>Στόχος 1</li>
                        <li>Στόχος 2</li>
                    </ol>
                    <p class='indented-paragraph'><em>Εκφώνηση:</em></p>
                    <p><span style="display: block; margin-left: 30px;">Κατεβάστε την εκφώνηση της εργασίας από <a href="ergasia2.doc" download>εδώ</a></p>

                    <p><em>Παραδοτέα:</em></p>
                    <ol>
                        <li>Γραπτή αναφορά σε Word</li>
                        <li>Παρουσίαση σε PowerPoint</li>
                    </ol>
                    <p class="assignment-deadline"><b>Ημερομηνία παράδοσης:</b> 15/5/2009</p>
                </div>

                <hr>
                <div class="right-align">
                    <a href="homework_tutor.php">top</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<?php
$conn->close();
?>
