
<?php
// Σύνδεση με τη βάση δεδομένων
$conn = new mysqli("localhost", "root", "", "student3987.sql");

// Έλεγχος σύνδεσης
if ($conn->connect_error) {
    die("Σφάλμα σύνδεσης: " . $conn->connect_error);
}

// Εκτέλεση του SQL ερωτήματος
$sql = "SELECT * FROM announcements ORDER BY date DESC";
$result = $conn->query($sql);

// Έλεγχος αν το ερώτημα εκτελέστηκε επιτυχώς
if (!$result) {
    die("Σφάλμα στο SQL ερώτημα: " . $conn->error);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ανακοινώσεις</title>
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

        .indented-paragraph {
            text-indent: 50px; /* Ρύθμιση εσοχής για παραγράφους */
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

        /* Νέο CSS για την τοποθέτηση των links */
        .announcement-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline; /* Αλλαγή από center σε baseline */
        }

        .action-links {
            font-size: 0.9em;
        }
    </style>
</head>
<body>

    <div class="container">
        <div id="header">
            <h1>Ανακοινώσεις</h1>
        </div>

        <div id="content">
            <div class="column">
                <!-- Περιεχόμενο πρώτης στήλης -->
                <div>
                    <p><a href="index_tutor.php">Αρχική σελίδα</a></p>
                    <p><a href="announcement_tutor.php">Ανακοινώσεις</a></p>
                    <p><a href="communication_tutor.php">Επικοινωνία</a></p>
                    <p><a href="documents_tutor.php">Έγραφα μαθήματος</a></p>
                    <p><a href="homework_tutor.php">Εργασίες</a></p>
                </div>
            </div>

            <div class="main-column">
                <!-- Σύνδεσμος για προσθήκη νέας ανακοίνωσης -->
                <div>
                    <p><a href="add_announcement.php">Προσθήκη νέας ανακοίνωσης</a></p>
                    <hr>
                </div>

                <!-- Δυναμικές Ανακοινώσεις από τη βάση δεδομένων -->
                <?php
                if ($result->num_rows > 0) {
    // Εμφάνιση των ανακοινώσεων
    while($row = $result->fetch_assoc()) {
        // Κώδικας για εμφάνιση κάθε ανακοίνωσης
        echo "<div>";
        echo "<div class='announcement-header'>";
        echo "<h2 class='assignment-title' style='color: MediumSeaGreen;'>Ανακοίνωση " . $row['id'] . "</h2>";
        echo "<span class='action-links'>";
        echo "<a href='edit_announcement.php?id=" . $row['id'] . "'>Επεξεργασία</a> | ";
        echo "<a href='delete_announcement.php?id=" . $row['id'] . "' onclick='return confirm(\"Είστε σίγουροι ότι θέλετε να διαγράψετε αυτή την ανακοίνωση;\");'>Διαγραφή</a>";
        echo "</span>";
        echo "</div>";
        echo "<p class='indented-paragraph'><b>Ημερομηνία:</b> " . $row['date'] . "</p>";
        echo "<p class='indented-paragraph'><b>Θέμα:</b> " . $row['subject'] . "</p>";
        echo "<p class='indented-paragraph'>" . $row['content'] . "</p>";
        echo "<hr>";
        echo "</div>";
    }
} else {
    echo "<p>Δεν υπάρχουν ανακοινώσεις.</p>";
}
                ?>

                <!-- Στατικό Περιεχόμενο Ανακοινώσεων -->
                <div>
                    <h2 class="assignment-title" style="color: MediumSeaGreen;">Ανακοίνωση 1</h2>
                    <p class="indented-paragraph"><b>Ημερομηνία:</b> 12/12/2008</p>
                    <p class="indented-paragraph"><b>Θέμα:</b> Έναρξη μαθημάτων</p>
                    <p class="indented-paragraph">Τα μαθήματα αρχίζουν την Δευτέρα 17/12/2008</p>
                </div>
                
                <hr>
                
                <div>
                    <h2 class="assignment-title" style="color: MediumSeaGreen;">Ανακοίνωση 2</h2>
                    <p class="indented-paragraph"><b>Ημερομηνία:</b> 15/12/2008</p>
                    <p class="indented-paragraph"><b>Θέμα:</b> Ανάρτηση εργασίας</p>
                    <p class="indented-paragraph">
                        Η 1η εργασία έχει ανακοινωθεί στην ιστοσελίδα <a href="homework.html">Εργασίες</a>. Τα μαθήματα αρχίζουν την Δευτέρα 17/12/2008
                    </p>
                </div>
                
                <hr>
                
                <div class="right-align">
                    <a href="announcement_tutor.php">top</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<?php
$conn->close();
?>
