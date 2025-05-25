-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 21 Σεπ 2024 στις 15:11:43
-- Έκδοση διακομιστή: 10.4.32-MariaDB
-- Έκδοση PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `student3987.sql`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `announcements`
--

CREATE TABLE `announcements` (
  `id` int(50) NOT NULL,
  `date` date NOT NULL,
  `subject` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `announcements`
--

INSERT INTO `announcements` (`id`, `date`, `subject`, `content`) VALUES
(3, '2024-12-20', 'Λήξη Μαθημάτων', 'Τα μαθήματα θα λήξουν για τις Χριστουγεννιάτικες διακοπές στις 20/12/2024. '),
(4, '2024-09-17', 'Υποβλήθηκε η εργασία 3', 'Η ημερομηνία παράδοσης της εργασίας είναι 2024-09-13'),
(21, '2024-09-17', 'Υποβλήθηκε η εργασία 3', 'Η ημερομηνία παράδοσης της εργασίας είναι 2024-09-13');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `assigments`
--

CREATE TABLE `assigments` (
  `id` int(50) NOT NULL,
  `goals` text NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `assigments`
--

INSERT INTO `assigments` (`id`, `goals`, `file_name`, `description`, `due_date`) VALUES
(3, '...\r\n...', 'Κατεβάστε την εκφώνηση της εργασίας από εδώ', 'Γραπτή αναφορά σε Word\r\nΠαρουσίαση σε PowerPoint', '2024-09-13');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `documents`
--

CREATE TABLE `documents` (
  `id` int(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `file_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('Tutor','Student') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `role`) VALUES
('Aliki', 'Touxou', 'alikitouzou@example.com', 'alikitouzou', 'Student'),
('Anastasia', 'Vrachnou', 'anastasiavrachnou@example.com', 'anastasiavrachnou', 'Student'),
('fotis', 'vrachnos', 'fotisvrachnos@example.com', 'fotisvrachnos', 'Tutor'),
('Vaggelis', 'Bogris', 'vaggelisbogris@example.com', 'vaggelisbogris', 'Tutor');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `assigments`
--
ALTER TABLE `assigments`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT για πίνακα `assigments`
--
ALTER TABLE `assigments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT για πίνακα `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
