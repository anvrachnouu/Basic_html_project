<?php
// Σύνδεση με τη βάση δεδομένων
$conn = new mysqli("localhost", "root", "", "student3987.sql");

// Έλεγχος σύνδεσης
if ($conn->connect_error) {
    die("Σφάλμα σύνδεσης: " . $conn->connect_error);
}

// Ανάκτηση όλων των εγγράφων από τη βάση δεδομένων
$sql = "SELECT * FROM documents ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Έγραφα μαθήματος</title>
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

        .action-links {
            font-size: 0.9em;
        }

        .announcement-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline; /* Αλλαγή από center σε baseline */
        }

        .right-align {
            text-align: right;
            margin-top: 20px;
        }

        .document-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .document-title {
            margin: 0;
            color: MediumSeaGreen;
        }
    </style>
</head>
<body>

    <div class="container">
        <div id="header">
            <h1>Έγραφα μαθήματος</h1>
        </div>

        <div id="content">
            <div class="column">
                <!-- Περιεχόμενο πρώτης στήλης -->
                <div>
                    <div>
                        <p><a href="index_tutor.php">Αρχική σελίδα</a></p>
                        <p><a href="announcement_tutor.php">Ανακοινώσεις</a></p>
                        <p><a href="communication_tutor.php">Επικοινωνία</a></p>
                        <p><a href="documents_tutor.php">Έγραφα μαθήματος</a></p>
                        <p><a href="homework_tutor.php">Εργασίες</a></p>
                    </div>
                </div>
            </div>

            <div class="main-column">
                <!-- Σύνδεσμος για προσθήκη νέου εγγράφου -->
                <div>
                    <p><a href="add_documents.php">Προσθήκη νέου εγγράφου</a></p>
                    <hr>
                </div>

                <!-- Δυναμικά περιεχόμενα εγγράφων από τη βάση δεδομένων -->
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div>";
                        echo "<div class='document-header'>";
                        echo "<h2 class='document-title'>" . htmlspecialchars($row['title']) . "</h2>";
                        echo "<span class='action-links'>";
                        echo "<a href='edit_documents.php?id=" . $row['id'] . "'>Επεξεργασία</a> | ";
                        echo "<a href='delete_documents.php?id=" . $row['id'] . "' onclick=\"return confirm('Είστε σίγουροι ότι θέλετε να διαγράψετε αυτό το έγγραφο;')\">Διαγραφή</a>";
                        echo "</span>";
                        echo "</div>";
                        echo "<p class='indented-paragraph'><em>Περιγραφή:</em> " . htmlspecialchars($row['description']) . "</p>";
                        echo "<p class='indented-paragraph'><a href='uploads/" . htmlspecialchars($row['file_name']) . "' download>Download</a></p>";
                        echo "<hr>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Δεν υπάρχουν νέα έγγραφα.</p>";
                }
                ?>
                
                <div class="main-column">
                    <!-- Περιεχόμενο δεύτερης στήλης -->
                    <div>
                        <h2 class="assignment-title" style="color: MediumSeaGreen;">Τίτλος εγγράφου 1</h2>
                        <p class="indented-paragraph"><em>Περιγραφή:</em> <Περιγραφή του περιεχομένου></p>
                    </div>
                    <p class="indented-paragraph"><a href="ergasia1.doc" download>download</a></p>
                    <hr>
                    <div>
                        <h2 class="assignment-title" style="color: MediumSeaGreen;">Τίτλος εγγράφου 2</h2>
                        <p class="indented-paragraph"><em>Περιγραφή:</em> <Περιγραφή του περιεχομένου></p>
                    </div>
                    <p class="indented-paragraph"><a href="ergasia2.doc" download>download</a></p>
                    <hr>
                    <div class="right-align">
                        <a href="documents_tutor.php">top</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<?php
$conn->close();
?>
