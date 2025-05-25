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
    </style>
</head>
<body>

    <div class="container">
        <div id="header">
            <h1>Επικοινωνία</h1>
        </div>

        <div id="content">
            <div class="column">
                <!-- Περιεχόμενο πρώτης στήλης -->
                <div>
                    <p><a href="index_student.php">Αρχική σελίδα</a></p>
                    <p><a href="announcement_student.php">Ανακοινώσεις</a></p>
                    <p><a href="communication_student.php">Επικοινωνία</a></p>
                    <p><a href="documents_student.php">Έγραφα μαθήματος</a></p>
                    <p><a href="homework_student.php">Εργασίες</a></p>
                </div>
            </div>

            <div class="main-column">
                <!-- Περιεχόμενο δεύτερης στήλης -->
                <div>
                    <p>Η συγκεκριμένη ιστοσελίδα θα περιέχει δύο δυνατότητες για την αποστολή e-mail στον καθηγητή:</p>
                    <p>• Μέσω web φόρμας</p>
                    <p>• Με χρήση e-mail διεύθυνσης</p>

                    <h2 style="color: MediumSeaGreen;">Αποστολή e-mail μέσω web φόρμας</h2>
                    <form method="post" action="send_email.php">
                        <p class="indented-paragraph"><b>Αποστολέας:</b> <input type="text" id="username" name="username" required></p>
                        <p class="indented-paragraph"><b>Θέμα:</b> <input type="text" id="subject" name="subject" required></p>
                        <p class="indented-paragraph"><b>Κείμενο:</b> <textarea id="message" name="message" rows="5" cols="40" required></textarea></p>
                        <p class="indented-paragraph"><input type="submit" value="Αποστολή"></p>
                    </form>
                </div>

                <hr>

                <div>
                    <h2 class="assignment-title" style="color: MediumSeaGreen;">Αποστολή e-mail με χρήση e-mail διεύθυνσης</h2>
                    <p class="indented-paragraph">Εναλλακτικά μπορείτε να αποστείλετε e-mail στην παρακάτω διεύθυνση ηλεκτρονικού ταχυδρομείου <a href="mailto:tutor@csd.auth.test.gr?subject=Αποστολή%20email&body=">tutor@csd.auth.test.gr</a></p>
                </div>

                <hr> 

                <div class="right-align">
                    <a href="communication_student.php">top</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

