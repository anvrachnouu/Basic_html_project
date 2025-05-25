<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Επικοινωνία</title>
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
            text-indent: 50px;
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
            <h1>Επικοινωνία</h1>
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
                    <p>Η συγκεκριμένη ιστοσελίδα θα περιέχει δύο δυνατότητες για την αποστολή e-mail στον καθηγητή:</p>
                    <p>• Μέσω web φόρμας</p>
                    <p>• Με χρήση e-mail διεύθυνσης</p>

                    <h2 style="color: MediumSeaGreen;">Αποστολή e-mail μέσω web φόρμας</h2>
                    <form id="emailForm" method="post" action="send_email.php">
                        <p class="indented-paragraph"><b>Αποστολέας:</b> <input type="text" id="username" name="username" required></p>
                        <p class="indented-paragraph"><b>Θέμα:</b> <input type="text" id="subject" name="subject" required></p>
                        <p class="indented-paragraph"><b>Κείμενο:</b> <textarea id="message" name="message" rows="5" cols="40" required></textarea></p>
                        <p class="indented-paragraph"><input type="submit" value="Αποστολή"></p>
                    </form>

                    <div id="result"></div> <!-- Εδώ θα εμφανίζεται το αποτέλεσμα της αποστολής -->
                </div>

                <hr>

                <div>
                    <h2 class="assignment-title" style="color: MediumSeaGreen;">Αποστολή e-mail με χρήση e-mail διεύθυνσης</h2>
                    <p class="indented-paragraph">Εναλλακτικά μπορείτε να αποστείλετε e-mail στην παρακάτω διεύθυνση ηλεκτρονικού ταχυδρομείου <a href="mailto:tutor@csd.auth.test.gr?subject=Αποστολή%20email&body=">tutor@csd.auth.test.gr</a></p>
                </div>

                <hr> 

                <div class="right-align">
                    <a href="communication_tutor.php">top</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('emailForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Αποτροπή της προεπιλεγμένης υποβολής της φόρμας
            
            const formData = new FormData(this);
            
            fetch('send_email.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Εμφάνιση του αποτελέσματος
                const resultDiv = document.getElementById('result');
                if (data.status === 'success') {
                    resultDiv.style.color = 'green';
                } else {
                    resultDiv.style.color = 'red';
                }
                resultDiv.textContent = data.message;
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('result').textContent = "Παρουσιάστηκε σφάλμα κατά την αποστολή.";
            });
        });
    </script>
</body>
</html>
