<!DOCTYPE html>
<html lang="en">
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

        .right-align {
            text-align: right;
            margin-top: 20px;
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
                        <p><a href="index_student.php">Αρχική σελίδα</a></p>
                        <p><a href="announcement_student.php">Ανακοινώσεις</a></p>
                        <p><a href="communication_student.php">Επικοινωνία</a></p>
                        <p><a href="documents_student.php">Έγραφα μαθήματος</a></p>
                        <p><a href="homework_student.php">Εργασίες</a></p>
                    </div>
                </div>
            </div>

            <div class="main-column">
                <!-- Περιεχόμενο δεύτερης στήλης -->
                <div>
				    <h2 class="assignment-title" style="color: MediumSeaGreen;">Τίτλος εγγράφου 1</h2>

                    <p class="indented-paragraph" > <em> Περιγραφή: </em> <Περιγραφή του περιεχομένου> </p>
                </div>

                <p class="indented-paragraph">  <a href="ergasia1.doc" download>download</a> </p>
				
				<hr>
				
				<div>
				    <h2 class="assignment-title" style="color: MediumSeaGreen;">Τίτλος εγγράφου 2</h2>

                    <p class="indented-paragraph" > <em> Περιγραφή: </em> <Περιγραφή του περιεχομένου> </p>
                </div>
				
				<p class="indented-paragraph">  <a href="ergasia2.doc" download>download</a> </p>
                
				<hr>
                
				<div class="right-align">
					<a href = "documents_student.php" > top </a>
				</div>
            </div>
        </div>
    </div>

</body>
</html>