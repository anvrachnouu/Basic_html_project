<?php
// Ξεκίνημα session
session_start();

// Συμπερίληψη του αρχείου σύνδεσης με τη βάση δεδομένων
include 'db_connection.php';

$error_message = ''; // Αρχικοποίηση μεταβλητής μηνύματος σφάλματος

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginame = $_POST['loginame'];
    $password = $_POST['password'];

    // Ερώτημα για έλεγχο των στοιχείων
    $sql = "SELECT * FROM users WHERE email='$loginame' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Ο χρήστης υπάρχει, οπότε κάνουμε login
        $row = $result->fetch_assoc();
        $_SESSION['loginame'] = $loginame;
        $_SESSION['role'] = $row['role'];

        // Ανακατεύθυνση ανάλογα με τον ρόλο
        if ($row['role'] == 'Tutor') {
            header("Location: index_tutor.php"); // Σελίδα για Tutors
            exit();
        } elseif ($row['role'] == 'Student') {
            header("Location: index_student.php"); // Σελίδα για Students
            exit();
        } else {
            header("Location: index.html"); // Κεντρική Σελίδα για άλλους ρόλους
            exit();
        }
    } else {
        $error_message = "Λάθος όνομα χρήστη ή κωδικός πρόσβασης"; // Θέτουμε το μήνυμα σφάλματος
    }
}
?>

<!-- HTML Κώδικας για τη φόρμα εισόδου -->
<!DOCTYPE html>
<html>
<head>
    <title>Σελίδα Πιστοποίησης</title>
    <style>
        /* Στυλ για το σώμα και το κέντρο της φόρμας */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .login-container {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            text-align: center;
        }
        .login-container label {
            display: block;
            margin-top: 10px;
        }
        .login-container input[type="text"], 
        .login-container input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            margin-top: 20px;
            cursor: pointer;
        }
        .login-container input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        .error-message {
            color: red;
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Πιστοποίηση</h2>
    <form method="post" action="login.php">
        <label for="loginame">Login</label>
        <input type="text" id="loginame" name="loginame" required><br>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
    <!-- Εμφάνιση μηνύματος σφάλματος -->
    <?php if (!empty($error_message)): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>
</div>

</body>
</html>
