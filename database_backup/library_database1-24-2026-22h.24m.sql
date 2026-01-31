-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2026 at 05:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `cover`, `author`, `genre`, `description`, `file_path`) VALUES
(1, 'THE GREAT GATSBY', 'https://cdn1.bookmanager.com/i/m.php?b=Wbq2YtVPObbUtgwnJz8beA&cb=1705096643', 'F. SCOTT FITZGERALD', 'CLASSIC', 'A CLASSIC NOVEL.', 'the_great_gatsby.pdf'),
(7, 'THE TRIAL', 'https://m.media-amazon.com/images/I/51aVr1MRWbL._SY445_SX342_.jpg', 'FRANZ KAFKA', 'DYSTOPIAN FICTION', 'THE TRIAL BY FRANZ KAFKA IS A SURREAL AND DYSTOPIAN NOVEL ABOUT JOSEF K., WHO IS UNEXPECTEDLY ARRESTED AND PROSECUTED BY A REMOTE, ABSURD JUDICIAL SYSTEM FOR A CRIME HE DOESN\'T KNOW.', 'the_trial.pdf'),
(59, 'HAMLET', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJERmiLF5IQF_ERwTdyD7gOtWDY9fQbJ8v-g&s', 'WILLIAM SHAKESPEAR', 'DRAMA', 'ABOUT HAMLET', 'hamlet.pdf'),
(60, 'WHITE NIGHTS', 'https://books.bizmandala.com/media/books/9789815266306/9789815266306-154.webp', 'FYODOR DOSTOEVSKY', 'FICTION', 'WHITE NIGHTS IS A SHORT STORY BY FYODOR DOSTOEVSKY THAT WAS PUBLISHED IN 1848. SET IN ST. PETERSBURG, IT IS THE STORY OF A YOUNG MAN FIGHTING HIS INNER RESTLESSNESS. A LIGHT AND TENDER NARRATIVE, IT DELVES INTO THE TORMENT AND GUILT OF UNREQUITED LOVE.', 'white_nights.pdf'),
(95, 'THE METAMORPHOSIS', 'https://2.bp.blogspot.com/--oNjJCKCTK4/U7yMZkAG2hI/AAAAAAAAB6M/3jazZVFNl8Y/s1600/Kafka+1915+-+The+Metamorphosis.jpg', 'FRANZ KAFKA', 'ABSURDISM,FICTION,CLASSIC', 'THE METAMORPHOSIS FOLLOWS GREGOR SAMSA, A TRAVELING SALESMAN WHO WAKES UP ONE MORNING TO FIND HIMSELF TRANSFORMED INTO A GIANT INSECT. DESPITE HIS NEW BODY, HE INITIALLY FOCUSES ON MISSING WORK AND THE FINANCIAL BURDEN ON HIS FAMILY. HIS FAMILY, INCLUDING HIS MOTHER, FATHER, AND SISTER, BECOMES INCREASINGLY SHOCKED AND CONCERNED AS THEY TRY TO UNDERSTAND HIS CONDITION.', 'the_metamorphosis.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logid` bigint(20) NOT NULL,
  `action` varchar(255) DEFAULT NULL,
  `performed_by` varchar(255) DEFAULT NULL,
  `role` enum('admin','librarian','user','') DEFAULT NULL,
  `old_data` text DEFAULT NULL,
  `new_data` text DEFAULT NULL,
  `performed_date` date DEFAULT NULL,
  `performed_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logid`, `action`, `performed_by`, `role`, `old_data`, `new_data`, `performed_date`, `performed_time`) VALUES
(53, 'delete', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 92\n    [title] => WADS\n    [cover] => \n    [author] => WADS\n    [genre] => WADS\n    [description] => WADS\n    [file_path] => \n    [status] => approved\n)\n', 'Array\n(\n    [deleted] => 1\n)\n', '2026-01-24', '09:25:38'),
(54, 'delete', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 93\n    [title] => QEWAD\n    [cover] => \n    [author] => EQWADS\n    [genre] => WADS\n    [description] => WADS\n    [file_path] => \n    [status] => approved\n)\n', 'Array\n(\n    [deleted] => 1\n)\n', '2026-01-24', '09:25:54'),
(55, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 73\n    [title] => 23QEWADF\n    [cover] => \n    [author] => QEWADFS\n    [genre] => WADS\n    [description] => WADS\n    [file_path] => \n    [status] => pending\n)\n', 'Array\n(\n    [id] => 73\n    [title] => 23QEWADF\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => QEWADFS\n    [genre] => WADS\n    [description] => WADS\n    [path] => \n    [status] => declined\n)\n', '2026-01-24', '09:28:24'),
(56, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 73\n    [title] => 23QEWADF\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => QEWADFS\n    [genre] => WADS\n    [description] => WADS\n    [file_path] => \n    [status] => declined\n)\n', 'Array\n(\n    [id] => 73\n    [title] => 23QEWADF\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => QEWADFS\n    [genre] => WADS\n    [description] => WADS\n    [path] => \n    [status] => pending\n)\n', '2026-01-24', '09:28:34'),
(57, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 73\n    [title] => 23QEWADF\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => QEWADFS\n    [genre] => WADS\n    [description] => WADS\n    [file_path] => \n    [status] => pending\n)\n', 'Array\n(\n    [id] => 73\n    [title] => 23QEWADF\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => QEWADFS\n    [genre] => WADS\n    [description] => WADS\n    [path] => \n    [status] => approved\n)\n', '2026-01-24', '09:28:40'),
(58, 'delete', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 94\n    [title] => 23QEWADF\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => QEWADFS\n    [genre] => WADS\n    [description] => WADS\n    [file_path] => \n    [status] => approved\n)\n', 'Array\n(\n    [deleted] => 1\n)\n', '2026-01-24', '09:28:42'),
(59, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 60\n    [title] => WHITE NIGHTS\n    [cover] => https://books.bizmandala.com/media/books/9789815266306/9789815266306-154.webp\n    [author] => FYODOR DOSTOEVSKY\n    [genre] => FICTION\n    [description] => WHITE NIGHTS IS A SHORT STORY BY FYODOR DOSTOEVSKY THAT WAS PUBLISHED IN 1848. SET IN ST. PETERSBURG, IT IS THE STORY OF A YOUNG MAN FIGHTING HIS INNER RESTLESSNESS. A LIGHT AND TENDER NARRATIVE, IT DELVES INTO THE TORMENT AND GUILT OF UNREQUITED LOVE.\n    [file_path] => white_nights.pdf\n    [status] => approved\n)\n', 'Array\n(\n    [id] => 60\n    [title] => WHITE NIGHTS\n    [cover] => \n    [author] => FYODOR DOSTOEVSKY\n    [genre] => FICTION\n    [description] => WHITE NIGHTS IS A SHORT STORY BY FYODOR DOSTOEVSKY THAT WAS PUBLISHED IN 1848. SET IN ST. PETERSBURG, IT IS THE STORY OF A YOUNG MAN FIGHTING HIS INNER RESTLESSNESS. A LIGHT AND TENDER NARRATIVE, IT DELVES INTO THE TORMENT AND GUILT OF UNREQUITED LOVE.\n    [path] => white_nights.pdf\n    [status] => approved\n)\n', '2026-01-24', '09:45:01'),
(60, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 60\n    [title] => WHITE NIGHTS\n    [cover] => \n    [author] => FYODOR DOSTOEVSKY\n    [genre] => FICTION\n    [description] => WHITE NIGHTS IS A SHORT STORY BY FYODOR DOSTOEVSKY THAT WAS PUBLISHED IN 1848. SET IN ST. PETERSBURG, IT IS THE STORY OF A YOUNG MAN FIGHTING HIS INNER RESTLESSNESS. A LIGHT AND TENDER NARRATIVE, IT DELVES INTO THE TORMENT AND GUILT OF UNREQUITED LOVE.\n    [file_path] => white_nights.pdf\n    [status] => approved\n)\n', 'Array\n(\n    [id] => 60\n    [title] => WHITE NIGHTS\n    [cover] => https://books.bizmandala.com/media/books/9789815266306/9789815266306-154.webp\n    [author] => FYODOR DOSTOEVSKY\n    [genre] => FICTION\n    [description] => WHITE NIGHTS IS A SHORT STORY BY FYODOR DOSTOEVSKY THAT WAS PUBLISHED IN 1848. SET IN ST. PETERSBURG, IT IS THE STORY OF A YOUNG MAN FIGHTING HIS INNER RESTLESSNESS. A LIGHT AND TENDER NARRATIVE, IT DELVES INTO THE TORMENT AND GUILT OF UNREQUITED LOVE.\n    [path] => white_nights.pdf\n    [status] => approved\n)\n', '2026-01-24', '09:45:14'),
(61, 'Added a New Book: The Metamorphosis', '1_dalbhattarkari', 'admin', 'Array\n(\n    [New Book] => 1\n)\n', 'Array\n(\n    [title] => The Metamorphosis\n    [author] => Franz Kafka\n    [genre] => Absurdism,Fiction\n    [description] => The Metamorphosis follows Gregor Samsa, a traveling salesman who wakes up one morning to find himself transformed into a giant insect. Despite his new body, he initially focuses on missing work and the financial burden on his family. His family, including his mother, father, and sister, becomes increasingly shocked and concerned as they try to understand his condition. \n)\n', '2026-01-24', '09:49:07'),
(62, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 74\n    [title] => THE METAMORPHOSIS\n    [cover] => \n    [author] => FRANZ KAFKA\n    [genre] => ABSURDISM,FICTION\n    [description] => THE METAMORPHOSIS FOLLOWS GREGOR SAMSA, A TRAVELING SALESMAN WHO WAKES UP ONE MORNING TO FIND HIMSELF TRANSFORMED INTO A GIANT INSECT. DESPITE HIS NEW BODY, HE INITIALLY FOCUSES ON MISSING WORK AND THE FINANCIAL BURDEN ON HIS FAMILY. HIS FAMILY, INCLUDING HIS MOTHER, FATHER, AND SISTER, BECOMES INCREASINGLY SHOCKED AND CONCERNED AS THEY TRY TO UNDERSTAND HIS CONDITION. \n    [file_path] => \n    [status] => pending\n)\n', 'Array\n(\n    [id] => 74\n    [title] => THE METAMORPHOSIS\n    [cover] => https://2.bp.blogspot.com/--oNjJCKCTK4/U7yMZkAG2hI/AAAAAAAAB6M/3jazZVFNl8Y/s1600/Kafka+1915+-+The+Metamorphosis.jpg\n    [author] => FRANZ KAFKA\n    [genre] => ABSURDISM,FICTION\n    [description] => THE METAMORPHOSIS FOLLOWS GREGOR SAMSA, A TRAVELING SALESMAN WHO WAKES UP ONE MORNING TO FIND HIMSELF TRANSFORMED INTO A GIANT INSECT. DESPITE HIS NEW BODY, HE INITIALLY FOCUSES ON MISSING WORK AND THE FINANCIAL BURDEN ON HIS FAMILY. HIS FAMILY, INCLUDING HIS MOTHER, FATHER, AND SISTER, BECOMES INCREASINGLY SHOCKED AND CONCERNED AS THEY TRY TO UNDERSTAND HIS CONDITION.\n    [path] => the_metamorphosis.pdf\n    [status] => pending\n)\n', '2026-01-24', '09:50:34'),
(63, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 74\n    [title] => THE METAMORPHOSIS\n    [cover] => https://2.bp.blogspot.com/--oNjJCKCTK4/U7yMZkAG2hI/AAAAAAAAB6M/3jazZVFNl8Y/s1600/Kafka+1915+-+The+Metamorphosis.jpg\n    [author] => FRANZ KAFKA\n    [genre] => ABSURDISM,FICTION\n    [description] => THE METAMORPHOSIS FOLLOWS GREGOR SAMSA, A TRAVELING SALESMAN WHO WAKES UP ONE MORNING TO FIND HIMSELF TRANSFORMED INTO A GIANT INSECT. DESPITE HIS NEW BODY, HE INITIALLY FOCUSES ON MISSING WORK AND THE FINANCIAL BURDEN ON HIS FAMILY. HIS FAMILY, INCLUDING HIS MOTHER, FATHER, AND SISTER, BECOMES INCREASINGLY SHOCKED AND CONCERNED AS THEY TRY TO UNDERSTAND HIS CONDITION.\n    [file_path] => the_metamorphosis.pdf\n    [status] => pending\n)\n', 'Array\n(\n    [id] => 74\n    [title] => THE METAMORPHOSIS\n    [cover] => https://2.bp.blogspot.com/--oNjJCKCTK4/U7yMZkAG2hI/AAAAAAAAB6M/3jazZVFNl8Y/s1600/Kafka+1915+-+The+Metamorphosis.jpg\n    [author] => FRANZ KAFKA\n    [genre] => ABSURDISM,FICTION\n    [description] => THE METAMORPHOSIS FOLLOWS GREGOR SAMSA, A TRAVELING SALESMAN WHO WAKES UP ONE MORNING TO FIND HIMSELF TRANSFORMED INTO A GIANT INSECT. DESPITE HIS NEW BODY, HE INITIALLY FOCUSES ON MISSING WORK AND THE FINANCIAL BURDEN ON HIS FAMILY. HIS FAMILY, INCLUDING HIS MOTHER, FATHER, AND SISTER, BECOMES INCREASINGLY SHOCKED AND CONCERNED AS THEY TRY TO UNDERSTAND HIS CONDITION.\n    [path] => the_metamorphosis.pdf\n    [status] => approved\n)\n', '2026-01-24', '09:50:44'),
(64, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 60\n    [title] => TEST\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => AUTHOR1\n    [genre] => FANTASY\n    [description] => HI\n    [file_path] => \n    [status] => declined\n)\n', 'Array\n(\n    [id] => 60\n    [title] => The Plague\n    [cover] => https://m.media-amazon.com/images/I/61Wlju1GdJL._SL1500_.jpg\n    [author] => Albert Camus\n    [genre] => Absurdism, Historical Fiction, Classics\n    [description] => The Plague is set in the 1940s in Oran, Algeria, where an outbreak of bubonic plague leads to a city-wide quarantine. The narrative follows Dr. Bernard Rieux, who is at the forefront of the fight against the disease. As the plague spreads, the citizens of Oran experience fear, denial, and despair, leading to a profound examination of human resilience and the struggle against suffering and death.\n    [path] => the_plague.pdf\n    [status] => approved\n)\n', '2026-01-24', '09:55:07'),
(65, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 2\n    [title] => 1984\n    [cover] => https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQIj5Tg3wbVjweBEp311ZWE0zQLl_e4jIuLhDs3go6BvgoWBTC-\n    [author] => GEORGE ORWELL\n    [genre] => DYSTOPIAN\n    [description] => A DYSTOPIAN FUTURE NOVEL.\n    [file_path] => 1984.pdf\n    [status] => approved\n)\n', 'Array\n(\n    [id] => 2\n    [title] => 1984\n    [cover] => https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQIj5Tg3wbVjweBEp311ZWE0zQLl_e4jIuLhDs3go6BvgoWBTC-\n    [author] => GEORGE ORWELL\n    [genre] => DYSTOPIAN\n    [description] => A DYSTOPIAN FUTURE NOVEL.\n    [path] => 1984.pdf\n    [status] => approved\n)\n', '2026-01-24', '09:59:46'),
(66, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 2\n    [title] => 1984\n    [cover] => https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQIj5Tg3wbVjweBEp311ZWE0zQLl_e4jIuLhDs3go6BvgoWBTC-\n    [author] => GEORGE ORWELL\n    [genre] => DYSTOPIAN\n    [description] => A DYSTOPIAN FUTURE NOVEL.\n    [file_path] => 1984.pdf\n    [status] => approved\n)\n', 'Array\n(\n    [id] => 2\n    [title] => 1984\n    [cover] => https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQIj5Tg3wbVjweBEp311ZWE0zQLl_e4jIuLhDs3go6BvgoWBTC-\n    [author] => GEORGE ORWELL\n    [genre] => DYSTOPIAN\n    [description] => A DYSTOPIAN FUTURE NOVEL.\n    [path] => 1984.pdf\n    [status] => approved\n)\n', '2026-01-24', '10:00:50'),
(67, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 95\n    [title] => THE METAMORPHOSIS\n    [cover] => https://2.bp.blogspot.com/--oNjJCKCTK4/U7yMZkAG2hI/AAAAAAAAB6M/3jazZVFNl8Y/s1600/Kafka+1915+-+The+Metamorphosis.jpg\n    [author] => FRANZ KAFKA\n    [genre] => ABSURDISM,FICTION\n    [description] => THE METAMORPHOSIS FOLLOWS GREGOR SAMSA, A TRAVELING SALESMAN WHO WAKES UP ONE MORNING TO FIND HIMSELF TRANSFORMED INTO A GIANT INSECT. DESPITE HIS NEW BODY, HE INITIALLY FOCUSES ON MISSING WORK AND THE FINANCIAL BURDEN ON HIS FAMILY. HIS FAMILY, INCLUDING HIS MOTHER, FATHER, AND SISTER, BECOMES INCREASINGLY SHOCKED AND CONCERNED AS THEY TRY TO UNDERSTAND HIS CONDITION.\n    [file_path] => the_metamorphosis.pdf\n    [status] => approved\n)\n', 'Array\n(\n    [id] => 95\n    [title] => THE METAMORPHOSIS\n    [cover] => https://2.bp.blogspot.com/--oNjJCKCTK4/U7yMZkAG2hI/AAAAAAAAB6M/3jazZVFNl8Y/s1600/Kafka+1915+-+The+Metamorphosis.jpg\n    [author] => FRANZ KAFKA\n    [genre] => ABSURDISM,FICTION, classic\n    [description] => THE METAMORPHOSIS FOLLOWS GREGOR SAMSA, A TRAVELING SALESMAN WHO WAKES UP ONE MORNING TO FIND HIMSELF TRANSFORMED INTO A GIANT INSECT. DESPITE HIS NEW BODY, HE INITIALLY FOCUSES ON MISSING WORK AND THE FINANCIAL BURDEN ON HIS FAMILY. HIS FAMILY, INCLUDING HIS MOTHER, FATHER, AND SISTER, BECOMES INCREASINGLY SHOCKED AND CONCERNED AS THEY TRY TO UNDERSTAND HIS CONDITION.\n    [path] => the_metamorphosis.pdf\n    [status] => approved\n)\n', '2026-01-24', '10:01:31'),
(68, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 95\n    [title] => THE METAMORPHOSIS\n    [cover] => https://2.bp.blogspot.com/--oNjJCKCTK4/U7yMZkAG2hI/AAAAAAAAB6M/3jazZVFNl8Y/s1600/Kafka+1915+-+The+Metamorphosis.jpg\n    [author] => FRANZ KAFKA\n    [genre] => ABSURDISM,FICTION, CLASSIC\n    [description] => THE METAMORPHOSIS FOLLOWS GREGOR SAMSA, A TRAVELING SALESMAN WHO WAKES UP ONE MORNING TO FIND HIMSELF TRANSFORMED INTO A GIANT INSECT. DESPITE HIS NEW BODY, HE INITIALLY FOCUSES ON MISSING WORK AND THE FINANCIAL BURDEN ON HIS FAMILY. HIS FAMILY, INCLUDING HIS MOTHER, FATHER, AND SISTER, BECOMES INCREASINGLY SHOCKED AND CONCERNED AS THEY TRY TO UNDERSTAND HIS CONDITION.\n    [file_path] => the_metamorphosis.pdf\n    [status] => approved\n)\n', 'Array\n(\n    [id] => 95\n    [title] => THE METAMORPHOSIS\n    [cover] => https://2.bp.blogspot.com/--oNjJCKCTK4/U7yMZkAG2hI/AAAAAAAAB6M/3jazZVFNl8Y/s1600/Kafka+1915+-+The+Metamorphosis.jpg\n    [author] => FRANZ KAFKA\n    [genre] => ABSURDISM,FICTION,Classic\n    [description] => THE METAMORPHOSIS FOLLOWS GREGOR SAMSA, A TRAVELING SALESMAN WHO WAKES UP ONE MORNING TO FIND HIMSELF TRANSFORMED INTO A GIANT INSECT. DESPITE HIS NEW BODY, HE INITIALLY FOCUSES ON MISSING WORK AND THE FINANCIAL BURDEN ON HIS FAMILY. HIS FAMILY, INCLUDING HIS MOTHER, FATHER, AND SISTER, BECOMES INCREASINGLY SHOCKED AND CONCERNED AS THEY TRY TO UNDERSTAND HIS CONDITION.\n    [path] => the_metamorphosis.pdf\n    [status] => approved\n)\n', '2026-01-24', '10:01:55'),
(69, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 1\n    [title] => THE GREAT GATSBY\n    [cover] => https://cdn1.bookmanager.com/i/m.php?b=Wbq2YtVPObbUtgwnJz8beA&cb=1705096643\n    [author] => F. SCOTT FITZGERALD\n    [genre] => CLASSIC\n    [description] => A CLASSIC NOVEL..\n    [file_path] => the_great_gatsby.pdf\n    [status] => approved\n)\n', 'Array\n(\n    [id] => 1\n    [title] => THE GREAT GATSBY\n    [cover] => https://cdn1.bookmanager.com/i/m.php?b=Wbq2YtVPObbUtgwnJz8beA&cb=1705096643\n    [author] => F. SCOTT FITZGERALD\n    [genre] => CLASSIC\n    [description] => A CLASSIC NOVEL..\n    [path] => the_great_gatsby.pdf\n    [status] => approved\n)\n', '2026-01-24', '10:14:15'),
(70, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 1\n    [title] => THE GREAT GATSBY\n    [cover] => https://cdn1.bookmanager.com/i/m.php?b=Wbq2YtVPObbUtgwnJz8beA&cb=1705096643\n    [author] => F. SCOTT FITZGERALD\n    [genre] => CLASSIC\n    [description] => A CLASSIC NOVEL..\n    [file_path] => the_great_gatsby.pdf\n    [status] => approved\n)\n', 'Array\n(\n    [id] => 1\n    [title] => THE GREAT GATSBY\n    [cover] => https://cdn1.bookmanager.com/i/m.php?b=Wbq2YtVPObbUtgwnJz8beA&cb=1705096643\n    [author] => F. SCOTT FITZGERALD\n    [genre] => CLASSIC\n    [description] => A CLASSIC NOVEL...\n    [path] => the_great_gatsby.pdf\n    [status] => approved\n)\n', '2026-01-24', '10:14:34'),
(71, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 1\n    [title] => THE GREAT GATSBY\n    [cover] => https://cdn1.bookmanager.com/i/m.php?b=Wbq2YtVPObbUtgwnJz8beA&cb=1705096643\n    [author] => F. SCOTT FITZGERALD\n    [genre] => CLASSIC\n    [description] => A CLASSIC NOVEL...\n    [file_path] => the_great_gatsby.pdf\n    [status] => approved\n)\n', 'Array\n(\n    [id] => 1\n    [title] => THE GREAT GATSBY\n    [cover] => https://cdn1.bookmanager.com/i/m.php?b=Wbq2YtVPObbUtgwnJz8beA&cb=1705096643\n    [author] => F. SCOTT FITZGERALD\n    [genre] => CLASSIC\n    [description] => A CLASSIC NOVEL...\n    [path] => the_great_gatsby.pdf\n    [status] => approved\n)\n', '2026-01-24', '10:14:44'),
(72, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 1\n    [title] => THE GREAT GATSBY\n    [cover] => https://cdn1.bookmanager.com/i/m.php?b=Wbq2YtVPObbUtgwnJz8beA&cb=1705096643\n    [author] => F. SCOTT FITZGERALD\n    [genre] => CLASSIC\n    [description] => A CLASSIC NOVEL...\n    [file_path] => the_great_gatsby.pdf\n    [status] => approved\n)\n', 'Array\n(\n    [id] => 1\n    [title] => THE GREAT GATSBY\n    [cover] => https://cdn1.bookmanager.com/i/m.php?b=Wbq2YtVPObbUtgwnJz8beA&cb=1705096643\n    [author] => F. SCOTT FITZGERALD\n    [genre] => CLASSIC\n    [description] => A CLASSIC NOVEL...\n    [path] => the_great_gatsby.pdf\n    [status] => approved\n)\n', '2026-01-24', '10:15:05'),
(73, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 1\n    [title] => THE GREAT GATSBY\n    [cover] => https://cdn1.bookmanager.com/i/m.php?b=Wbq2YtVPObbUtgwnJz8beA&cb=1705096643\n    [author] => F. SCOTT FITZGERALD\n    [genre] => CLASSIC\n    [description] => A CLASSIC NOVEL...\n    [file_path] => the_great_gatsby.pdf\n    [status] => approved\n)\n', 'Array\n(\n    [id] => 1\n    [title] => THE GREAT GATSBY\n    [cover] => https://cdn1.bookmanager.com/i/m.php?b=Wbq2YtVPObbUtgwnJz8beA&cb=1705096643\n    [author] => F. SCOTT FITZGERALD\n    [genre] => CLASSIC\n    [description] => A CLASSIC NOVEL....\n    [path] => the_great_gatsby.pdf\n    [status] => approved\n)\n', '2026-01-24', '10:15:12'),
(74, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 1\n    [title] => THE GREAT GATSBY\n    [cover] => https://cdn1.bookmanager.com/i/m.php?b=Wbq2YtVPObbUtgwnJz8beA&cb=1705096643\n    [author] => F. SCOTT FITZGERALD\n    [genre] => CLASSIC\n    [description] => A CLASSIC NOVEL....\n    [file_path] => the_great_gatsby.pdf\n    [status] => approved\n)\n', 'Array\n(\n    [id] => 1\n    [title] => THE GREAT GATSBY\n    [cover] => https://cdn1.bookmanager.com/i/m.php?b=Wbq2YtVPObbUtgwnJz8beA&cb=1705096643\n    [author] => F. SCOTT FITZGERALD\n    [genre] => CLASSIC\n    [description] => A CLASSIC NOVEL....\n    [path] => the_great_gatsby.pdf\n    [status] => approved\n)\n', '2026-01-24', '10:16:07'),
(75, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 1\n    [title] => THE GREAT GATSBY\n    [cover] => https://cdn1.bookmanager.com/i/m.php?b=Wbq2YtVPObbUtgwnJz8beA&cb=1705096643\n    [author] => F. SCOTT FITZGERALD\n    [genre] => CLASSIC\n    [description] => A CLASSIC NOVEL....\n    [file_path] => the_great_gatsby.pdf\n    [status] => approved\n)\n', 'Array\n(\n    [id] => 1\n    [title] => THE GREAT GATSBY\n    [cover] => https://cdn1.bookmanager.com/i/m.php?b=Wbq2YtVPObbUtgwnJz8beA&cb=1705096643\n    [author] => F. SCOTT FITZGERALD\n    [genre] => CLASSIC\n    [description] => A CLASSIC NOVEL....\n    [path] => the_great_gatsby.pdf\n    [status] => approved\n)\n', '2026-01-24', '10:18:32'),
(76, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 59\n    [title] => HAMLET\n    [cover] => https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJERmiLF5IQF_ERwTdyD7gOtWDY9fQbJ8v-g&s\n    [author] => WILLIAM SHAKESPEAR\n    [genre] => DRAMA\n    [description] => ABOUT HAMLET\n    [file_path] => hamlet.pdf\n    [status] => approved\n)\n', 'Array\n(\n    [id] => 59\n    [title] => HAMLET\n    [cover] => https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJERmiLF5IQF_ERwTdyD7gOtWDY9fQbJ8v-g&s\n    [author] => WILLIAM SHAKESPEAR\n    [genre] => DRAMA\n    [description] => ABOUT HAMLET\n    [path] => hamlet.pdf\n    [status] => approved\n)\n', '2026-01-24', '10:29:36'),
(77, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 59\n    [title] => HAMLET\n    [cover] => https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJERmiLF5IQF_ERwTdyD7gOtWDY9fQbJ8v-g&s\n    [author] => WILLIAM SHAKESPEAR\n    [genre] => DRAMA\n    [description] => ABOUT HAMLET\n    [file_path] => hamlet.pdf\n    [status] => approved\n)\n', 'Array\n(\n    [id] => 59\n    [title] => HAMLET\n    [cover] => https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJERmiLF5IQF_ERwTdyD7gOtWDY9fQbJ8v-g&s\n    [author] => WILLIAM SHAKESPEAR\n    [genre] => DRAMA\n    [description] => ABOUT HAMLET\n    [path] => hamlet.pdf\n    [status] => approved\n)\n', '2026-01-24', '10:29:45'),
(78, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 59\n    [title] => HAMLET\n    [cover] => https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJERmiLF5IQF_ERwTdyD7gOtWDY9fQbJ8v-g&s\n    [author] => WILLIAM SHAKESPEAR\n    [genre] => DRAMA\n    [description] => ABOUT HAMLET\n    [file_path] => hamlet.pdf\n    [status] => approved\n)\n', 'Array\n(\n    [id] => 59\n    [title] => HAMLET\n    [cover] => https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJERmiLF5IQF_ERwTdyD7gOtWDY9fQbJ8v-g&s\n    [author] => WILLIAM SHAKESPEAR\n    [genre] => DRAMA\n    [description] => ABOUT HAMLET\n    [path] => hamlet.pdf\n    [status] => approved\n)\n', '2026-01-24', '10:35:34'),
(79, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 1\n    [title] => THE GREAT GATSBY\n    [cover] => https://cdn1.bookmanager.com/i/m.php?b=Wbq2YtVPObbUtgwnJz8beA&cb=1705096643\n    [author] => F. SCOTT FITZGERALD\n    [genre] => CLASSIC\n    [description] => A CLASSIC NOVEL....\n    [file_path] => the_great_gatsby.pdf\n    [status] => approved\n)\n', 'Array\n(\n    [id] => 1\n    [title] => THE GREAT GATSBY\n    [cover] => https://cdn1.bookmanager.com/i/m.php?b=Wbq2YtVPObbUtgwnJz8beA&cb=1705096643\n    [author] => F. SCOTT FITZGERALD\n    [genre] => CLASSIC\n    [description] => A CLASSIC NOVEL.\n    [path] => the_great_gatsby.pdf\n    [status] => approved\n)\n', '2026-01-24', '10:35:47'),
(80, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 1\n    [title] => THE GREAT GATSBY\n    [cover] => https://cdn1.bookmanager.com/i/m.php?b=Wbq2YtVPObbUtgwnJz8beA&cb=1705096643\n    [author] => F. SCOTT FITZGERALD\n    [genre] => CLASSIC\n    [description] => A CLASSIC NOVEL.\n    [file_path] => the_great_gatsby.pdf\n    [status] => approved\n)\n', 'Array\n(\n    [id] => 1\n    [title] => THE GREAT GATSBY\n    [cover] => https://cdn1.bookmanager.com/i/m.php?b=Wbq2YtVPObbUtgwnJz8beA&cb=1705096643\n    [author] => F. SCOTT FITZGERALD\n    [genre] => CLASSIC\n    [description] => A CLASSIC NOVEL.\n    [path] => the_great_gatsby.pdf\n    [status] => approved\n)\n', '2026-01-24', '10:36:04'),
(81, 'delete', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 4\n    [title] => THE SONG OF ACHILLES\n    [cover] => https://m.media-amazon.com/images/I/61DfFK65gwL._SL500_.jpg\n    [author] => MADELINE MILLER\n    [genre] => HISTORICAL FICTION\n    [description] => THE SONG OF ACHILLES IS A 2011 NOVEL BY MADELINE MILLER THAT REIMAGINES THE TROJAN WAR THROUGH THE EYES OF PATROCLUS, FOCUSING ON HIS RELATIONSHIP WITH THE HERO ACHILLES.\n    [file_path] => the_song_of_achilles.pdf\n    [status] => approved\n)\n', 'Array\n(\n    [deleted] => 1\n)\n', '2026-01-24', '10:42:54'),
(82, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 61\n    [title] => test\n    [cover] => \n    [author] => author1\n    [genre] => fantasy\n    [description] => hi\n    [file_path] => \n    [status] => pending\n)\n', 'Array\n(\n    [id] => 61\n    [title] => test\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => author1\n    [genre] => fantasy\n    [description] => hi\n    [path] => \n    [status] => approved\n)\n', '2026-01-24', '10:48:13'),
(83, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 62\n    [title] => test\n    [cover] => \n    [author] => author1\n    [genre] => fantasy\n    [description] => hi\n    [file_path] => \n    [status] => pending\n)\n', 'Array\n(\n    [id] => 62\n    [title] => test\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => author1\n    [genre] => fantasy\n    [description] => hi\n    [path] => \n    [status] => approved\n)\n', '2026-01-24', '10:48:20'),
(84, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 63\n    [title] => test\n    [cover] => \n    [author] => author1\n    [genre] => fantasy\n    [description] => hi\n    [file_path] => \n    [status] => pending\n)\n', 'Array\n(\n    [id] => 63\n    [title] => test\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => author1\n    [genre] => fantasy\n    [description] => hi\n    [path] => \n    [status] => approved\n)\n', '2026-01-24', '10:48:26'),
(85, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 65\n    [title] => test\n    [cover] => \n    [author] => author1\n    [genre] => fantasy\n    [description] => hi\n    [file_path] => \n    [status] => pending\n)\n', 'Array\n(\n    [id] => 65\n    [title] => test\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => author1\n    [genre] => fantasy\n    [description] => hi\n    [path] => \n    [status] => approved\n)\n', '2026-01-24', '10:48:32'),
(86, 'delete', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 97\n    [title] => TEST\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => AUTHOR1\n    [genre] => FANTASY\n    [description] => HI\n    [file_path] => \n    [status] => approved\n)\n', 'Array\n(\n    [deleted] => 1\n)\n', '2026-01-24', '10:48:40'),
(87, 'delete', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 98\n    [title] => TEST\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => AUTHOR1\n    [genre] => FANTASY\n    [description] => HI\n    [file_path] => \n    [status] => approved\n)\n', 'Array\n(\n    [deleted] => 1\n)\n', '2026-01-24', '10:48:42'),
(88, 'delete', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 99\n    [title] => TEST\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => AUTHOR1\n    [genre] => FANTASY\n    [description] => HI\n    [file_path] => \n    [status] => approved\n)\n', 'Array\n(\n    [deleted] => 1\n)\n', '2026-01-24', '10:48:44'),
(89, 'delete', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 100\n    [title] => TEST\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => AUTHOR1\n    [genre] => FANTASY\n    [description] => HI\n    [file_path] => \n    [status] => approved\n)\n', 'Array\n(\n    [deleted] => 1\n)\n', '2026-01-24', '10:48:45'),
(90, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 66\n    [title] => test\n    [cover] => \n    [author] => author1\n    [genre] => fantasy\n    [description] => hi\n    [file_path] => \n    [status] => pending\n)\n', 'Array\n(\n    [id] => 66\n    [title] => TEST\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => AUTHOR1\n    [genre] => FANTASY\n    [description] => DESCRIPTION\n    [path] => \n    [status] => pending\n)\n', '2026-01-24', '10:49:07'),
(91, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 66\n    [title] => TEST\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => AUTHOR1\n    [genre] => FANTASY\n    [description] => DESCRIPTION\n    [file_path] => \n    [status] => pending\n)\n', 'Array\n(\n    [id] => 66\n    [title] => TEST\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => AUTHOR1\n    [genre] => FANTASY\n    [description] => DESCRIPTION\n    [path] => /pustakalaya/defaults/nofile.php\n    [status] => pending\n)\n', '2026-01-24', '10:49:39'),
(92, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 66\n    [title] => TEST\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => AUTHOR1\n    [genre] => FANTASY\n    [description] => DESCRIPTION\n    [file_path] => /pustakalaya/defaults/nofile.php\n    [status] => pending\n)\n', 'Array\n(\n    [id] => 66\n    [title] => TEST\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => AUTHOR1\n    [genre] => FANTASY\n    [description] => DESCRIPTION\n    [path] => nofile.php\n    [status] => pending\n)\n', '2026-01-24', '10:49:58'),
(93, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 66\n    [title] => TEST\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => AUTHOR1\n    [genre] => FANTASY\n    [description] => DESCRIPTION\n    [file_path] => nofile.php\n    [status] => pending\n)\n', 'Array\n(\n    [id] => 66\n    [title] => TEST\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => AUTHOR1\n    [genre] => FANTASY\n    [description] => DESCRIPTION\n    [path] => ../defaults/nofile.php\n    [status] => pending\n)\n', '2026-01-24', '10:50:26'),
(94, 'edit', '1_dalbhattarkari', 'admin', 'Array\n(\n    [id] => 66\n    [title] => TEST\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => AUTHOR1\n    [genre] => FANTASY\n    [description] => DESCRIPTION\n    [file_path] => ../defaults/nofile.php\n    [status] => pending\n)\n', 'Array\n(\n    [id] => 66\n    [title] => TEST BOOK 1\n    [cover] => /pustakalaya/defaults/cover.jpg\n    [author] => AUTHOR1\n    [genre] => GENRE1,GENRE2,GENRE3\n    [description] => DESCRIPTION\n    [path] => ../defaults/nofile.php\n    [status] => pending\n)\n', '2026-01-24', '10:51:07'),
(95, 'dalbhattarkari updated their passwords', '1_dalbhattarkari', 'admin', 'Array\n(\n)\n', 'Array\n(\n    [changed_pwd] => 1\n)\n', '2026-01-24', '16:50:03'),
(96, 'dalbhattarkari updated their passwords', '1_dalbhattarkari', 'admin', 'Array\n(\n)\n', 'Array\n(\n    [changed_pwd] => 1\n)\n', '2026-01-24', '17:01:25'),
(97, 'dalbhattarkari updated their passwords', '1_dalbhattarkari', 'admin', 'Array\n(\n)\n', 'Array\n(\n    [changed_pwd] => 1\n)\n', '2026-01-24', '17:18:25'),
(98, 'dalbhattarkari updated their passwords', '1_dalbhattarkari', 'admin', 'Array\n(\n)\n', 'Array\n(\n    [changed_pwd] => 1\n)\n', '2026-01-24', '17:20:09'),
(99, 'dalbhattarkari updated their passwords', '1_dalbhattarkari', 'admin', 'Array\n(\n)\n', 'Array\n(\n    [changed_pwd] => 1\n)\n', '2026-01-24', '17:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `req`
--

CREATE TABLE `req` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','declined') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `req`
--

INSERT INTO `req` (`id`, `title`, `cover`, `author`, `genre`, `description`, `file_path`, `status`) VALUES
(66, 'TEST BOOK 1', '/pustakalaya/defaults/cover.jpg', 'AUTHOR1', 'GENRE1,GENRE2,GENRE3', 'DESCRIPTION', '../defaults/nofile.php', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `uname` varchar(50) DEFAULT NULL,
  `pwd` varchar(70) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `joined` date DEFAULT NULL,
  `role` enum('admin','librarian','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `pwd`, `email`, `joined`, `role`) VALUES
(1, 'dalbhattarkari', '$2y$10$nkWn1oMu8V.Mb4WvnFPMiuJcZAjwRshEQAWFgx1Jdj95loam.3B72', 'uless668@gmail.com', '2026-01-24', 'admin'),
(2, '123', '$2y$10$ZWG2aqT14R6zxz/XUF3zFOvtFAziIQs1XACOmOmwNhYGBupt5/Tvi', '123@gmail.com', '2025-12-20', 'admin'),
(3, 'hi', '$2y$10$Diwel/v/UCfpe7nx9I2yOeLNrqiLntsWTmUgp64NDD1JaYERvwJKO', 'hi@gmail.com', '2025-12-20', 'librarian'),
(4, 'rambahadur', '$2y$10$UXgSy2IvTEaqtn2nj9PG4OuOaJ.WKFQzKOFj3CXSuu9a.za2aaRaq', 'ram@gmail.com', '2025-12-20', 'user'),
(5, 'rambahadurthapa', '$2y$10$sHUdNaNfFrBrHa1CNipUi.clJhJF.BLFJQleg6W0jvhaRF7WEjvGS', 'email@gmail.com', '2025-12-23', 'user'),
(6, 'harka', '$2y$10$5v1EstmiRsGhgBS.om/qf.uYB8sQSQwWL/GJB.dNoHG1mZtMgedg2', 'harka@gmail.com', '2025-12-23', 'user'),
(7, 'harkaSampang9000', '$2y$10$vyNUYK9Qc1HT4TTXyN8IdOKTw57uSHUxhJg1o2fJJMHDE3riw.7yG', 'shramdangardim@gmail.com', '2026-01-23', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `req`
--
ALTER TABLE `req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `req`
--
ALTER TABLE `req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
