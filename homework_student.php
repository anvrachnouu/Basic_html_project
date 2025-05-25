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
        }

        .assignment-content {
            margin-bottom: 20px;
        }

        .assignment-content p {
            margin: 5px 0;
            text-indent: 50px; /* Ρύθμιση εσοχής για παραγράφους */
        }

        .assignment-content ol {
            margin-left: 70px; /* Ρύθμιση εσοχής για λίστες */
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
                <div >
                    
		
            <div class="assignment-content">
                <h2 class="assignment-title">Εργασία 1</h2>
                <p>Στόχοι: Οι στόχοι της εργασίας είναι:</p>
                <ol>
                    <li>Στόχος 1</li>
                    <li>Στόχος 2</li>
                    <li>...</li>
                </ol>
               <p class ='indented-paragraph' > 
				<em>Εκφώνηση:</em> </p>
                    <p> <span style="display: block; margin-left: 30px;">Κατεβάστε την εκφώνηση της εργασίας από <a href="ergasia1.doc" download>εδώ</a> </p>
                
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
                    <li>...</li>
                </ol>
				<p class ='indented-paragraph' > 
				<em>Εκφώνηση:</em> </p>
                    <p> <span style="display: block; margin-left: 30px;">Κατεβάστε την εκφώνηση της εργασίας από <a href="ergasia2.doc" download>εδώ</a> </p>
                <p><em>Παραδοτέα:</em></p>
                <ol>
                    <li>Γραπτή αναφορά σε Word</li>
                    <li>Παρουσίαση σε PowerPoint</li>
                </ol>
                <p class="assignment-deadline"><b>Ημερομηνία παράδοσης:</b> 15/5/2009</p>
            </div>

            <hr>
             
				<div class="right-align">
                    <a href = "homework_student.php">top</a>
                </div>
                
            </div>
        </div>
    </div>

</body>
</html>
