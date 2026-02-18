-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2026 at 03:28 PM
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
-- Database: `interview_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate_profile`
--

CREATE TABLE `candidate_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate_profile`
--

INSERT INTO `candidate_profile` (`id`, `user_id`, `fullname`, `email`, `mobile`, `dob`, `gender`, `address`, `city`, `state`, `country`, `skills`, `education`, `experience`, `created_at`, `updated_at`) VALUES
(1, 1, 'Neha tyagi', 'tyagi.neha1130@gmail.com', '09999646473', '2025-11-03', 'Female', 'shiv mandir wazirabad delhi', 'Delhi', 'Delhi', 'India', 'html', 'mca', '2', '2025-11-02 22:33:39', '2025-11-17 03:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_scores`
--

CREATE TABLE `candidate_scores` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `interview_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

CREATE TABLE `interviews` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `domain` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `difficulty` enum('Easy','Medium','Hard') DEFAULT 'Medium',
  `duration` varchar(50) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `image` varchar(255) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`id`, `title`, `domain`, `description`, `difficulty`, `duration`, `tags`, `status`, `image`, `level`, `created_by`, `created_at`) VALUES
(1, 'Frontend Developer Interview', 'Web Development', 'Test your frontend development skills with HTML, CSS, JavaScript, and React-based interview questions.', 'Medium', '30 mins', 'HTML, CSS, JavaScript, React', 'active', 'img/frontend.png', 'Intermediate', 1, '2025-11-02 18:35:18'),
(2, 'Java Full Stack Interview', 'Software Development', 'Assess your backend and frontend integration skills in a full stack Java environment including Spring Boot and MySQL.', 'Hard', '45 mins', 'Java, Spring Boot, MySQL, REST API', 'active', 'img/java.png', 'Advanced', 1, '2025-11-02 18:35:18'),
(3, 'Data Analyst Interview', 'Data Science', 'Prepare for SQL, Excel, Power BI, and data visualization questions designed for aspiring data analysts.', 'Medium', '40 mins', 'SQL, Excel, Power BI, Data Visualization', 'active', 'img/data.png', 'Intermediate', 1, '2025-11-02 18:35:18'),
(4, 'AI & Machine Learning Interview', 'Artificial Intelligence', 'Evaluate your AI fundamentals and ML algorithms knowledge with practical scenario-based questions.', 'Hard', '50 mins', 'Python, Machine Learning, AI, TensorFlow', 'active', 'img/ai.png', 'Advanced', 1, '2025-11-02 18:35:18'),
(5, 'PHP Backend Developer Interview', 'Web Backend', 'Mock test for PHP developers focusing on backend logic, APIs, and database handling skills.', 'Easy', '25 mins', 'PHP, MySQL, APIs, Backend', 'active', 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=80', 'Beginner', 1, '2025-11-02 18:35:18'),
(6, 'React Full Stack Developer', 'Web Development', 'Learn React for building modern frontend applications.', 'Hard', '40', 'React,Frontend,JavaScript', 'active', 'img/react.png', 'Intermediate', 1, '2025-11-03 02:22:57'),
(7, 'Node.js Backend Developer', 'Web Development', 'Master Node.js for building scalable backend applications.', 'Hard', '50', 'Node,Backend,JavaScript', 'active', 'img/node.png', 'Intermediate', 1, '2025-11-03 02:22:57'),
(8, 'Python Programming', 'Programming', 'Learn Python from basics to advanced including data processing and automation.', 'Medium', '60', 'Python,Programming,Scripting', 'active', 'img/python.png', 'Beginner', 1, '2025-11-03 02:22:57'),
(9, 'Cyber Security Fundamentals', 'Security', 'Understand the basics of Cyber Security, threats, and protection measures.', 'Medium', '45', 'Cyber Security,Security,Networking', 'active', 'img/cyber.jpg', 'Intermediate', 1, '2025-11-03 02:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `interview_results`
--

CREATE TABLE `interview_results` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `interview_id` int(11) NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interview_results`
--

INSERT INTO `interview_results` (`id`, `user_id`, `interview_id`, `score`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 15, 260, '2025-11-17 06:53:49', '2025-12-10 04:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `interview_id` int(11) DEFAULT NULL,
  `qtext` text DEFAULT NULL,
  `qtype` enum('mcq','text') DEFAULT 'text',
  `options` text DEFAULT NULL,
  `correct_answer` text DEFAULT NULL,
  `points` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `interview_id`, `qtext`, `qtype`, `options`, `correct_answer`, `points`) VALUES
(1, 1, 'What does HTML stand for?', 'mcq', 'A) Hyper Text Markup Language,B) High Text Markup Language,C) Hyper Tabular Markup Language,D) None', 'A', 5),
(2, 1, 'Which tag is used to create a hyperlink in HTML?', 'mcq', 'A) <link>,B) <a>,C) <href>,D) <hyper>', 'B', 5),
(3, 1, 'Which HTML element is used for inserting an image?', 'mcq', 'A) <img>,B) <image>,C) <pic>,D) <src>', 'A', 5),
(4, 1, 'Which attribute specifies the URL of an image?', 'mcq', 'A) href,B) src,C) link,D) url', 'B', 5),
(5, 1, 'What does CSS stand for?', 'mcq', 'A) Creative Style Sheets,B) Cascading Style Sheets,C) Computer Style Sheets,D) Colorful Style Sheets', 'B', 5),
(6, 1, 'Which property is used to change the text color in CSS?', 'mcq', 'A) color,B) text-color,C) font-color,D) bgcolor', 'A', 5),
(7, 1, 'Which CSS property controls the text size?', 'mcq', 'A) font-style,B) text-size,C) font-size,D) text-style', 'C', 5),
(8, 1, 'Which HTML tag is used to define an internal style sheet?', 'mcq', 'A) <css>,B) <style>,C) <script>,D) <link>', 'B', 5),
(9, 1, 'How do you insert a comment in HTML?', 'mcq', 'A) // comment,B) <!-- comment -->,C) /* comment */,D) # comment', 'B', 5),
(10, 1, 'How do you select an element with id \"demo\" in CSS?', 'mcq', 'A) .demo,B) #demo,C) *demo,D) demo', 'B', 5),
(11, 1, 'Which HTML attribute is used to define inline styles?', 'mcq', 'A) styles,B) style,C) class,D) font', 'B', 5),
(12, 1, 'Which property is used to change the background color in CSS?', 'mcq', 'A) bgcolor,B) background-color,C) color,D) bg-color', 'B', 5),
(13, 1, 'Which HTML tag defines a table?', 'mcq', 'A) <table>,B) <tab>,C) <tr>,D) <td>', 'A', 5),
(14, 1, 'Which tag defines a table row?', 'mcq', 'A) <td>,B) <tr>,C) <table>,D) <row>', 'B', 5),
(15, 1, 'Which tag defines a table cell?', 'mcq', 'A) <td>,B) <tr>,C) <table>,D) <cell>', 'A', 5),
(16, 1, 'Which HTML tag is used to create a list with bullets?', 'mcq', 'A) <ol>,B) <ul>,C) <li>,D) <list>', 'B', 5),
(17, 1, 'Which HTML tag is used for a numbered list?', 'mcq', 'A) <ul>,B) <ol>,C) <li>,D) <list>', 'B', 5),
(18, 1, 'How do you make a list that lists its items with numbers?', 'mcq', 'A) <ol>,B) <ul>,C) <dl>,D) <list>', 'A', 5),
(19, 1, 'Which HTML element defines the title of a document?', 'mcq', 'A) <title>,B) <head>,C) <meta>,D) <h1>', 'A', 5),
(20, 1, 'Which HTML element defines the body of the document?', 'mcq', 'A) <body>,B) <head>,C) <html>,D) <section>', 'A', 5),
(21, 1, 'Which HTML element is used for the largest heading?', 'mcq', 'A) <h1>,B) <h6>,C) <heading>,D) <head>', 'A', 5),
(22, 1, 'Which HTML element is used for the smallest heading?', 'mcq', 'A) <h1>,B) <h6>,C) <h5>,D) <h3>', 'B', 5),
(23, 1, 'Which HTML element is used for emphasized text?', 'mcq', 'A) <i>,B) <em>,C) <italic>,D) <strong>', 'B', 5),
(24, 1, 'Which HTML tag is used to make text bold?', 'mcq', 'A) <b>,B) <strong>,C) Both A and B,D) <bold>', 'C', 5),
(25, 1, 'Which HTML attribute specifies an alternate text for an image?', 'mcq', 'A) src,B) alt,C) title,D) text', 'B', 5),
(26, 1, 'Which CSS property is used to change the font of an element?', 'mcq', 'A) font-weight,B) font-style,C) font-family,D) text-style', 'C', 5),
(27, 1, 'How do you make each word in a text start with a capital letter in CSS?', 'mcq', 'A) text-transform: capitalize;,B) text-style: capitalize;,C) font-variant: capitalize;,D) text-case: capitalize;', 'A', 5),
(28, 1, 'Which HTML attribute is used to define inline CSS?', 'mcq', 'A) class,B) style,C) id,D) css', 'B', 5),
(29, 1, 'Which CSS property is used to change the left margin of an element?', 'mcq', 'A) margin-left,B) padding-left,C) margin,C) left', 'A', 5),
(30, 1, 'Which HTML element is used to define important text?', 'mcq', 'A) <strong>,B) <b>,C) <important>,D) <em>', 'A', 5),
(31, 1, 'Which HTML element defines a section in a document?', 'mcq', 'A) <section>,B) <div>,C) <article>,D) <aside>', 'A', 5),
(32, 1, 'Which HTML tag is used to define an unordered list?', 'mcq', 'A) <ol>,B) <ul>,C) <li>,D) <list>', 'B', 5),
(33, 1, 'Which HTML tag is used to define a definition list?', 'mcq', 'A) <dl>,B) <dt>,C) <dd>,D) <list>', 'A', 5),
(34, 1, 'Which HTML element is used to define navigation links?', 'mcq', 'A) <nav>,B) <menu>,C) <ul>,D) <links>', 'A', 5),
(35, 1, 'Which HTML element is used to embed JavaScript?', 'mcq', 'A) <js>,B) <javascript>,C) <script>,D) <code>', 'C', 5),
(36, 1, 'Which HTML tag is used to create a checkbox?', 'mcq', 'A) <input type=\"checkbox\">,B) <checkbox>,C) <check>,D) <input>', 'A', 5),
(37, 1, 'Which input type is used to create a password field?', 'mcq', 'A) text,B) password,C) pwd,D) secret', 'B', 5),
(38, 1, 'Which HTML tag is used to create a radio button?', 'mcq', 'A) <radio>,B) <input type=\"radio\">,C) <rbutton>,D) <input>', 'B', 5),
(39, 1, 'Which HTML tag is used to create a drop-down list?', 'mcq', 'A) <select>,B) <dropdown>,C) <option>,D) <input>', 'A', 5),
(40, 1, 'Which HTML element is used to define a footer for a document?', 'mcq', 'A) <footer>,B) <bottom>,C) <section>,D) <foot>', 'A', 5),
(41, 1, 'Which HTML element is used to group inline-elements?', 'mcq', 'A) <span>,B) <div>,C) <section>,D) <group>', 'A', 5),
(42, 1, 'Which CSS property is used to change the spacing between lines of text?', 'mcq', 'A) line-height,B) letter-spacing,C) word-spacing,D) text-spacing', 'A', 5),
(43, 1, 'Which CSS property is used to set the spacing between letters?', 'mcq', 'A) letter-spacing,B) line-height,C) word-spacing,D) text-spacing', 'A', 5),
(44, 1, 'Which HTML attribute is used to define the relationship between a linked resource and the current document?', 'mcq', 'A) rel,B) href,C) type,D) link', 'A', 5),
(45, 1, 'Which HTML tag is used to define an abbreviation?', 'mcq', 'A) <abbr>,B) <acronym>,C) <abbrev>,D) <short>', 'A', 5),
(46, 1, 'Which HTML element is used to define an article?', 'mcq', 'A) <article>,B) <section>,C) <div>,D) <post>', 'A', 5),
(47, 1, 'Which HTML tag is used to create a horizontal line?', 'mcq', 'A) <hr>,B) <line>,C) <hl>,D) <break>', 'A', 5),
(48, 1, 'Which HTML tag is used to create a label for an input?', 'mcq', 'A) <label>,B) <input>,C) <span>,D) <form>', 'A', 5),
(49, 1, 'Which attribute is used to specify a placeholder text in an input field?', 'mcq', 'A) placeholder,B) hint,C) title,D) alt', 'A', 5),
(50, 1, 'Which HTML tag is used to include JavaScript code?', 'mcq', 'A) <javascript>,B) <script>,C) <js>,D) <code>', 'B', 5),
(51, 1, 'What is the correct syntax to link an external CSS file?', 'mcq', 'A) <link rel=\"stylesheet\" href=\"style.css\">,B) <css src=\"style.css\">,C) <style src=\"style.css\">,D) <link css=\"style.css\">', 'A', 5),
(52, 1, 'Which property is used to center a block element horizontally in CSS?', 'mcq', 'A) text-align:center;,B) margin:auto;,C) align:center;,D) center:block;', 'B', 5),
(53, 1, 'How do you write a comment in JavaScript?', 'mcq', 'A) <!-- comment -->,B) // comment,C) /* comment */,D) Both B and C', 'D', 5),
(54, 1, 'Which method is used to get an element by its ID in JavaScript?', 'mcq', 'A) getElementByClass(),B) getElementById(),C) querySelector(),D) getElements()', 'B', 5),
(55, 1, 'Which HTML attribute is used to call a JavaScript function on a button click?', 'mcq', 'A) onclick,B) onhover,C) onsubmit,D) onload', 'A', 5),
(56, 1, 'Which CSS property is used to make text bold?', 'mcq', 'A) font-weight,B) font-style,C) font-bold,D) text-style', 'A', 5),
(57, 1, 'What is the correct way to write an external JavaScript file reference?', 'mcq', 'A) <script src=\"file.js\"></script>,B) <js src=\"file.js\"></js>,C) <script href=\"file.js\">,D) <link src=\"file.js\">', 'A', 5),
(58, 1, 'How do you select all <p> elements in JavaScript?', 'mcq', 'A) document.getElementsByTagName(\"p\"),B) document.querySelector(\"p\"),C) document.getElement(\"p\"),D) document.querySelectorAll(\"p\")', 'D', 5),
(59, 1, 'Which CSS property is used to change the background color of an element?', 'mcq', 'A) bg-color,B) background,C) background-color,D) color', 'C', 5),
(60, 1, 'What is HTML?', 'mcq', 'A) A programming language,B) A markup language,C) A styling language,D) A database', 'B', 5),
(61, 1, 'What is CSS?', 'mcq', 'A) Cascading Style Sheets,B) Computer Style Sheets,C) Creative Style Sheets,D) Colorful Style Sheets', 'A', 5),
(62, 1, 'What is JavaScript?', 'mcq', 'A) A programming language for frontend,B) A styling language,C) A markup language,D) A database language', 'A', 5),
(63, 1, 'Define DOM in web development.', 'mcq', 'A) Document Object Model,B) Data Object Model,C) Document Output Model,D) Dynamic Object Model', 'A', 5),
(64, 1, 'What is the difference between inline, internal, and external CSS?', 'mcq', 'A) Inline in tag, Internal in <style>, External in separate file,B) All are same,C) Only Inline is used,D) Only External is recommended', 'A', 5),
(65, 1, 'Define responsive web design.', 'mcq', 'A) Website adapts to screen size,B) Website loads faster,C) Website uses animations,D) Website has forms', 'A', 5),
(66, 1, 'What is the difference between id and class in HTML?', 'mcq', 'A) id unique, class reusable,B) id reusable, class unique,C) Both same,D) None', 'A', 5),
(67, 1, 'Define the use of <meta> tag in HTML.', 'mcq', 'A) Metadata about HTML document,B) Creates tables,C) Adds scripts,D) Adds images', 'A', 5),
(68, 1, 'What is the difference between == and === in JavaScript?', 'mcq', 'A) == checks value, === checks value and type,B) Both same,C) === checks value, == checks type,D) None', 'A', 5),
(69, 1, 'Define the box model in CSS.', 'mcq', 'A) Content, padding, border, margin,B) Only content,C) Only padding,D) Only border', 'A', 5),
(70, 2, 'What is Java?', 'mcq', 'A) Programming Language,B) Database,C) Styling Language,D) Operating System', 'A', 5),
(71, 2, 'Which keyword is used to inherit a class in Java?', 'mcq', 'A) implements,B) extends,C) inherits,D) super', 'B', 5),
(72, 2, 'What is the size of int in Java?', 'mcq', 'A) 2 bytes,B) 4 bytes,C) 8 bytes,D) Depends on OS', 'B', 5),
(73, 2, 'Which of the following is not a Java feature?', 'mcq', 'A) Object-Oriented,B) Platform Independent,C) Use of Pointers,D) Multithreading', 'C', 5),
(74, 2, 'What is JVM?', 'mcq', 'A) Java Variable Method,B) Java Virtual Machine,C) Java Verified Module,D) Java Version Manager', 'B', 5),
(75, 2, 'What is the difference between JDK and JRE?', 'mcq', 'A) JDK includes JRE,B) JRE includes JDK,C) Both same,D) None', 'A', 5),
(76, 2, 'Which keyword is used to handle exceptions?', 'mcq', 'A) try,B) catch,C) finally,D) All of the above', 'D', 5),
(77, 2, 'Which of these is a checked exception?', 'mcq', 'A) IOException,B) NullPointerException,C) ArithmeticException,D) ArrayIndexOutOfBoundsException', 'A', 5),
(78, 2, 'What is the default value of boolean in Java?', 'mcq', 'A) true,B) false,C) 0,D) null', 'B', 5),
(79, 2, 'Which method is used to start a thread?', 'mcq', 'A) run(),B) start(),C) execute(),D) init()', 'B', 5),
(80, 2, 'What is the access modifier for a class that is visible only within its package?', 'mcq', 'A) public,B) private,C) protected,D) default', 'D', 5),
(81, 2, 'Which collection class allows duplicate elements?', 'mcq', 'A) Set,B) List,C) Map,D) Queue', 'B', 5),
(82, 2, 'Which interface is implemented by HashMap?', 'mcq', 'A) Map,B) List,C) Set,D) Collection', 'A', 5),
(83, 2, 'Which annotation is used for marking a method as a test in JUnit?', 'mcq', 'A) @Test,B) @Before,C) @After,D) @Run', 'A', 5),
(84, 2, 'Which HTML tag is used to link CSS file?', 'mcq', 'A) <link>,B) <style>,C) <css>,D) <script>', 'A', 5),
(85, 2, 'Which HTML tag is used for JavaScript code?', 'mcq', 'A) <script>,B) <js>,C) <javascript>,D) <code>', 'A', 5),
(86, 2, 'Which CSS property is used to change text color?', 'mcq', 'A) font-color,B) color,C) text-color,D) background-color', 'B', 5),
(87, 2, 'Which JavaScript function parses a string to integer?', 'mcq', 'A) parseInt(),B) parseFloat(),C) Number(),D) Int()', 'A', 5),
(88, 2, 'What is Spring Framework used for?', 'mcq', 'A) Web Development,B) Desktop Apps,C) Database Management,D) Mobile Apps', 'A', 5),
(89, 2, 'Which annotation is used for dependency injection in Spring?', 'mcq', 'A) @Autowired,B) @Inject,C) @Resource,D) All of the above', 'D', 5),
(90, 2, 'Which HTTP method is used to retrieve data?', 'mcq', 'A) GET,B) POST,C) PUT,D) DELETE', 'A', 5),
(91, 2, 'Which HTTP method is used to create new resource?', 'mcq', 'A) GET,B) POST,C) PUT,D) DELETE', 'B', 5),
(92, 2, 'Which SQL statement is used to retrieve data?', 'mcq', 'A) SELECT,B) INSERT,C) UPDATE,D) DELETE', 'A', 5),
(93, 2, 'Which SQL statement is used to remove data?', 'mcq', 'A) SELECT,B) INSERT,C) UPDATE,D) DELETE', 'D', 5),
(94, 2, 'Which SQL keyword is used to filter rows?', 'mcq', 'A) WHERE,B) HAVING,C) ORDER BY,D) GROUP BY', 'A', 5),
(95, 2, 'Which SQL function returns the number of rows?', 'mcq', 'A) COUNT(),B) SUM(),C) AVG(),D) MAX()', 'A', 5),
(96, 2, 'Which SQL statement is used to modify existing data?', 'mcq', 'A) SELECT,B) INSERT,C) UPDATE,D) DELETE', 'C', 5),
(97, 2, 'Which Java keyword is used to define a constant?', 'mcq', 'A) final,B) const,C) constant,D) static', 'A', 5),
(98, 2, 'What is the default value of object reference in Java?', 'mcq', 'A) null,B) 0,C) undefined,D) false', 'A', 5),
(99, 2, 'Which exception is thrown when dividing by zero in Java?', 'mcq', 'A) IOException,B) NullPointerException,C) ArithmeticException,D) ClassNotFoundException', 'C', 5),
(100, 2, 'Which method is used to compare two strings in Java?', 'mcq', 'A) equals(),B) ==,C) compareTo(),D) Both A and C', 'D', 5),
(101, 2, 'Which Java collection is synchronized?', 'mcq', 'A) ArrayList,B) Vector,C) HashMap,D) HashSet', 'B', 5),
(102, 2, 'Which keyword is used for interface in Java?', 'mcq', 'A) interface,B) implements,C) abstract,D) class', 'A', 5),
(103, 2, 'Which HTML element is used for a paragraph?', 'mcq', 'A) <p>,B) <div>,C) <span>,D) <h1>', 'A', 5),
(104, 2, 'Which CSS property sets the element width?', 'mcq', 'A) width,B) size,C) element-width,D) length', 'A', 5),
(105, 2, 'Which JS event occurs when a button is clicked?', 'mcq', 'A) onclick,B) onmouseover,C) onload,D) onchange', 'A', 5),
(106, 2, 'Which Spring annotation is used to define a REST controller?', 'mcq', 'A) @Controller,B) @RestController,C) @Service,D) @Repository', 'B', 5),
(107, 2, 'Which annotation defines a Spring service class?', 'mcq', 'A) @Service,B) @Controller,C) @Repository,D) @Component', 'A', 5),
(108, 2, 'Which annotation is used for transaction management in Spring?', 'mcq', 'A) @Transactional,B) @Service,C) @Component,D) @Repository', 'A', 5),
(109, 2, 'Which SQL keyword is used to sort the result?', 'mcq', 'A) ORDER BY,B) GROUP BY,C) HAVING,D) WHERE', 'A', 5),
(110, 2, 'Which HTML attribute sets an element ID?', 'mcq', 'A) id,B) class,C) name,D) key', 'A', 5),
(111, 2, 'Which JS method is used to convert object to JSON string?', 'mcq', 'A) JSON.stringify(),B) JSON.parse(),C) toString(),D) Object.toJSON()', 'A', 5),
(112, 2, 'Which JS method is used to parse JSON string to object?', 'mcq', 'A) JSON.parse(),B) JSON.stringify(),C) eval(),D) Object.parse()', 'A', 5),
(113, 2, 'Which HTML element is used for the main heading?', 'mcq', 'A) <h1>,B) <h2>,C) <header>,D) <head>', 'A', 5),
(114, 2, 'Which SQL clause is used with GROUP BY to filter groups?', 'mcq', 'A) HAVING,B) WHERE,C) ORDER BY,D) FILTER', 'A', 5),
(115, 2, 'Which Java keyword is used to create a new object?', 'mcq', 'A) new,B) create,C) init,D) construct', 'A', 5),
(116, 2, 'Which Spring annotation marks a class as a repository?', 'mcq', 'A) @Repository,B) @Service,C) @Controller,D) @Component', 'A', 5),
(117, 2, 'Which Java keyword is used for method overriding in subclass?', 'mcq', 'A) override,B) super,C) extends,D) @Override', 'D', 5),
(118, 2, 'Which HTTP status code indicates success?', 'mcq', 'A) 200,B) 400,C) 404,D) 500', 'A', 5),
(119, 2, 'Which HTTP status code indicates not found?', 'mcq', 'A) 200,B) 400,C) 404,D) 500', 'C', 5),
(120, 2, 'Which HTTP status code indicates server error?', 'mcq', 'A) 200,B) 400,C) 404,D) 500', 'D', 5),
(121, 2, 'Which CSS property controls the element visibility?', 'mcq', 'A) visibility,B) display,C) hidden,D) show', 'A', 5),
(122, 2, 'Which JS keyword is used to declare a constant?', 'mcq', 'A) const,B) let,C) var,D) static', 'A', 5),
(123, 2, 'Which Spring annotation marks a method for scheduling?', 'mcq', 'A) @Scheduled,B) @Async,C) @Transactional,D) @Service', 'A', 5),
(124, 2, 'Which SQL function returns the maximum value?', 'mcq', 'A) MAX(),B) MIN(),C) SUM(),D) COUNT()', 'A', 5),
(125, 3, 'What is the full form of ETL?', 'mcq', 'A) Extract Transform Load,B) Evaluate Transfer Load , C) Extract Transfer Load , D) Extract Transform Link', 'A', 5),
(126, 3, 'Which SQL command is used to retrieve data?', 'mcq', 'A) SELECT,B) INSERT,C) UPDATE,D) DELETE', 'A', 5),
(127, 3, 'Which SQL function is used to count rows?', 'mcq', 'A) COUNT(),B) SUM(),C) AVG(),D) MAX()', 'A', 5),
(128, 3, 'Which SQL keyword is used to remove duplicate rows?', 'mcq', 'A) DISTINCT,B) UNIQUE,C) DIFFERENT,D) NONE', 'A', 5),
(129, 3, 'Which SQL clause is used to filter data?', 'mcq', 'A) WHERE,B) HAVING,C) GROUP BY,D) ORDER BY', 'A', 5),
(130, 3, 'Which SQL clause is used with GROUP BY to filter groups?', 'mcq', 'A) HAVING,B) WHERE,C) ORDER BY,D) GROUP', 'A', 5),
(131, 3, 'Which function calculates the average value in SQL?', 'mcq', 'A) AVG(),B) SUM(),C) MEAN(),D) AVERAGE()', 'A', 5),
(132, 3, 'Which SQL statement is used to remove data?', 'mcq', 'A) DELETE,B) DROP,C) TRUNCATE,D) REMOVE', 'A', 5),
(133, 3, 'Which SQL statement is used to update existing data?', 'mcq', 'A) UPDATE,B) INSERT,C) MODIFY,D) ALTER', 'A', 5),
(134, 3, 'Which SQL keyword is used to join two tables?', 'mcq', 'A) JOIN,B) COMBINE,C) MERGE,D) UNION', 'A', 5),
(135, 3, 'Which Excel function calculates the sum of a range?', 'mcq', 'A) SUM(),B) ADD(),C) TOTAL(),D) SUMIF()', 'A', 5),
(136, 3, 'Which Excel function calculates average of a range?', 'mcq', 'A) AVERAGE(),B) AVG(),C) MEAN(),D) SUM()', 'A', 5),
(137, 3, 'Which Excel feature is used to create pivot tables?', 'mcq', 'A) Insert > PivotTable,B) Data > PivotTable,C) Review > PivotTable,D) Home > PivotTable', 'A', 5),
(138, 3, 'What does VLOOKUP do in Excel?', 'mcq', 'A) Vertical lookup,B) Horizontal lookup,C) Finds max value,D) Sorts data', 'A', 5),
(139, 3, 'Which Python library is used for data analysis?', 'mcq', 'A) pandas,B) numpy,C) matplotlib,D) All of the above', 'D', 5),
(140, 3, 'Which pandas function is used to read CSV files?', 'mcq', 'A) pd.read_csv(),B) pd.read_csvfile(),C) pd.load_csv(),D) pd.read()', 'A', 5),
(141, 3, 'Which pandas function shows the first rows of DataFrame?', 'mcq', 'A) head(),B) tail(),C) first(),D) top()', 'A', 5),
(142, 3, 'Which pandas function gives summary statistics?', 'mcq', 'A) describe(),B) summary(),C) info(),D) stats()', 'A', 5),
(143, 3, 'Which matplotlib function plots a line graph?', 'mcq', 'A) plot(),B) line(),C) graph(),D) chart()', 'A', 5),
(144, 3, 'Which seaborn function creates a heatmap?', 'mcq', 'A) heatmap(),B) map(),C) plot(),D) colormap()', 'A', 5),
(145, 3, 'Which measure represents the middle value of a dataset?', 'mcq', 'A) Median,B) Mean,C) Mode,D) Standard Deviation', 'A', 5),
(146, 3, 'Which measure represents the most frequent value?', 'mcq', 'A) Mode,B) Median,C) Mean,D) Variance', 'A', 5),
(147, 3, 'Which measure shows data spread?', 'mcq', 'A) Standard Deviation,B) Mean,C) Mode,D) Median', 'A', 5),
(148, 3, 'Which visualization is best for showing proportions?', 'mcq', 'A) Pie chart,B) Line chart,C) Bar chart,D) Histogram', 'A', 5),
(149, 3, 'Which visualization shows frequency distribution?', 'mcq', 'A) Histogram,B) Pie chart,C) Line chart,D) Scatter plot', 'A', 5),
(150, 3, 'Which chart is used to show trends over time?', 'mcq', 'A) Line chart,B) Pie chart,C) Bar chart,D) Histogram', 'A', 5),
(151, 3, 'Which chart is best for comparing categories?', 'mcq', 'A) Bar chart,B) Pie chart,C) Line chart,D) Scatter plot', 'A', 5),
(152, 3, 'Which Python function returns unique values from a Series?', 'mcq', 'A) unique(),B) distinct(),C) values(),D) all()', 'A', 5),
(153, 3, 'Which Python function counts unique values?', 'mcq', 'A) value_counts(),B) count_unique(),C) unique_count(),D) count()', 'A', 5),
(154, 3, 'Which SQL command is used to create a new table?', 'mcq', 'A) CREATE TABLE,B) NEW TABLE,C) ADD TABLE,D) INSERT TABLE', 'A', 5),
(155, 3, 'Which SQL command is used to remove a table?', 'mcq', 'A) DROP TABLE,B) DELETE TABLE,C) REMOVE TABLE,D) TRUNCATE TABLE', 'A', 5),
(156, 3, 'What does NULL represent in SQL?', 'mcq', 'A) Missing or unknown value,B) Zero,C) Empty string,D) Error', 'A', 5),
(157, 3, 'Which Python library is used for numerical computation?', 'mcq', 'A) numpy,B) pandas,C) matplotlib,D) seaborn', 'A', 5),
(158, 3, 'Which SQL statement is used to combine results of two SELECT queries?', 'mcq', 'A) UNION,B) JOIN,C) MERGE,D) COMBINE', 'A', 5),
(159, 3, 'Which Python function merges two DataFrames?', 'mcq', 'A) merge(),B) join(),C) concat(),D) All of the above', 'D', 5),
(160, 3, 'Which Excel function counts non-empty cells?', 'mcq', 'A) COUNTA(),B) COUNT(),C) COUNTIF(),D) COUNTBLANK()', 'A', 5),
(161, 3, 'Which Excel function counts empty cells?', 'mcq', 'A) COUNTBLANK(),B) COUNT(),C) COUNTA(),D) COUNTIF()', 'A', 5),
(162, 3, 'Which SQL clause is used to sort results?', 'mcq', 'A) ORDER BY,B) GROUP BY,C) HAVING,D) WHERE', 'A', 5),
(163, 3, 'Which SQL clause groups rows with same values?', 'mcq', 'A) GROUP BY,B) ORDER BY,C) HAVING,D) DISTINCT', 'A', 5),
(164, 3, 'Which Python method shows DataFrame info?', 'mcq', 'A) info(),B) describe(),C) head(),D) tail()', 'A', 5),
(165, 3, 'Which Python method shows last rows of DataFrame?', 'mcq', 'A) tail(),B) head(),C) last(),D) end()', 'A', 5),
(166, 3, 'Which Python function drops missing values?', 'mcq', 'A) dropna(),B) fillna(),C) isnull(),D) remove_na()', 'A', 5),
(167, 3, 'Which Python function fills missing values?', 'mcq', 'A) fillna(),B) dropna(),C) isnull(),D) replace()', 'A', 5),
(168, 3, 'Which Python method renames columns?', 'mcq', 'A) rename(),B) rename_columns(),C) set_columns(),D) col_rename()', 'A', 5),
(169, 3, 'Which Python function converts a Series to a list?', 'mcq', 'A) tolist(),B) list(),C) array(),D) convert()', 'A', 5),
(170, 3, 'Which Excel feature highlights cells based on conditions?', 'mcq', 'A) Conditional Formatting,B) Data Validation,C) Pivot Table,D) Sort', 'A', 5),
(171, 3, 'Which visualization is used to show correlation?', 'mcq', 'A) Scatter plot,B) Bar chart,C) Pie chart,D) Line chart', 'A', 5),
(172, 3, 'Which measure shows relationship between variables?', 'mcq', 'A) Correlation,B) Mean,C) Median,D) Mode', 'A', 5),
(173, 3, 'Which Python method removes duplicate rows?', 'mcq', 'A) drop_duplicates(),B) remove_duplicates(),C) unique(),D) distinct()', 'A', 5),
(174, 3, 'Which SQL function calculates standard deviation?', 'mcq', 'A) STDDEV(),B) STDEV(),C) SD(),D) VARIANCE()', 'A', 5),
(175, 3, 'Which Python method calculates cumulative sum?', 'mcq', 'A) cumsum(),B) sum(),C) total(),D) cumulative()', 'A', 5),
(176, 3, 'Which Python library is used for data visualization?', 'mcq', 'A) matplotlib,B) seaborn,C) Both A and B,D) pandas', 'C', 5),
(177, 3, 'Which Excel function returns the position of a value?', 'mcq', 'A) MATCH(),B) INDEX(),C) FIND(),D) SEARCH()', 'A', 5),
(178, 3, 'Which Excel function returns value at a given position?', 'mcq', 'A) INDEX(),B) MATCH(),C) VLOOKUP(),D) HLOOKUP()', 'A', 5),
(179, 3, 'Which type of chart is good for showing trends?', 'mcq', 'A) Line chart,B) Pie chart,C) Column chart,D) Scatter plot', 'A', 5),
(180, 3, 'Which type of chart is good for comparison?', 'mcq', 'A) Bar chart,B) Line chart,C) Pie chart,D) Area chart', 'A', 5),
(181, 3, 'Which SQL constraint ensures uniqueness?', 'mcq', 'A) UNIQUE,B) PRIMARY KEY,C) FOREIGN KEY,D) CHECK', 'A', 5),
(182, 3, 'Which SQL constraint prevents NULL values?', 'mcq', 'A) NOT NULL,B) UNIQUE,C) PRIMARY KEY,D) CHECK', 'A', 5),
(183, 3, 'Which Python function returns data type of object?', 'mcq', 'A) type(),B) dtype(),C) info(),D) class()', 'A', 5),
(184, 3, 'Which measure shows center tendency of dataset?', 'mcq', 'A) Mean,B) Median,C) Mode,D) All of the above', 'D', 5),
(185, 3, 'Which measure shows variability of dataset?', 'mcq', 'A) Variance,B) Standard Deviation,C) Range,D) All of the above', 'D', 5),
(186, 4, 'What is AI?', 'mcq', 'A) Artificial Intelligence,B) Automated Interface,C) Algorithm Integration,D) None', 'A', 5),
(187, 4, 'Which of these is a type of Machine Learning?', 'mcq', 'A) Supervised,B) Unsupervised,C) Reinforcement,D) All of the above', 'D', 5),
(188, 4, 'Which Python library is used for Machine Learning?', 'mcq', 'A) scikit-learn,B) pandas,C) numpy,D) matplotlib', 'A', 5),
(189, 4, 'Which algorithm is used for classification?', 'mcq', 'A) Logistic Regression,B) Linear Regression,C) K-Means,D) PCA', 'A', 5),
(190, 4, 'Which algorithm is used for regression?', 'mcq', 'A) Linear Regression,B) Decision Tree,C) K-Means,D) Random Forest', 'A', 5),
(191, 4, 'Which metric is used for classification evaluation?', 'mcq', 'A) Accuracy,B) RMSE,C) MSE,D) R2 Score', 'A', 5),
(192, 4, 'Which metric is used for regression evaluation?', 'mcq', 'A) MSE,B) Accuracy,C) Precision,D) Recall', 'A', 5),
(193, 4, 'Which algorithm is used for clustering?', 'mcq', 'A) K-Means,B) Logistic Regression,C) Decision Tree,D) Linear Regression', 'A', 5),
(194, 4, 'Which algorithm reduces dimensionality?', 'mcq', 'A) PCA,B) K-Means,C) Linear Regression,D) Logistic Regression', 'A', 5),
(195, 4, 'Which Python library is used for deep learning?', 'mcq', 'A) TensorFlow,B) scikit-learn,C) pandas,D) matplotlib', 'A', 5),
(196, 4, 'Which deep learning model is used for images?', 'mcq', 'A) CNN,B) RNN,C) LSTM,D) GAN', 'A', 5),
(197, 4, 'Which deep learning model is used for sequences?', 'mcq', 'A) RNN,B) CNN,C) GAN,D) PCA', 'A', 5),
(198, 4, 'Which activation function outputs values between 0 and 1?', 'mcq', 'A) Sigmoid,B) ReLU,C) Tanh,D) Softmax', 'A', 5),
(199, 4, 'Which activation function outputs values between -1 and 1?', 'mcq', 'A) Tanh,B) ReLU,C) Sigmoid,D) Softmax', 'A', 5),
(200, 4, 'Which activation function is most common in hidden layers?', 'mcq', 'A) ReLU,B) Sigmoid,C) Tanh,D) Softmax', 'A', 5),
(201, 4, 'Which is a supervised learning algorithm?', 'mcq', 'A) Decision Tree,B) K-Means,C) PCA,D) DBSCAN', 'A', 5),
(202, 4, 'Which is an unsupervised learning algorithm?', 'mcq', 'A) K-Means,B) Linear Regression,C) Logistic Regression,D) SVM', 'A', 5),
(203, 4, 'Which algorithm is used for dimensionality reduction?', 'mcq', 'A) PCA,B) K-Means,C) Decision Tree,D) Logistic Regression', 'A', 5),
(204, 4, 'Which Python library is used for numerical computation?', 'mcq', 'A) numpy,B) pandas,C) matplotlib,D) scikit-learn', 'A', 5),
(205, 4, 'Which Python library is used for data manipulation?', 'mcq', 'A) pandas,B) numpy,C) matplotlib,D) TensorFlow', 'A', 5),
(206, 4, 'Which loss function is used in regression?', 'mcq', 'A) MSE,B) Cross-Entropy,C) Hinge,D) Log Loss', 'A', 5),
(207, 4, 'Which loss function is used in classification?', 'mcq', 'A) Cross-Entropy,B) MSE,C) RMSE,D) L1 Loss', 'A', 5),
(208, 4, 'Which technique prevents overfitting in neural networks?', 'mcq', 'A) Dropout,B) PCA,C) K-Means,D) Scaling', 'A', 5),
(209, 4, 'Which technique scales features to a standard range?', 'mcq', 'A) Feature Scaling,B) PCA,C) One-hot Encoding,D) Dropout', 'A', 5),
(210, 4, 'Which technique encodes categorical variables?', 'mcq', 'A) One-hot Encoding,B) PCA,C) Feature Scaling,D) Normalization', 'A', 5),
(211, 4, 'Which algorithm uses bagging?', 'mcq', 'A) Random Forest,B) Decision Tree,C) Linear Regression,D) Logistic Regression', 'A', 5),
(212, 4, 'Which algorithm uses boosting?', 'mcq', 'A) XGBoost,B) Random Forest,C) K-Means,D) PCA', 'A', 5),
(213, 4, 'Which evaluation metric combines precision and recall?', 'mcq', 'A) F1 Score,B) Accuracy,C) RMSE,D) R2', 'A', 5),
(214, 4, 'Which method splits dataset into training and testing?', 'mcq', 'A) train_test_split,B) cross_val,C) fit_transform,D) PCA', 'A', 5),
(215, 4, 'Which ML algorithm is used for predicting continuous values?', 'mcq', 'A) Regression,B) Classification,C) Clustering,D) Association', 'A', 5),
(216, 4, 'Which ML algorithm is used for predicting categories?', 'mcq', 'A) Classification,B) Regression,C) Clustering,D) Dimensionality Reduction', 'A', 5),
(217, 4, 'Which ML algorithm groups similar data?', 'mcq', 'A) Clustering,B) Regression,C) Classification,D) Decision Tree', 'A', 5),
(218, 4, 'Which technique reduces variance in ensemble methods?', 'mcq', 'A) Bagging,B) Boosting,C) PCA,D) Normalization', 'A', 5),
(219, 4, 'Which technique reduces bias in ensemble methods?', 'mcq', 'A) Boosting,B) Bagging,C) PCA,D) Dropout', 'A', 5),
(220, 4, 'Which algorithm is sensitive to feature scaling?', 'mcq', 'A) KNN,B) Decision Tree,C) Random Forest,D) Naive Bayes', 'A', 5),
(221, 4, 'Which algorithm calculates distance between points?', 'mcq', 'A) KNN,B) Decision Tree,C) Logistic Regression,D) PCA', 'A', 5),
(222, 4, 'Which technique is used for hyperparameter tuning?', 'mcq', 'A) Grid Search,B) PCA,C) One-hot Encoding,D) Feature Scaling', 'A', 5),
(223, 4, 'Which ML algorithm uses decision boundaries?', 'mcq', 'A) SVM,B) K-Means,C) PCA,D) Linear Regression', 'A', 5),
(224, 4, 'Which deep learning model generates data?', 'mcq', 'A) GAN,B) CNN,C) RNN,D) LSTM', 'A', 5),
(225, 4, 'Which model is used for text generation?', 'mcq', 'A) RNN,B) CNN,C) GAN,D) PCA', 'A', 5),
(226, 4, 'Which ML method reduces features to avoid overfitting?', 'mcq', 'A) Feature Selection,B) Bagging,C) Boosting,D) Dropout', 'A', 5),
(227, 4, 'Which Python function shuffles dataset?', 'mcq', 'A) shuffle(),B) random(),C) split(),D) sample()', 'A', 5),
(228, 4, 'Which ML technique is used for anomaly detection?', 'mcq', 'A) Isolation Forest,B) Linear Regression,C) Logistic Regression,D) PCA', 'A', 5),
(229, 4, 'Which metric evaluates regression model error?', 'mcq', 'A) RMSE,B) Accuracy,C) Precision,D) Recall', 'A', 5),
(230, 4, 'Which metric evaluates classification threshold?', 'mcq', 'A) ROC-AUC,B) RMSE,C) R2,D) MSE', 'A', 5),
(231, 4, 'Which method prevents data leakage?', 'mcq', 'A) Proper train-test split,B) PCA,C) Dropout,D) Bagging', 'A', 5),
(232, 4, 'Which type of ML is used for recommendation systems?', 'mcq', 'A) Collaborative Filtering,B) Regression,C) Classification,D) Clustering', 'A', 5),
(233, 4, 'Which Python library is used for model evaluation metrics?', 'mcq', 'A) scikit-learn,B) pandas,C) numpy,D) matplotlib', 'A', 5),
(234, 4, 'Which Python function fits model to data?', 'mcq', 'A) fit(),B) train(),C) learn(),D) evaluate()', 'A', 5),
(235, 4, 'Which Python function predicts output for new data?', 'mcq', 'A) predict(),B) transform(),C) fit(),D) score()', 'A', 5),
(236, 4, 'Which technique reduces overfitting by early stopping?', 'mcq', 'A) Early Stopping,B) PCA,C) Normalization,D) Feature Scaling', 'A', 5),
(237, 4, 'Which algorithm is used for sentiment analysis?', 'mcq', 'A) Naive Bayes,B) Linear Regression,C) PCA,D) KNN', 'A', 5),
(238, 4, 'Which algorithm is used for image classification?', 'mcq', 'A) CNN,B) RNN,C) LSTM,D) GAN', 'A', 5),
(239, 5, 'What does PHP stand for?', 'mcq', 'A) Hypertext Preprocessor,B) Pretext Hyper Processor,C) Personal Home Page,D) PHP: Hyper Processor', 'A', 5),
(240, 5, 'Which PHP function is used to connect to MySQL?', 'mcq', 'A) mysqli_connect(),B) mysql_connect(),C) connect_db(),D) db_connect()', 'A', 5),
(241, 5, 'Which function is used to fetch data from MySQL?', 'mcq', 'A) mysqli_fetch_assoc(),B) fetch_data(),C) mysql_fetch(),D) db_fetch()', 'A', 5),
(242, 5, 'Which PHP superglobal holds form data submitted via POST?', 'mcq', 'A) $_POST,B) $_GET,C) $_REQUEST,D) $_SESSION', 'A', 5),
(243, 5, 'Which PHP superglobal holds form data submitted via GET?', 'mcq', 'A) $_GET,B) $_POST,C) $_REQUEST,D) $_SESSION', 'A', 5),
(244, 5, 'Which function is used to start a PHP session?', 'mcq', 'A) session_start(),B) start_session(),C) init_session(),D) session_init()', 'A', 5),
(245, 5, 'Which function is used to destroy a PHP session?', 'mcq', 'A) session_destroy(),B) destroy_session(),C) session_end(),D) end_session()', 'A', 5),
(246, 5, 'Which function is used to hash passwords in PHP?', 'mcq', 'A) password_hash(),B) md5(),C) hash(),D) sha1()', 'A', 5),
(247, 5, 'Which function is used to verify hashed passwords?', 'mcq', 'A) password_verify(),B) verify_password(),C) check_hash(),D) hash_verify()', 'A', 5),
(248, 5, 'Which PHP function includes another PHP file?', 'mcq', 'A) include(),B) require(),C) include_once(),D) All of the above', 'D', 5),
(249, 5, 'Which is faster: include() or require()?', 'mcq', 'A) Both are same,B) include(),C) require(),D) None', 'A', 5),
(250, 5, 'Which function is used to redirect in PHP?', 'mcq', 'A) header(\"Location: url\"),B) redirect(),C) goto(),D) move()', 'A', 5),
(251, 5, 'Which method is used to prevent SQL injection in PHP?', 'mcq', 'A) Prepared Statements,B) Direct query,C) addslashes(),D) escape()', 'A', 5),
(252, 5, 'Which PHP function retrieves the last inserted ID in MySQL?', 'mcq', 'A) mysqli_insert_id(),B) last_id(),C) mysql_last_id(),D) insert_id()', 'A', 5),
(253, 5, 'Which superglobal holds uploaded file information?', 'mcq', 'A) $_FILES,B) $_POST,C) $_GET,D) $_SESSION', 'A', 5),
(254, 5, 'Which function moves uploaded file to a new location?', 'mcq', 'A) move_uploaded_file(),B) move_file(),C) upload_file(),D) file_move()', 'A', 5),
(255, 5, 'Which function checks if a file exists?', 'mcq', 'A) file_exists(),B) is_file(),C) exists(),D) check_file()', 'A', 5),
(256, 5, 'Which function gets the size of a file?', 'mcq', 'A) filesize(),B) file_size(),C) size(),D) get_file_size()', 'A', 5),
(257, 5, 'Which function reads entire file content?', 'mcq', 'A) file_get_contents(),B) readfile(),C) fopen(),D) fread()', 'A', 5),
(258, 5, 'Which function writes content to a file?', 'mcq', 'A) file_put_contents(),B) fwrite(),C) writefile(),D) All of the above', 'D', 5),
(259, 5, 'Which PHP framework follows MVC architecture?', 'mcq', 'A) Laravel,B) CodeIgniter,C) Symfony,D) All of the above', 'D', 5),
(260, 5, 'Which function checks if a variable is set?', 'mcq', 'A) isset(),B) empty(),C) is_set(),D) var_exists()', 'A', 5),
(261, 5, 'Which function checks if a variable is empty?', 'mcq', 'A) empty(),B) isset(),C) is_empty(),D) var_empty()', 'A', 5),
(262, 5, 'Which function converts string to integer?', 'mcq', 'A) intval(),B) str_to_int(),C) cast(),D) to_int()', 'A', 5),
(263, 5, 'Which function converts string to float?', 'mcq', 'A) floatval(),B) str_to_float(),C) to_float(),D) cast()', 'A', 5),
(264, 5, 'Which function counts elements in an array?', 'mcq', 'A) count(),B) sizeof(),C) length(),D) Both A and B', 'D', 5),
(265, 5, 'Which function sorts an array in ascending order?', 'mcq', 'A) sort(),B) asort(),C) ksort(),D) rsort()', 'A', 5),
(266, 5, 'Which function sorts an array by key?', 'mcq', 'A) ksort(),B) sort(),C) asort(),D) rsort()', 'A', 5),
(267, 5, 'Which function reverses an array?', 'mcq', 'A) array_reverse(),B) reverse_array(),C) arr_reverse(),D) reverse()', 'A', 5),
(268, 5, 'Which function merges two arrays?', 'mcq', 'A) array_merge(),B) merge_array(),C) array_combine(),D) combine()', 'A', 5),
(269, 5, 'Which function splits a string into an array?', 'mcq', 'A) explode(),B) split(),C) str_split(),D) implode()', 'A', 5),
(270, 5, 'Which function joins array elements into a string?', 'mcq', 'A) implode(),B) join(),C) explode(),D) Both A and B', 'D', 5),
(271, 5, 'Which function removes whitespace from a string?', 'mcq', 'A) trim(),B) ltrim(),C) rtrim(),D) All of the above', 'D', 5),
(272, 5, 'Which function replaces string content?', 'mcq', 'A) str_replace(),B) replace(),C) str_swap(),D) swap()', 'A', 5),
(273, 5, 'Which function returns current timestamp?', 'mcq', 'A) time(),B) date(),C) now(),D) timestamp()', 'A', 5),
(274, 5, 'Which function formats a date?', 'mcq', 'A) date(),B) time(),C) strtotime(),D) format()', 'A', 5),
(275, 5, 'Which function generates a random number?', 'mcq', 'A) rand(),B) random(),C) mt_rand(),D) Both A and C', 'D', 5),
(276, 5, 'Which function hashes a string using MD5?', 'mcq', 'A) md5(),B) sha1(),C) hash(),D) crypt()', 'A', 5),
(277, 5, 'Which function terminates script execution?', 'mcq', 'A) exit(),B) die(),C) terminate(),D) Both A and B', 'D', 5),
(278, 5, 'Which function sends HTTP headers?', 'mcq', 'A) header(),B) set_header(),C) send_header(),D) http_header()', 'A', 5),
(279, 5, 'Which function checks if a file is readable?', 'mcq', 'A) is_readable(),B) file_readable(),C) can_read(),D) read_file()', 'A', 5),
(280, 5, 'Which function checks if a file is writable?', 'mcq', 'A) is_writable(),B) file_writable(),C) can_write(),D) write_file()', 'A', 5),
(281, 5, 'Which PHP function serializes data?', 'mcq', 'A) serialize(),B) json_encode(),C) encode(),D) serialize_data()', 'A', 5),
(282, 5, 'Which PHP function deserializes data?', 'mcq', 'A) unserialize(),B) json_decode(),C) decode(),D) unserialize_data()', 'A', 5),
(283, 5, 'Which PHP function encodes data to JSON?', 'mcq', 'A) json_encode(),B) serialize(),C) encode(),D) json()', 'A', 5),
(284, 5, 'Which PHP function decodes JSON data?', 'mcq', 'A) json_decode(),B) json_encode(),C) decode(),D) unserialize()', 'A', 5),
(285, 5, 'Which function is used to require a file only once?', 'mcq', 'A) require_once(),B) include_once(),C) include(),D) All of the above', 'D', 5),
(286, 5, 'Which PHP error type stops script execution?', 'mcq', 'A) Fatal Error,B) Warning,C) Notice,D) Parse Error', 'A', 5),
(287, 5, 'Which PHP method is used to create cookies?', 'mcq', 'A) setcookie(),B) cookie(),C) create_cookie(),D) makecookie()', 'A', 5),
(288, 5, 'Which PHP function destroys cookies?', 'mcq', 'A) setcookie() with past expiry,B) delete_cookie(),C) remove_cookie(),D) destroy_cookie()', 'A', 5),
(289, 9, 'What is Cyber Security?', 'mcq', 'A) Protection of systems and networks,B) Development of apps,C) Cloud computing,D) Database management', 'A', 5),
(290, 9, 'Which type of attack floods a network with traffic?', 'mcq', 'A) DDoS,B) Phishing,C) SQL Injection,D) Man-in-the-middle', 'A', 5),
(291, 9, 'Which encryption is asymmetric?', 'mcq', 'A) RSA,B) AES,C) DES,D) 3DES', 'A', 5),
(292, 9, 'Which is a common symmetric encryption algorithm?', 'mcq', 'A) AES,B) RSA,C) ECC,D) Diffie-Hellman', 'A', 5),
(293, 9, 'Which attack involves sending fraudulent emails?', 'mcq', 'A) Phishing,B) Spoofing,C) Brute Force,D) DoS', 'A', 5),
(294, 9, 'What does VPN stand for?', 'mcq', 'A) Virtual Private Network,B) Very Private Network,C) Virtual Public Network,D) Verified Private Node', 'A', 5),
(295, 9, 'Which protocol is secure for web browsing?', 'mcq', 'A) HTTPS,B) HTTP,C) FTP,D) Telnet', 'A', 5),
(296, 9, 'What is malware?', 'mcq', 'A) Malicious software,B) Secure software,C) Network protocol,D) Database', 'A', 5),
(297, 9, 'Which tool is used for penetration testing?', 'mcq', 'A) Metasploit,B) Visual Studio,C) MySQL,D) Nginx', 'A', 5),
(298, 9, 'Which attack modifies data in transit?', 'mcq', 'A) Man-in-the-middle,B) DDoS,C) Phishing,D) Brute Force', 'A', 5),
(299, 9, 'Which is a strong password practice?', 'mcq', 'A) Mix of letters, numbers, symbols,B) Simple words,C) Only numbers,D) Only letters', 'A', 5),
(300, 9, 'Which firewall filters traffic?', 'mcq', 'A) Packet-filtering,B) Antivirus,C) IDS,D) Proxy', 'A', 5),
(301, 9, 'Which protocol is used for secure email?', 'mcq', 'A) S/MIME,B) SMTP,C) POP3,D) IMAP', 'A', 5),
(302, 9, 'What is SQL Injection?', 'mcq', 'A) Inserting malicious SQL code,B) Phishing attack,C) Password cracking,D) Spoofing', 'A', 5),
(303, 9, 'Which is a two-factor authentication method?', 'mcq', 'A) Password + OTP,B) Password only,C) OTP only,D) CAPTCHA only', 'A', 5),
(304, 9, 'Which is an example of social engineering?', 'mcq', 'A) Phishing emails,B) Brute force attack,C) DDoS,D) Malware', 'A', 5),
(305, 9, 'Which tool scans for vulnerabilities?', 'mcq', 'A) Nessus,B) Wireshark,C) MySQL,D) Node.js', 'A', 5),
(306, 9, 'Which malware encrypts files and demands ransom?', 'mcq', 'A) Ransomware,B) Spyware,C) Trojan,D) Adware', 'A', 5),
(307, 9, 'Which protocol is used for secure file transfer?', 'mcq', 'A) SFTP,B) FTP,C) HTTP,D) Telnet', 'A', 5),
(308, 9, 'What is a botnet?', 'mcq', 'A) Network of compromised devices,B) Security software,C) Encryption key,D) Firewall', 'A', 5),
(309, 9, 'Which is a public key cryptography algorithm?', 'mcq', 'A) RSA,B) AES,C) DES,D) 3DES', 'A', 5),
(310, 9, 'Which attack guesses all possible passwords?', 'mcq', 'A) Brute Force,B) Phishing,C) SQL Injection,D) XSS', 'A', 5),
(311, 9, 'Which type of malware records keystrokes?', 'mcq', 'A) Keylogger,B) Trojan,C) Worm,D) Spyware', 'A', 5),
(312, 9, 'Which port does HTTPS use?', 'mcq', 'A) 443,B) 80,C) 21,D) 22', 'A', 5),
(313, 9, 'Which protocol is used for secure shell access?', 'mcq', 'A) SSH,B) FTP,C) HTTP,D) Telnet', 'A', 5),
(314, 9, 'Which type of attack spoofs IP addresses?', 'mcq', 'A) IP Spoofing,B) SQL Injection,C) Phishing,D) XSS', 'A', 5),
(315, 9, 'Which is a type of malware that spreads automatically?', 'mcq', 'A) Worm,B) Trojan,C) Virus,D) Spyware', 'A', 5),
(316, 9, 'Which is an example of network sniffing tool?', 'mcq', 'A) Wireshark,B) Metasploit,C) Nmap,D) Nessus', 'A', 5),
(317, 9, 'Which security principle limits user access?', 'mcq', 'A) Principle of Least Privilege,B) Zero Trust,C) Firewall,D) Encryption', 'A', 5),
(318, 9, 'Which protocol prevents eavesdropping on network traffic?', 'mcq', 'A) TLS,B) HTTP,C) FTP,D) SMTP', 'A', 5),
(319, 9, 'Which attack injects scripts into web pages?', 'mcq', 'A) XSS,B) SQL Injection,C) CSRF,D) DDoS', 'A', 5),
(320, 9, 'Which type of malware pretends to be legitimate software?', 'mcq', 'A) Trojan,B) Worm,C) Virus,D) Adware', 'A', 5),
(321, 9, 'Which is a method to secure wireless networks?', 'mcq', 'A) WPA2 encryption,B) WEP,C) Open network,D) No encryption', 'A', 5),
(322, 9, 'Which tool is used for network scanning?', 'mcq', 'A) Nmap,B) Wireshark,C) Metasploit,D) Nessus', 'A', 5),
(323, 9, 'Which protocol is used to secure emails?', 'mcq', 'A) S/MIME,B) SMTP,C) POP3,D) IMAP', 'A', 5),
(324, 9, 'Which attack forces repeated login attempts?', 'mcq', 'A) Brute Force,B) Phishing,C) DDoS,D) SQL Injection', 'A', 5),
(325, 9, 'Which type of firewall filters applications?', 'mcq', 'A) Application-level firewall,B) Packet filter,C) Proxy,D) Network firewall', 'A', 5),
(326, 9, 'Which attack tricks users into executing malicious files?', 'mcq', 'A) Social Engineering,B) DDoS,C) Phishing,D) SQL Injection', 'A', 5),
(327, 9, 'Which malware collects sensitive info secretly?', 'mcq', 'A) Spyware,B) Trojan,C) Worm,D) Ransomware', 'A', 5),
(328, 9, 'Which is used to verify software integrity?', 'mcq', 'A) Checksums,B) Firewalls,C) Antivirus,D) IDS', 'A', 5),
(329, 9, 'Which is a network security device?', 'mcq', 'A) Firewall,B) Router,C) Switch,D) Hub', 'A', 5),
(330, 9, 'Which technique prevents CSRF attacks?', 'mcq', 'A) CSRF Tokens,B) HTTPS,C) SQL Injection,D) XSS', 'A', 5),
(331, 9, 'Which protocol is used for encrypted email?', 'mcq', 'A) S/MIME,B) SMTP,C) POP3,D) IMAP', 'A', 5),
(332, 9, 'Which is an IDS?', 'mcq', 'A) Intrusion Detection System,B) Firewall,C) Antivirus,D) Proxy', 'A', 5),
(333, 9, 'Which attack redirects users to malicious sites?', 'mcq', 'A) DNS Spoofing,B) SQL Injection,C) XSS,D) DDoS', 'A', 5),
(334, 9, 'Which method secures password storage?', 'mcq', 'A) Hashing + Salt,B) Plaintext,C) Encryption only,D) Base64', 'A', 5),
(335, 9, 'Which security standard is used for PCI compliance?', 'mcq', 'A) PCI DSS,B) ISO 27001,C) GDPR,D) HIPAA', 'A', 5),
(336, 9, 'Which malware encrypts data and demands payment?', 'mcq', 'A) Ransomware,B) Trojan,C) Worm,D) Spyware', 'A', 5),
(337, 9, 'Which practice improves email security?', 'mcq', 'A) SPF, DKIM, DMARC,B) Open relay,C) Weak password,D) None', 'A', 5),
(338, 9, 'Which protocol secures web traffic?', 'mcq', 'A) HTTPS,B) HTTP,C) FTP,D) Telnet', 'A', 5),
(339, 8, 'Which of the following is a correct way to declare a Python variable?', 'mcq', 'A) x = 10,B) int x = 10,C) var x = 10,D) x := 10', 'A', 5),
(340, 8, 'Which data type is immutable in Python?', 'mcq', 'A) Tuple,B) List,C) Dictionary,D) Set', 'A', 5),
(341, 8, 'Which function is used to get the length of a list?', 'mcq', 'A) len(),B) size(),C) count(),D) length()', 'A', 5),
(342, 8, 'Which keyword is used to define a function in Python?', 'mcq', 'A) def,B) function,C) func,D) lambda', 'A', 5),
(343, 8, 'Which keyword is used for creating a class?', 'mcq', 'A) class,B) object,C) def,D) struct', 'A', 5),
(344, 8, 'Which method adds an item to the end of a list?', 'mcq', 'A) append(),B) add(),C) insert(),D) extend()', 'A', 5),
(345, 8, 'Which operator is used for exponentiation?', 'mcq', 'A) **,B) ^,C) %,D) //', 'A', 5),
(346, 8, 'Which module is used for regular expressions in Python?', 'mcq', 'A) re,B) regex,C) regx,D) expressions', 'A', 5),
(347, 8, 'Which function is used to get input from the user?', 'mcq', 'A) input(),B) scanf(),C) readline(),D) read()', 'A', 5),
(348, 8, 'Which statement is used to handle exceptions?', 'mcq', 'A) try-except,B) catch,C) handle,D) error', 'A', 5),
(349, 8, 'Which function returns a list of keys from a dictionary?', 'mcq', 'A) keys(),B) values(),C) items(),D) all()', 'A', 5),
(350, 8, 'Which method removes and returns the last item from a list?', 'mcq', 'A) pop(),B) remove(),C) delete(),D) discard()', 'A', 5),
(351, 8, 'Which Python keyword is used for iteration?', 'mcq', 'A) for,B) iterate,C) loop,D) while', 'A', 5),
(352, 8, 'Which function converts a string to an integer?', 'mcq', 'A) int(),B) str(),C) float(),D) number()', 'A', 5),
(353, 8, 'Which function converts a string to a float?', 'mcq', 'A) float(),B) str(),C) int(),D) double()', 'A', 5),
(354, 8, 'Which function converts a number to string?', 'mcq', 'A) str(),B) string(),C) to_str(),D) format()', 'A', 5),
(355, 8, 'Which operator checks equality in Python?', 'mcq', 'A) ==,B) =,C) !=,D) ===', 'A', 5),
(356, 8, 'Which method converts a string to lowercase?', 'mcq', 'A) lower(),B) tolower(),C) downcase(),D) casefold()', 'A', 5),
(357, 8, 'Which method converts a string to uppercase?', 'mcq', 'A) upper(),B) toupper(),C) upcase(),D) capitalize()', 'A', 5),
(358, 8, 'Which function returns the largest of arguments?', 'mcq', 'A) max(),B) min(),C) largest(),D) top()', 'A', 5),
(359, 8, 'Which function returns the smallest of arguments?', 'mcq', 'A) min(),B) max(),C) smallest(),D) bottom()', 'A', 5),
(360, 8, 'Which method removes whitespace from the beginning and end of a string?', 'mcq', 'A) strip(),B) trim(),C) lstrip(),D) rstrip()', 'A', 5),
(361, 8, 'Which function rounds a number to the nearest integer?', 'mcq', 'A) round(),B) ceil(),C) floor(),D) truncate()', 'A', 5),
(362, 8, 'Which module is used for working with JSON data?', 'mcq', 'A) json,B) simplejson,C) ujson,D) All of the above', 'D', 5),
(363, 8, 'Which keyword is used to define an anonymous function?', 'mcq', 'A) lambda,B) def,C) func,D) anon', 'A', 5),
(364, 8, 'Which method returns a list of tuples from a dictionary?', 'mcq', 'A) items(),B) keys(),C) values(),D) all()', 'A', 5),
(365, 8, 'Which operator performs floor division?', 'mcq', 'A) //,B) /,C) %,D) **', 'A', 5),
(366, 8, 'Which method counts occurrences of an element in a list?', 'mcq', 'A) count(),B) find(),C) occurrences(),D) index()', 'A', 5),
(367, 8, 'Which method finds the index of an element in a list?', 'mcq', 'A) index(),B) find(),C) search(),D) locate()', 'A', 5),
(368, 8, 'Which module is used for mathematical operations?', 'mcq', 'A) math,B) cmath,C) numpy,D) All of the above', 'D', 5),
(369, 8, 'Which module is used for random numbers?', 'mcq', 'A) random,B) math,C) numpy,D) os', 'A', 5),
(370, 8, 'Which method splits a string into a list?', 'mcq', 'A) split(),B) divide(),C) explode(),D) tokenize()', 'A', 5),
(371, 8, 'Which method joins a list of strings into a single string?', 'mcq', 'A) join(),B) concat(),C) merge(),D) combine()', 'A', 5),
(372, 8, 'Which keyword is used for conditional statements?', 'mcq', 'A) if,B) when,C) switch,D) case', 'A', 5),
(373, 8, 'Which keyword is used for else-if statements?', 'mcq', 'A) elif,B) else,C) elseif,D) ifelse', 'A', 5),
(374, 8, 'Which keyword is used for infinite loops?', 'mcq', 'A) while,B) loop,C) for,D) repeat', 'A', 5),
(375, 8, 'Which keyword exits a loop prematurely?', 'mcq', 'A) break,B) continue,C) exit,D) pass', 'A', 5),
(376, 8, 'Which keyword skips to next iteration in a loop?', 'mcq', 'A) continue,B) break,C) pass,D) exit', 'A', 5),
(377, 8, 'Which function converts a string to a list of characters?', 'mcq', 'A) list(),B) array(),C) str_to_list(),D) chars()', 'A', 5),
(378, 8, 'Which method reverses a list?', 'mcq', 'A) reverse(),B) flip(),C) invert(),D) swap()', 'A', 5),
(379, 8, 'Which operator is used for logical AND?', 'mcq', 'A) and,B) &,C) &&,D) ALL', 'A', 5),
(380, 8, 'Which operator is used for logical OR?', 'mcq', 'A) or,B) |,C) ||,D) ALL', 'A', 5),
(381, 8, 'Which statement is used to import modules?', 'mcq', 'A) import,B) include,C) require,D) use', 'A', 5),
(382, 8, 'Which function is used to open files?', 'mcq', 'A) open(),B) fopen(),C) file_open(),D) readfile()', 'A', 5),
(383, 8, 'Which function reads the content of a file?', 'mcq', 'A) read(),B) fread(),C) file_get_contents(),D) All of the above', 'D', 5),
(384, 8, 'Which method writes content to a file?', 'mcq', 'A) write(),B) fwrite(),C) file_write(),D) All of the above', 'D', 5),
(385, 8, 'Which function deletes a file?', 'mcq', 'A) os.remove(),B) delete(),C) unlink(),D) remove_file()', 'C', 5),
(386, 8, 'Which data type represents True or False?', 'mcq', 'A) bool,B) int,C) str,D) float', 'A', 5),
(387, 8, 'Which keyword does nothing?', 'mcq', 'A) pass,B) continue,C) break,D) noop', 'A', 5),
(388, 8, 'Which function evaluates expressions from a string?', 'mcq', 'A) eval(),B) exec(),C) parse(),D) compile()', 'A', 5),
(389, 8, 'Which module is used for date and time?', 'mcq', 'A) datetime,B) time,C) calendar,D) All of the above', 'D', 5),
(390, 8, 'Which function formats strings with placeholders?', 'mcq', 'A) format(),B) printf(),C) sprintf(),D) All of the above', 'D', 5),
(391, 8, 'Which function returns the type of a variable?', 'mcq', 'A) type(),B) typeof(),C) class(),D) kind()', 'A', 5);
INSERT INTO `questions` (`id`, `interview_id`, `qtext`, `qtype`, `options`, `correct_answer`, `points`) VALUES
(392, 8, 'Which statement raises an exception?', 'mcq', 'A) raise,B) throw,C) except,D) error', 'A', 5),
(393, 7, 'Which runtime environment is used to execute JavaScript outside the browser?', 'mcq', 'A) Node.js,B) React,C) Angular,D) Vue.js', 'A', 5),
(394, 7, 'Which module is used for handling file system operations in Node.js?', 'mcq', 'A) fs,B) http,C) path,D) os', 'A', 5),
(395, 7, 'Which module is used to create HTTP servers?', 'mcq', 'A) http,B) fs,C) url,D) net', 'A', 5),
(396, 7, 'Which method starts an HTTP server?', 'mcq', 'A) server.listen(),B) server.start(),C) http.createServer(),D) http.listen()', 'A', 5),
(397, 7, 'Which module is used to parse URL strings?', 'mcq', 'A) url,B) path,C) querystring,D) http', 'A', 5),
(398, 7, 'Which method reads files asynchronously?', 'mcq', 'A) fs.readFile(),B) fs.readFileSync(),C) fs.open(),D) fs.writeFile()', 'A', 5),
(399, 7, 'Which module provides operating system information?', 'mcq', 'A) os,B) path,C) fs,D) net', 'A', 5),
(400, 7, 'Which method is used to import modules in Node.js?', 'mcq', 'A) require(),B) import(),C) include(),D) use()', 'A', 5),
(401, 7, 'Which module is used to create paths?', 'mcq', 'A) path,B) fs,C) os,D) net', 'A', 5),
(402, 7, 'Which module is used to create a web server using Express.js?', 'mcq', 'A) express,B) http,C) fs,D) path', 'A', 5),
(403, 7, 'Which method defines routes in Express.js?', 'mcq', 'A) app.get(),B) app.start(),C) app.route(),D) app.post()', 'A', 5),
(404, 7, 'Which method sends a response in Express.js?', 'mcq', 'A) res.send(),B) res.write(),C) res.output(),D) res.response()', 'A', 5),
(405, 7, 'Which middleware parses incoming JSON requests?', 'mcq', 'A) express.json(),B) bodyParser(),C) express.urlencoded(),D) cookieParser()', 'A', 5),
(406, 7, 'Which module is used for event handling in Node.js?', 'mcq', 'A) events,B) fs,C) http,D) net', 'A', 5),
(407, 7, 'Which method listens to events?', 'mcq', 'A) on(),B) emit(),C) trigger(),D) listen()', 'A', 5),
(408, 7, 'Which function triggers an event?', 'mcq', 'A) emit(),B) on(),C) trigger(),D) fire()', 'A', 5),
(409, 7, 'Which module is used for cryptographic operations?', 'mcq', 'A) crypto,B) fs,C) http,D) os', 'A', 5),
(410, 7, 'Which method converts JavaScript object to JSON string?', 'mcq', 'A) JSON.stringify(),B) JSON.parse(),C) Object.toJSON(),D) JSON.convert()', 'A', 5),
(411, 7, 'Which method converts JSON string to JavaScript object?', 'mcq', 'A) JSON.parse(),B) JSON.stringify(),C) Object.fromJSON(),D) JSON.convert()', 'A', 5),
(412, 7, 'Which method is used to schedule tasks in Node.js?', 'mcq', 'A) setTimeout(),B) setInterval(),C) Both A and B,D) schedule()', 'C', 5),
(413, 7, 'Which database is commonly used with Node.js?', 'mcq', 'A) MongoDB,B) MySQL,C) PostgreSQL,D) All of the above', 'D', 5),
(414, 7, 'Which method connects Node.js with MongoDB?', 'mcq', 'A) mongoose.connect(),B) db.connect(),C) mongo.connect(),D) connect()', 'A', 5),
(415, 7, 'Which method sends JSON response in Express.js?', 'mcq', 'A) res.json(),B) res.send(),C) res.output(),D) res.write()', 'A', 5),
(416, 7, 'Which keyword declares a variable in Node.js?', 'mcq', 'A) let,B) var,C) const,D) All of the above', 'D', 5),
(417, 7, 'Which module is used to create TCP servers?', 'mcq', 'A) net,B) fs,C) http,D) events', 'A', 5),
(418, 7, 'Which method closes a server?', 'mcq', 'A) server.close(),B) server.stop(),C) server.end(),D) server.shutdown()', 'A', 5),
(419, 7, 'Which module helps handle query strings?', 'mcq', 'A) querystring,B) url,C) fs,D) path', 'A', 5),
(420, 7, 'Which method handles POST request data in Express.js?', 'mcq', 'A) express.json() middleware,B) app.post(),C) req.send(),D) res.write()', 'A', 5),
(421, 7, 'Which method is used to read a directory?', 'mcq', 'A) fs.readdir(),B) fs.readDirSync(),C) fs.readDir(),D) fs.list()', 'A', 5),
(422, 7, 'Which method writes data to a file asynchronously?', 'mcq', 'A) fs.writeFile(),B) fs.writeFileSync(),C) fs.write(),D) fs.createWriteStream()', 'A', 5),
(423, 7, 'Which module is used for handling cookies in Express.js?', 'mcq', 'A) cookie-parser,B) express.json(),C) body-parser,D) multer', 'A', 5),
(424, 7, 'Which module handles file uploads in Node.js?', 'mcq', 'A) multer,B) fs,C) http,D) path', 'A', 5),
(425, 7, 'Which type of programming Node.js uses?', 'mcq', 'A) Asynchronous, event-driven,B) Synchronous,C) Multi-threaded,D) Blocking', 'A', 5),
(426, 7, 'Which function executes asynchronously in Node.js?', 'mcq', 'A) setTimeout(),B) console.log(),C) parseInt(),D) Math.random()', 'A', 5),
(427, 7, 'Which method removes a file?', 'mcq', 'A) fs.unlink(),B) fs.remove(),C) fs.delete(),D) fs.rm()', 'A', 5),
(428, 7, 'Which module parses URL query parameters?', 'mcq', 'A) querystring,B) url,C) fs,D) path', 'A', 5),
(429, 7, 'Which Node.js method reads binary data from a file?', 'mcq', 'A) fs.readFile(),B) fs.readBinary(),C) fs.open(),D) fs.read()', 'A', 5),
(430, 7, 'Which Express.js method sets HTTP headers?', 'mcq', 'A) res.set(),B) res.header(),C) res.sendHeader(),D) res.writeHeader()', 'A', 5),
(431, 7, 'Which method handles static files in Express.js?', 'mcq', 'A) express.static(),B) app.static(),C) res.static(),D) res.sendFile()', 'A', 5),
(432, 7, 'Which module provides utilities for inspecting objects?', 'mcq', 'A) util,B) os,C) fs,D) path', 'A', 5),
(433, 7, 'Which method returns environment variables?', 'mcq', 'A) process.env,B) os.env,C) env(),D) getEnv()', 'A', 5),
(434, 7, 'Which method terminates the Node.js process?', 'mcq', 'A) process.exit(),B) process.stop(),C) exit(),D) terminate()', 'A', 5),
(435, 7, 'Which method adds event listeners in Node.js?', 'mcq', 'A) on(),B) addEvent(),C) listen(),D) trigger()', 'A', 5),
(436, 7, 'Which module is used for child processes?', 'mcq', 'A) child_process,B) cluster,C) worker_threads,D) All of the above', 'D', 5),
(437, 7, 'Which method sends files as response in Express.js?', 'mcq', 'A) res.sendFile(),B) res.send(),C) res.json(),D) res.download()', 'A', 5),
(438, 7, 'Which module provides utilities for string formatting?', 'mcq', 'A) util,B) string,B) fs,D) path', 'A', 5),
(439, 7, 'Which method joins path segments?', 'mcq', 'A) path.join(),B) path.concat(),C) path.combine(),D) path.merge()', 'A', 5),
(440, 7, 'Which module is used for streaming data?', 'mcq', 'A) stream,B) fs,C) http,D) net', 'A', 5),
(441, 7, 'Which method ends a writable stream?', 'mcq', 'A) stream.end(),B) stream.close(),C) stream.finish(),D) stream.stop()', 'A', 5),
(442, 7, 'Which module is used to schedule tasks?', 'mcq', 'A) node-schedule,B) cron,C) schedule,D) All of the above', 'D', 5),
(443, 7, 'Which Node.js module handles query strings?', 'mcq', 'A) querystring,B) url,C) fs,D) path', 'A', 5),
(444, 7, 'Which method reads environment variables asynchronously?', 'mcq', 'A) process.env,B) dotenv.config(),C) Both A and B,D) None', 'C', 5),
(445, 6, 'Which library is used to build user interfaces in React?', 'mcq', 'A) React,B) Angular,C) Vue,D) jQuery', 'A', 5),
(446, 6, 'Which method is used to render a React component?', 'mcq', 'A) ReactDOM.render(),B) render(),C) component.render(),D) DOM.render()', 'A', 5),
(447, 6, 'Which hook is used for state management in functional components?', 'mcq', 'A) useState,B) useEffect,C) useReducer,D) useContext', 'A', 5),
(448, 6, 'Which hook runs side effects in functional components?', 'mcq', 'A) useEffect,B) useState,C) useContext,D) useReducer', 'A', 5),
(449, 6, 'Which method updates the state in class components?', 'mcq', 'A) this.setState(),B) this.updateState(),C) setState(),D) update()', 'A', 5),
(450, 6, 'Which attribute is used to set CSS classes in JSX?', 'mcq', 'A) className,B) class,C) style,D) id', 'A', 5),
(451, 6, 'Which library is used for routing in React?', 'mcq', 'A) react-router-dom,B) react-router,C) router,D) react-router-native', 'A', 5),
(452, 6, 'Which method is used to prevent default form submission?', 'mcq', 'A) event.preventDefault(),B) preventDefault(),C) event.stop(),D) stopDefault()', 'A', 5),
(453, 6, 'Which hook manages complex state logic in functional components?', 'mcq', 'A) useReducer,B) useState,C) useEffect,D) useContext', 'A', 5),
(454, 6, 'Which library is commonly used for HTTP requests in React?', 'mcq', 'A) axios,B) fetch,C) jquery,D) request', 'A', 5),
(455, 6, 'Which prop is used to pass data from parent to child?', 'mcq', 'A) props,B) state,C) context,D) ref', 'A', 5),
(456, 6, 'Which hook is used to access context in functional components?', 'mcq', 'A) useContext,B) useState,C) useReducer,D) useEffect', 'A', 5),
(457, 6, 'Which method is used to access DOM elements directly?', 'mcq', 'A) useRef,B) createRef(),C) getElementById,D) ref', 'A', 5),
(458, 6, 'Which hook runs only once after component mounts?', 'mcq', 'A) useEffect with empty dependency array,B) useState,C) useContext,D) useReducer', 'A', 5),
(459, 6, 'Which function component can maintain internal state?', 'mcq', 'A) Functional component with useState,B) Class component,C) Stateless component,D) Pure component', 'A', 5),
(460, 6, 'Which method in class components runs after rendering?', 'mcq', 'A) componentDidMount,B) render(),C) componentWillMount,D) shouldComponentUpdate', 'A', 5),
(461, 6, 'Which method runs before a component is removed from the DOM?', 'mcq', 'A) componentWillUnmount,B) componentDidMount,C) render(),D) shouldComponentUpdate', 'A', 5),
(462, 6, 'Which lifecycle method runs before updating?', 'mcq', 'A) getSnapshotBeforeUpdate,B) componentDidUpdate,C) render(),D) componentWillMount', 'A', 5),
(463, 6, 'Which hook is used for memoization?', 'mcq', 'A) useMemo,B) useCallback,C) useRef,D) useState', 'A', 5),
(464, 6, 'Which hook caches callback functions?', 'mcq', 'A) useCallback,B) useMemo,C) useRef,D) useState', 'A', 5),
(465, 6, 'Which tool is used for state management globally?', 'mcq', 'A) Redux,B) useState,C) useReducer,D) useEffect', 'A', 5),
(466, 6, 'Which middleware is commonly used with Redux for async actions?', 'mcq', 'A) Redux Thunk,B) Redux Saga,C) Redux Logger,D) Redux Toolkit', 'A', 5),
(467, 6, 'Which method updates Redux store?', 'mcq', 'A) dispatch(),B) setState(),C) useState(),D) update()', 'A', 5),
(468, 6, 'Which function connects React component to Redux store?', 'mcq', 'A) connect(),B) useStore(),C) mapState(),D) bindAction()', 'A', 5),
(469, 6, 'Which React version introduced hooks?', 'mcq', 'A) 16.8,B) 15.5,C) 17.0,D) 16.0', 'A', 5),
(470, 6, 'Which JSX element represents fragments?', 'mcq', 'A) <></>,B) <div></div>,C) <Fragment></Fragment>,D) <span></span>', 'A', 5),
(471, 6, 'Which attribute prevents default form submission?', 'mcq', 'A) event.preventDefault(),B) stopPropagation(),C) defaultPrevented,D) preventForm()', 'A', 5),
(472, 6, 'Which method in React handles errors in components?', 'mcq', 'A) componentDidCatch,B) getDerivedStateFromError,C) render(),D) both A and B', 'D', 5),
(473, 6, 'Which library is used for testing React components?', 'mcq', 'A) Jest,B) Mocha,C) Jasmine,D) Chai', 'A', 5),
(474, 6, 'Which library is used for React DOM testing?', 'mcq', 'A) @testing-library/react,B) react-test,B) enzyme,C) jest-dom', 'A', 5),
(475, 6, 'Which hook is used to handle refs in functional components?', 'mcq', 'A) useRef,B) createRef,C) useState,D) useEffect', 'A', 5),
(476, 6, 'Which method is used to force re-render in class component?', 'mcq', 'A) forceUpdate(),B) setState(),C) render(),D) update()', 'A', 5),
(477, 6, 'Which React hook handles component mount/unmount lifecycle?', 'mcq', 'A) useEffect,B) useState,C) useReducer,D) useMemo', 'A', 5),
(478, 6, 'Which method prevents unnecessary re-render?', 'mcq', 'A) React.memo,B) useMemo,C) useCallback,D) shouldComponentUpdate', 'A', 5),
(479, 6, 'Which library is used for routing in React applications?', 'mcq', 'A) react-router-dom,B) react-router,C) react-router-native,D) route', 'A', 5),
(480, 6, 'Which hook shares state between components without props?', 'mcq', 'A) useContext,B) useState,C) useReducer,D) useMemo', 'A', 5),
(481, 6, 'Which tool is used to bundle React applications?', 'mcq', 'A) Webpack,B) Babel,C) Parcel,D) Rollup', 'A', 5),
(482, 6, 'Which library is used for transpiling JSX?', 'mcq', 'A) Babel,B) Webpack,C) Parcel,D) TypeScript', 'A', 5),
(483, 6, 'Which React pattern prevents prop drilling?', 'mcq', 'A) Context API,B) Redux,C) Hooks,D) HOC', 'A', 5),
(484, 6, 'Which method updates state based on previous state?', 'mcq', 'A) setState((prev) => newState),B) setState(newState),C) useState(),D) dispatch()', 'A', 5),
(485, 6, 'Which hook manages side effects in functional components?', 'mcq', 'A) useEffect,B) useState,C) useMemo,D) useReducer', 'A', 5),
(486, 6, 'Which hook memoizes expensive calculations?', 'mcq', 'A) useMemo,B) useCallback,C) useRef,D) useState', 'A', 5),
(487, 6, 'Which method accesses event target value in React?', 'mcq', 'A) event.target.value,B) event.value,C) target.value,D) value()', 'A', 5),
(488, 6, 'Which library is used to handle forms in React?', 'mcq', 'A) Formik,B) react-hook-form,C) Both A and B,D) None', 'C', 5),
(489, 6, 'Which method handles component updates efficiently?', 'mcq', 'A) shouldComponentUpdate,B) componentDidUpdate,C) setState(),D) render()', 'A', 5),
(490, 6, 'Which React hook replaces lifecycle methods in functional components?', 'mcq', 'A) useEffect,B) useState,C) useReducer,D) useMemo', 'A', 5),
(491, 6, 'Which method prevents unnecessary re-render of child components?', 'mcq', 'A) React.memo,B) PureComponent,C) useMemo,D) useCallback', 'A', 5),
(492, 6, 'Which library manages global state in React?', 'mcq', 'A) Redux,B) useState,C) useReducer,D) useEffect', 'A', 5),
(493, 6, 'Which middleware handles async actions in Redux?', 'mcq', 'A) Redux Thunk,B) Redux Saga,C) Both A and B,D) None', 'C', 5),
(494, 6, 'Which hook caches callback functions?', 'mcq', 'A) useCallback,B) useMemo,C) useState,D) useEffect', 'A', 5),
(495, 6, 'Which React method is used to clone elements?', 'mcq', 'A) React.cloneElement,B) React.createElement,C) React.memo,D) React.forwardRef', 'A', 5),
(496, 6, 'Which library handles navigation in React Native and React Web?', 'mcq', 'A) react-router-dom,B) react-navigation,C) react-router,D) Both A and B', 'D', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `questions_count` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`id`, `title`, `description`, `thumbnail`, `duration`, `questions_count`, `created_at`) VALUES
(1, 'Java OOP Concepts Explained', 'Learn core Object Oriented Programming concepts with examples.', 'thumbnails/java_oop.jpg', '12:32', 15, '2025-11-17 04:36:03'),
(2, 'SQL Joins Full Guide', 'Understand INNER, LEFT, RIGHT, FULL joins in SQL.', 'thumbnails/sql.avif', '08:55', 10, '2025-11-17 04:36:03'),
(3, 'PHP Basics for Beginners', 'Start learning PHP programming from scratch with examples.', 'thumbnails/php.jpg', '10:20', 12, '2025-11-17 04:36:03'),
(4, 'HTML & CSS Crash Course', 'Learn to build responsive websites using HTML and CSS.', 'thumbnails/html.jpg', '09:45', 8, '2025-11-17 04:36:03'),
(5, 'Python Basics for Beginners', 'Start learning Python programming from scratch with easy examples and exercises.', 'thumbnails/python.png', '11:30', 14, '2025-11-17 21:38:57'),
(6, 'JavaScript Fundamentals', 'Learn the fundamentals of JavaScript, including variables, functions, and DOM manipulation.', 'thumbnails/javascript.png', '13:15', 16, '2025-11-17 21:38:57');

-- --------------------------------------------------------

--
-- Table structure for table `tutorial_questions`
--

CREATE TABLE `tutorial_questions` (
  `id` int(11) NOT NULL,
  `tutorial_subtopic_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`)),
  `correct_answer` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutorial_questions`
--

INSERT INTO `tutorial_questions` (`id`, `tutorial_subtopic_id`, `question_text`, `options`, `correct_answer`, `created_at`) VALUES
(1, 13, 'Which of the following is a valid variable name in Python?', '[\"my_var\", \"2var\", \"var-name\", \"_var\"]', 'my_var', '2025-11-17 22:09:06'),
(2, 13, 'Which of these is not a valid data type in Python?', '[\"int\", \"float\", \"string\", \"real\"]', 'real', '2025-11-17 22:09:06'),
(3, 13, 'What is the data type of 3.14 in Python?', '[\"int\", \"float\", \"str\", \"bool\"]', 'float', '2025-11-17 22:09:06'),
(4, 13, 'Which symbol is used to assign a value to a variable in Python?', '[\"=\", \"==\", \":=\", \"->\"]', '=', '2025-11-17 22:09:06'),
(5, 13, 'Which of the following is mutable in Python?', '[\"tuple\", \"list\", \"str\", \"int\"]', 'list', '2025-11-17 22:09:06'),
(6, 13, 'What will be the type of result of 5 / 2 in Python 3?', '[\"int\", \"float\", \"str\", \"bool\"]', 'float', '2025-11-17 22:09:06'),
(7, 13, 'Which of these is a valid Boolean value in Python?', '[\"True\", \"true\", \"FALSE\", \"yes\"]', 'True', '2025-11-17 22:09:06'),
(8, 13, 'Which of the following is a valid way to declare multiple variables in one line?', '[\"a = b = c = 1\", \"a, b, c = 1\", \"a = 1, b = 2, c = 3\", \"All of the above\"]', 'All of the above', '2025-11-17 22:09:06'),
(9, 13, 'What is the output of type(\"Hello\") in Python?', '[\"<class str>\", \"<class int>\", \"<class string>\", \"<str>\"]', '<class str>', '2025-11-17 22:09:06'),
(10, 13, 'Which of these variable names is invalid in Python?', '[\"var1\", \"1var\", \"_var\", \"var_1\"]', '1var', '2025-11-17 22:09:06'),
(11, 14, 'Which of the following is a valid Python for loop syntax?', '[\"for i in range(5):\", \"for(i=0;i<5;i++)\", \"foreach i in range(5):\", \"for i=1 to 5:\"]', 'for i in range(5):', '2025-11-17 22:10:18'),
(12, 14, 'What is the output of the following code? if 5>2: print(\"Yes\")', '[\"Yes\", \"No\", \"Error\", \"Nothing\"]', 'Yes', '2025-11-17 22:10:18'),
(13, 14, 'Which keyword is used for an alternative condition in Python?', '[\"elseif\", \"else\", \"elif\", \"otherwise\"]', 'elif', '2025-11-17 22:10:18'),
(14, 14, 'Which loop is best when the number of iterations is known?', '[\"while loop\", \"for loop\", \"do-while loop\", \"None\"]', 'for loop', '2025-11-17 22:10:18'),
(15, 14, 'What will the following code print? x = 0\nwhile x < 3:\n  print(x)\n  x += 1', '[\"0 1 2\", \"1 2 3\", \"0 1 2 3\", \"Error\"]', '0 1 2', '2025-11-17 22:10:18'),
(16, 14, 'Which of these statements can be used to skip the current iteration?', '[\"break\", \"continue\", \"pass\", \"exit\"]', 'continue', '2025-11-17 22:10:18'),
(17, 14, 'Which statement is used to exit a loop prematurely?', '[\"break\", \"continue\", \"exit\", \"pass\"]', 'break', '2025-11-17 22:10:18'),
(18, 14, 'What is the output of: for i in range(3):\n  print(i)\nelse:\n  print(\"Done\")', '[\"0 1 2 Done\", \"0 1 2\", \"Done\", \"Error\"]', '0 1 2 Done', '2025-11-17 22:10:18'),
(19, 14, 'Which of the following is a valid while loop?', '[\"while i < 5:\", \"while(i<5)\", \"while i < 5 then\", \"while i = 5:\"]', 'while i < 5:', '2025-11-17 22:10:18'),
(20, 14, 'Which keyword is used when no action is required inside a loop or condition?', '[\"pass\", \"continue\", \"break\", \"skip\"]', 'pass', '2025-11-17 22:10:18'),
(21, 15, 'Which keyword is used to define a function in Python?', '[\"func\", \"def\", \"function\", \"define\"]', 'def', '2025-11-17 22:14:17'),
(22, 15, 'What is the correct way to call a function named my_func?', '[\"call my_func()\", \"my_func()\", \"call my_func\", \"my_func\"]', 'my_func()', '2025-11-17 22:14:17'),
(23, 15, 'How do you specify default parameter values in Python functions?', '[\"def func(a=5):\", \"def func(a): a=5\", \"def func(a?5):\", \"def func(a<-5):\"]', 'def func(a=5):', '2025-11-17 22:14:17'),
(24, 15, 'What will the following function return?\n def add(x, y):\n  return x + y\n add(2, 3)', '[\"2\", \"3\", \"5\", \"Error\"]', '5', '2025-11-17 22:14:17'),
(25, 15, 'Which of these is used to return a value from a function?', '[\"yield\", \"return\", \"output\", \"send\"]', 'return', '2025-11-17 22:14:17'),
(26, 15, 'What is the output of: def foo():\n  pass\nprint(foo())', '[\"None\", \"0\", \"pass\", \"Error\"]', 'None', '2025-11-17 22:14:17'),
(27, 15, 'Which of the following statements is true about Python functions?', '[\"Functions can return multiple values\", \"Functions cannot take default arguments\", \"Functions cannot be nested\", \"Functions cannot have variable number of arguments\"]', 'Functions can return multiple values', '2025-11-17 22:14:17'),
(28, 15, 'Which operator is used to unpack arguments in function calls?', '[\"*\", \"&\", \"@\", \"%\"]', '*', '2025-11-17 22:14:17'),
(29, 15, 'What is a lambda function in Python?', '[\"A function defined without a name\", \"A function that prints output\", \"A function with multiple return values\", \"A decorator function\"]', 'A function defined without a name', '2025-11-17 22:14:17'),
(30, 15, 'How can you pass a variable number of arguments to a function?', '[\"def func(*args):\", \"def func(args*):\", \"def func(**args):\", \"def func(args**):\"]', 'def func(*args):', '2025-11-17 22:14:17'),
(71, 17, 'Which of the following is a valid variable declaration in JavaScript?', '[\"var myVar;\", \"int myVar;\", \"let 1var;\", \"const var-name;\"]', 'var myVar;', '2025-11-17 22:18:47'),
(72, 17, 'Which keyword allows block-scoped variable declaration in JavaScript?', '[\"var\", \"let\", \"const\", \"both let and const\"]', 'both let and const', '2025-11-17 22:19:28'),
(73, 17, 'Which of these is not a valid data type in JavaScript?', '[\"Number\", \"String\", \"Boolean\", \"Character\"]', 'Character', '2025-11-17 22:19:28'),
(74, 17, 'What is the type of NaN in JavaScript?', '[\"number\", \"string\", \"undefined\", \"object\"]', 'number', '2025-11-17 22:19:28'),
(75, 17, 'Which keyword is used to declare a constant variable?', '[\"const\", \"let\", \"var\", \"constant\"]', 'const', '2025-11-17 22:19:28'),
(76, 17, 'What will be the output of: typeof true?', '[\"boolean\", \"string\", \"number\", \"object\"]', 'boolean', '2025-11-17 22:19:28'),
(77, 17, 'Which of the following is used to declare multiple variables at once?', '[\"var a, b, c;\", \"let a, b, c;\", \"const a=1, b=2, c=3;\", \"All of the above\"]', 'All of the above', '2025-11-17 22:19:28'),
(78, 17, 'What is the output of: var x; console.log(typeof x);', '[\"undefined\", \"null\", \"object\", \"number\"]', 'undefined', '2025-11-17 22:19:28'),
(79, 17, 'Which of these is a valid string declaration?', '[\"var str = \\\'Hello\\\';\", \"var str = Hello;\", \"var str = \\\"Hello\\\";\", \"var str = `Hello]`\"]', 'var str = \'Hello\';', '2025-11-17 22:19:28'),
(80, 17, 'What is the difference between null and undefined in JavaScript?', '[\"null is an object representing no value, undefined means variable is declared but not assigned\", \"They are the same\", \"null means uninitialized, undefined is a type\", \"undefined is a string\"]', 'null is an object representing no value, undefined means variable is declared but not assigned', '2025-11-17 22:19:28'),
(81, 18, 'Which keyword is used to define a function in JavaScript?', '[\"function\", \"func\", \"def\", \"fun\"]', 'function', '2025-11-17 22:20:45'),
(82, 18, 'How do you call a function named myFunc in JavaScript?', '[\"call myFunc()\", \"myFunc()\", \"myFunc\", \"execute myFunc()\"]', 'myFunc()', '2025-11-17 22:20:45'),
(83, 18, 'Which of the following allows a function to return a value?', '[\"return\", \"yield\", \"output\", \"send\"]', 'return', '2025-11-17 22:20:45'),
(84, 18, 'What is the output of: function test(){ } console.log(test());', '[\"undefined\", \"null\", \"0\", \"Error\"]', 'undefined', '2025-11-17 22:20:45'),
(85, 18, 'Which scope allows variables to be accessed anywhere in the code?', '[\"Local\", \"Global\", \"Block\", \"Function\"]', 'Global', '2025-11-17 22:20:45'),
(86, 18, 'What is the difference between var, let, and const in function scope?', '[\"var is function scoped, let/const are block scoped\", \"All are block scoped\", \"All are function scoped\", \"var and let are block scoped, const is global\"]', 'var is function scoped, let/const are block scoped', '2025-11-17 22:20:45'),
(87, 18, 'Which of the following is a correct way to define an arrow function?', '[\"const add = (a,b)=>a+b;\", \"function add(a,b)=>a+b;\", \"let add(a,b){return a+b;}\", \"add = (a,b) => return a+b;\"]', 'const add = (a,b)=>a+b;', '2025-11-17 22:20:45'),
(88, 18, 'What happens if a variable is declared inside a function with var?', '[\"It is global\", \"It is local to the function\", \"It is block scoped\", \"It can be accessed anywhere\"]', 'It is local to the function', '2025-11-17 22:20:45'),
(89, 18, 'Which type of function can access variables from its outer function?', '[\"Arrow function\", \"Nested function\", \"Anonymous function\", \"Global function\"]', 'Nested function', '2025-11-17 22:20:45'),
(90, 18, 'What is the scope of a variable declared with const inside a function?', '[\"Global\", \"Block\", \"Function\", \"Depends on context\"]', 'Block', '2025-11-17 22:20:45'),
(91, 19, 'Which of the following is a valid for loop in JavaScript?', '[\"for(let i=0;i<5;i++)\", \"for i=0 to 5\", \"for i in 0..5\", \"foreach(i=0;i<5;i++)\"]', 'for(let i=0;i<5;i++)', '2025-11-17 22:21:22'),
(92, 19, 'Which loop runs at least once regardless of the condition?', '[\"for loop\", \"while loop\", \"do-while loop\", \"foreach loop\"]', 'do-while loop', '2025-11-17 22:21:22'),
(93, 19, 'What will be the output of: let x=0; while(x<3){ console.log(x); x++; }', '[\"0 1 2\", \"1 2 3\", \"0 1 2 3\", \"Error\"]', '0 1 2', '2025-11-17 22:21:22'),
(94, 19, 'Which statement is used to exit a loop prematurely?', '[\"continue\", \"break\", \"pass\", \"return\"]', 'break', '2025-11-17 22:21:22'),
(95, 19, 'Which statement is used to skip the current iteration of a loop?', '[\"break\", \"continue\", \"pass\", \"return\"]', 'continue', '2025-11-17 22:21:22'),
(96, 19, 'What is the output of: for(let i=0;i<3;i++){console.log(i);} else {console.log(\"Done\");}', '[\"Error\", \"0 1 2 Done\", \"0 1 2\", \"Done\"]', '0 1 2 Done', '2025-11-17 22:21:22'),
(97, 19, 'Which loop is suitable when the number of iterations is unknown?', '[\"for loop\", \"while loop\", \"do-while loop\", \"All of the above\"]', 'while loop', '2025-11-17 22:21:22'),
(98, 19, 'Which of the following is true about break in nested loops?', '[\"Break exits the inner loop only\", \"Break exits all loops\", \"Break exits the outer loop only\", \"Break has no effect\"]', 'Break exits the inner loop only', '2025-11-17 22:21:22'),
(99, 19, 'Which of these is valid syntax for a for-in loop?', '[\"for(let key in object)\", \"for(key in object)\", \"for key in object\", \"for i in object\"]', 'for(let key in object)', '2025-11-17 22:21:22'),
(100, 19, 'Which of the following is a valid while loop?', '[\"while(i<5)\", \"while i<5\", \"while i<5 then\", \"while(i<5){}\"]', 'while(i<5)', '2025-11-17 22:21:22'),
(101, 1, 'Who developed Java?', '[\"Microsoft\", \"Sun Microsystems\", \"Oracle\", \"IBM\"]', 'Sun Microsystems', '2025-11-17 22:22:01'),
(102, 1, 'Which of these is the correct extension of Java files?', '[\".java\", \".js\", \".class\", \".jav\"]', '.java', '2025-11-17 22:22:01'),
(103, 1, 'Which of these is not a feature of Java?', '[\"Object-oriented\", \"Platform Independent\", \"Use of pointers\", \"Multithreaded\"]', 'Use of pointers', '2025-11-17 22:22:01'),
(104, 1, 'Which keyword is used to define a class in Java?', '[\"class\", \"Class\", \"define\", \"struct\"]', 'class', '2025-11-17 22:22:01'),
(105, 1, 'Which of these is the correct way to start the main method in Java?', '[\"public static void main(String[] args)\", \"void main(String args[])\", \"public main(String[] args)\", \"main(String[] args)\"]', 'public static void main(String[] args)', '2025-11-17 22:22:01'),
(106, 1, 'What is the size of int data type in Java?', '[\"4 bytes\", \"2 bytes\", \"8 bytes\", \"Depends on system\"]', '4 bytes', '2025-11-17 22:22:01'),
(107, 1, 'Which of the following is the correct way to declare a variable in Java?', '[\"int a;\", \"integer a;\", \"var a;\", \"num a;\"]', 'int a;', '2025-11-17 22:22:01'),
(108, 1, 'Which operator is used to compare two values in Java?', '[\"=\", \"==\", \"===\", \"!=\"]', '==', '2025-11-17 22:22:01'),
(109, 1, 'Which of these is a valid comment in Java?', '[\"// This is a comment\", \"/* This is a comment */\", \"# This is a comment\", \"Both A and B\"]', 'Both A and B', '2025-11-17 22:22:01'),
(110, 1, 'Which of these is the entry point of any Java program?', '[\"main method\", \"start method\", \"init method\", \"run method\"]', 'main method', '2025-11-17 22:22:01'),
(111, 2, 'Which of the following is a valid variable name in Java?', '[\"myVar\", \"2var\", \"var-name\", \"_var\"]', 'myVar', '2025-11-17 22:23:22'),
(112, 2, 'Which of these is not a valid data type in Java?', '[\"int\", \"float\", \"String\", \"real\"]', 'real', '2025-11-17 22:23:22'),
(113, 2, 'What is the default value of an int variable in Java?', '[\"0\", \"null\", \"undefined\", \"1\"]', '0', '2025-11-17 22:23:22'),
(114, 2, 'Which of the following is used to declare a constant in Java?', '[\"final\", \"const\", \"constant\", \"immutable\"]', 'final', '2025-11-17 22:23:22'),
(115, 2, 'Which of the following variable types is used to store true/false values?', '[\"int\", \"boolean\", \"char\", \"String\"]', 'boolean', '2025-11-17 22:23:22'),
(116, 2, 'What is the size of a float variable in Java?', '[\"4 bytes\", \"8 bytes\", \"2 bytes\", \"Depends on system\"]', '4 bytes', '2025-11-17 22:23:22'),
(117, 2, 'Which of these is the correct way to declare multiple variables of the same type?', '[\"int a, b, c;\", \"int a; b; c;\", \"int a b c;\", \"int a = b = c;\"]', 'int a, b, c;', '2025-11-17 22:23:22'),
(118, 2, 'Which of these is a valid way to initialize a variable?', '[\"int x = 10;\", \"x = int 10;\", \"int x := 10;\", \"int x == 10;\"]', 'int x = 10;', '2025-11-17 22:23:22'),
(119, 2, 'Which of the following identifiers is invalid in Java?', '[\"var1\", \"1var\", \"_var\", \"var_1\"]', '1var', '2025-11-17 22:23:22'),
(120, 2, 'Which of these is a local variable?', '[\"Declared inside a method\", \"Declared outside a method\", \"Declared static\", \"Declared final\"]', 'Declared inside a method', '2025-11-17 22:23:22'),
(121, 3, 'What does OOP stand for in Java?', '[\"Object-Oriented Programming\", \"Object Operational Programming\", \"Oriented Object Programming\", \"Object Option Programming\"]', 'Object-Oriented Programming', '2025-11-17 22:23:58'),
(122, 3, 'Which of the following is not a pillar of OOP?', '[\"Encapsulation\", \"Polymorphism\", \"Abstraction\", \"Compilation\"]', 'Compilation', '2025-11-17 22:23:58'),
(123, 3, 'Which keyword is used to inherit a class in Java?', '[\"extends\", \"implements\", \"inherits\", \"super\"]', 'extends', '2025-11-17 22:23:58'),
(124, 3, 'Which of the following allows multiple forms in Java?', '[\"Encapsulation\", \"Polymorphism\", \"Abstraction\", \"Inheritance\"]', 'Polymorphism', '2025-11-17 22:23:58'),
(125, 3, 'Which of the following is used to hide implementation details in Java?', '[\"Encapsulation\", \"Polymorphism\", \"Abstraction\", \"Inheritance\"]', 'Abstraction', '2025-11-17 22:23:58'),
(126, 3, 'What is the default access modifier for a class in Java?', '[\"private\", \"protected\", \"public\", \"package-private\"]', 'package-private', '2025-11-17 22:23:58'),
(127, 3, 'Which of these is true about Java constructors?', '[\"A constructor has no return type\", \"A constructor must have void return type\", \"A constructor must be static\", \"A constructor cannot have parameters\"]', 'A constructor has no return type', '2025-11-17 22:23:58'),
(128, 3, 'Which keyword is used to call the parent class constructor?', '[\"super\", \"this\", \"parent\", \"base\"]', 'super', '2025-11-17 22:23:58'),
(129, 3, 'What is method overloading?', '[\"Same method name with different parameters\", \"Same method name with same parameters\", \"Different method names with same parameters\", \"Using methods from parent class\"]', 'Same method name with different parameters', '2025-11-17 22:23:58'),
(130, 3, 'What is method overriding?', '[\"Child class method redefines parent class method\", \"Child class method overloads parent class method\", \"Parent class method hides child class method\", \"Using final methods in parent class\"]', 'Child class method redefines parent class method', '2025-11-17 22:23:58'),
(131, 4, 'What does SQL stand for?', '[\"Structured Query Language\", \"Simple Query Language\", \"Standard Query Language\", \"Sequential Query Language\"]', 'Structured Query Language', '2025-11-17 22:28:06'),
(132, 4, 'Which SQL statement is used to retrieve data from a database?', '[\"SELECT\", \"GET\", \"FETCH\", \"RETRIEVE\"]', 'SELECT', '2025-11-17 22:28:06'),
(133, 4, 'Which SQL clause is used to filter records?', '[\"WHERE\", \"ORDER BY\", \"GROUP BY\", \"HAVING\"]', 'WHERE', '2025-11-17 22:28:06'),
(134, 4, 'Which statement is used to delete data from a table?', '[\"DELETE\", \"DROP\", \"REMOVE\", \"TRUNCATE\"]', 'DELETE', '2025-11-17 22:28:06'),
(135, 4, 'Which SQL command is used to create a new table?', '[\"CREATE TABLE\", \"NEW TABLE\", \"MAKE TABLE\", \"TABLE CREATE\"]', 'CREATE TABLE', '2025-11-17 22:28:06'),
(136, 4, 'Which operator is used for pattern matching in SQL?', '[\"LIKE\", \"MATCH\", \"PATTERN\", \"REGEX\"]', 'LIKE', '2025-11-17 22:28:06'),
(137, 4, 'Which SQL statement is used to modify existing data in a table?', '[\"UPDATE\", \"MODIFY\", \"CHANGE\", \"ALTER\"]', 'UPDATE', '2025-11-17 22:28:06'),
(138, 4, 'Which keyword is used to sort the result set?', '[\"ORDER BY\", \"SORT\", \"GROUP BY\", \"HAVING\"]', 'ORDER BY', '2025-11-17 22:28:06'),
(139, 4, 'Which SQL function is used to count the number of rows?', '[\"COUNT()\", \"SUM()\", \"TOTAL()\", \"NUMBER()\"]', 'COUNT()', '2025-11-17 22:28:06'),
(140, 4, 'Which clause is used to combine rows from two or more tables?', '[\"JOIN\", \"UNION\", \"MERGE\", \"CONNECT\"]', 'JOIN', '2025-11-17 22:28:06'),
(141, 5, 'Which SQL statement is used to select all columns from a table?', '[\"SELECT * FROM table_name;\", \"SELECT ALL FROM table_name;\", \"SELECT COLUMNS FROM table_name;\", \"SELECT table_name;\"]', 'SELECT * FROM table_name;', '2025-11-17 22:28:46'),
(142, 5, 'Which clause is used to select only distinct values?', '[\"DISTINCT\", \"UNIQUE\", \"FILTER\", \"DIFFERENT\"]', 'DISTINCT', '2025-11-17 22:28:46'),
(143, 5, 'How do you select specific columns from a table?', '[\"SELECT column1, column2 FROM table_name;\", \"SELECT table_name.column1;\", \"SELECT * FROM table_name;\", \"SELECT ONLY column1, column2;\"]', 'SELECT column1, column2 FROM table_name;', '2025-11-17 22:28:46'),
(144, 5, 'Which clause is used to filter rows based on a condition?', '[\"WHERE\", \"HAVING\", \"FILTER\", \"GROUP BY\"]', 'WHERE', '2025-11-17 22:28:46'),
(145, 5, 'Which operator is used for pattern matching in SELECT queries?', '[\"LIKE\", \"MATCH\", \"REGEX\", \"PATTERN\"]', 'LIKE', '2025-11-17 22:28:46'),
(146, 5, 'How do you sort the result set in ascending order?', '[\"ORDER BY column_name ASC;\", \"SORT BY column_name;\", \"ORDER column_name ASC;\", \"ARRANGE BY column_name;\"]', 'ORDER BY column_name ASC;', '2025-11-17 22:28:46'),
(147, 5, 'Which clause is used to group rows in a SELECT query?', '[\"GROUP BY\", \"ORDER BY\", \"HAVING\", \"WHERE\"]', 'GROUP BY', '2025-11-17 22:28:46'),
(148, 5, 'Which function is used to calculate the total number of rows?', '[\"COUNT()\", \"SUM()\", \"TOTAL()\", \"NUMBER()\"]', 'COUNT()', '2025-11-17 22:28:46'),
(149, 5, 'Which clause is used to filter groups in a SELECT query?', '[\"HAVING\", \"WHERE\", \"GROUP BY\", \"ORDER BY\"]', 'HAVING', '2025-11-17 22:28:46'),
(150, 5, 'Which keyword is used to combine the result of two SELECT queries?', '[\"UNION\", \"JOIN\", \"MERGE\", \"COMBINE\"]', 'UNION', '2025-11-17 22:28:46'),
(151, 6, 'Which SQL keyword is used to combine rows from two or more tables based on a related column?', '[\"JOIN\", \"UNION\", \"MERGE\", \"COMBINE\"]', 'JOIN', '2025-11-17 22:29:24'),
(152, 6, 'Which type of join returns only the matching rows from both tables?', '[\"INNER JOIN\", \"LEFT JOIN\", \"RIGHT JOIN\", \"FULL JOIN\"]', 'INNER JOIN', '2025-11-17 22:29:24'),
(153, 6, 'Which join returns all records from the left table and matching records from the right table?', '[\"LEFT JOIN\", \"RIGHT JOIN\", \"INNER JOIN\", \"FULL JOIN\"]', 'LEFT JOIN', '2025-11-17 22:29:24'),
(154, 6, 'Which join returns all records from the right table and matching records from the left table?', '[\"RIGHT JOIN\", \"LEFT JOIN\", \"INNER JOIN\", \"FULL JOIN\"]', 'RIGHT JOIN', '2025-11-17 22:29:24'),
(155, 6, 'Which join returns all records when there is a match in one of the tables?', '[\"FULL OUTER JOIN\", \"INNER JOIN\", \"LEFT JOIN\", \"RIGHT JOIN\"]', 'FULL OUTER JOIN', '2025-11-17 22:29:24'),
(156, 6, 'Which clause is used to specify the condition for a join?', '[\"ON\", \"WHERE\", \"USING\", \"MATCH\"]', 'ON', '2025-11-17 22:29:24'),
(157, 6, 'Which join will return rows even if there is no match in the other table?', '[\"OUTER JOIN\", \"INNER JOIN\", \"SELF JOIN\", \"CROSS JOIN\"]', 'OUTER JOIN', '2025-11-17 22:29:24'),
(158, 6, 'Which type of join can be used to join a table to itself?', '[\"SELF JOIN\", \"INNER JOIN\", \"LEFT JOIN\", \"RIGHT JOIN\"]', 'SELF JOIN', '2025-11-17 22:29:24'),
(159, 6, 'Which of the following is used to join tables without using the JOIN keyword?', '[\"Comma operator in FROM clause\", \"WHERE clause\", \"GROUP BY\", \"HAVING\"]', 'Comma operator in FROM clause', '2025-11-17 22:29:24'),
(160, 6, 'Which join returns the Cartesian product of two tables?', '[\"CROSS JOIN\", \"INNER JOIN\", \"LEFT JOIN\", \"FULL JOIN\"]', 'CROSS JOIN', '2025-11-17 22:29:24'),
(161, 7, 'What does PHP stand for?', '[\"Hypertext Preprocessor\", \"Personal Home Page\", \"Private Home Page\", \"Pretext Hyper Processor\"]', 'Hypertext Preprocessor', '2025-11-17 22:30:16'),
(162, 7, 'Which symbol is used to declare a variable in PHP?', '[\"$\", \"&\", \"#\", \"@\"]', '$', '2025-11-17 22:30:16'),
(163, 7, 'Which of the following is a correct way to start a PHP block?', '[\"<?php\", \"<?\", \"<%\", \"<script>\"]', '<?php', '2025-11-17 22:30:16'),
(164, 7, 'Which function is used to output data in PHP?', '[\"echo\", \"print\", \"printf\", \"All of the above\"]', 'All of the above', '2025-11-17 22:30:16'),
(165, 7, 'Which of these is the correct way to write a comment in PHP?', '[\"// comment\", \"/* comment */\", \"# comment\", \"All of the above\"]', 'All of the above', '2025-11-17 22:30:16'),
(166, 7, 'Which of the following is a valid data type in PHP?', '[\"String\", \"Integer\", \"Boolean\", \"All of the above\"]', 'All of the above', '2025-11-17 22:30:16'),
(167, 7, 'How do you concatenate two strings in PHP?', '[\".\", \"+\", \"&\", \"concat()\"]', '.', '2025-11-17 22:30:16'),
(168, 7, 'Which operator is used for comparison in PHP?', '[\"==\", \"=\", \"===\", \"All of the above\"]', '==', '2025-11-17 22:30:16'),
(169, 7, 'Which function is used to check if a variable is set?', '[\"isset()\", \"empty()\", \"checkset()\", \"defined()\"]', 'isset()', '2025-11-17 22:30:16'),
(170, 7, 'Which superglobal array is used to collect form data sent with POST method?', '[\"$_POST\", \"$_GET\", \"$_REQUEST\", \"$_FORM\"]', '$_POST', '2025-11-17 22:30:16'),
(171, 8, 'Which symbol is used to declare a variable in PHP?', '[\"$\", \"&\", \"#\", \"@\"]', '$', '2025-11-17 22:30:49'),
(172, 8, 'Which of the following is a valid variable name in PHP?', '[\"$myVar\", \"$2var\", \"$var-name\", \"$var name\"]', '$myVar', '2025-11-17 22:30:49'),
(173, 8, 'PHP variable names are case-sensitive?', '[\"True\", \"False\"]', 'True', '2025-11-17 22:30:49'),
(174, 8, 'Which of these is a valid way to assign a value to a variable?', '[\"$x = 10;\", \"$x == 10;\", \"$x : 10;\", \"$x := 10;\"]', '$x = 10;', '2025-11-17 22:30:49'),
(175, 8, 'What is the scope of a variable declared inside a function without \"global\"?', '[\"Local\", \"Global\", \"Static\", \"None\"]', 'Local', '2025-11-17 22:30:49'),
(176, 8, 'Which keyword is used to access a global variable inside a function?', '[\"global\", \"var\", \"this\", \"scope\"]', 'global', '2025-11-17 22:30:49'),
(177, 8, 'Which of the following is a valid variable type in PHP?', '[\"Integer\", \"String\", \"Boolean\", \"All of the above\"]', 'All of the above', '2025-11-17 22:30:49'),
(178, 8, 'Which superglobal is used to access variables from the URL?', '[\"$_GET\", \"$_POST\", \"$_REQUEST\", \"$_SESSION\"]', '$_GET', '2025-11-17 22:30:49'),
(179, 8, 'Which function is used to check if a variable is set?', '[\"isset()\", \"empty()\", \"defined()\", \"checkvar()\"]', 'isset()', '2025-11-17 22:30:49'),
(180, 8, 'Which function is used to destroy a variable in PHP?', '[\"unset()\", \"destroy()\", \"delete()\", \"remove()\"]', 'unset()', '2025-11-17 22:30:49'),
(181, 9, 'Which of the following is a correct syntax for a for loop in PHP?', '[\"for($i=0;$i<5;$i++){}\", \"for i=0 to 5 {}\", \"for $i in range(0,5){}\", \"foreach($i=0;$i<5;$i++){}\"]', 'for($i=0;$i<5;$i++){}', '2025-11-17 22:31:30'),
(182, 9, 'Which loop in PHP executes at least once regardless of the condition?', '[\"while loop\", \"for loop\", \"do-while loop\", \"foreach loop\"]', 'do-while loop', '2025-11-17 22:31:30'),
(183, 9, 'Which loop is best when the number of iterations is unknown?', '[\"for loop\", \"while loop\", \"do-while loop\", \"foreach loop\"]', 'while loop', '2025-11-17 22:31:30'),
(184, 9, 'Which statement is used to exit a loop prematurely?', '[\"break\", \"continue\", \"exit\", \"return\"]', 'break', '2025-11-17 22:31:30'),
(185, 9, 'Which statement is used to skip the current iteration of a loop?', '[\"break\", \"continue\", \"pass\", \"next\"]', 'continue', '2025-11-17 22:31:30'),
(186, 9, 'Which loop is specifically used to iterate over arrays in PHP?', '[\"for loop\", \"while loop\", \"do-while loop\", \"foreach loop\"]', 'foreach loop', '2025-11-17 22:31:30'),
(187, 9, 'What will be the output of: $i=0; while($i<3){echo $i; $i++;}', '[\"012\", \"123\", \"0 1 2\", \"Error\"]', '012', '2025-11-17 22:31:30'),
(188, 9, 'Which of the following is true about break in nested loops?', '[\"Break exits the inner loop only\", \"Break exits all loops\", \"Break exits the outer loop only\", \"Break has no effect\"]', 'Break exits the inner loop only', '2025-11-17 22:31:30'),
(189, 9, 'How do you create an infinite loop using for?', '[\"for(;;){}\", \"for(0;0;0){}\", \"for($i=0;;$i++){}\", \"for(;0<1;){ }\"]', 'for(;;){}', '2025-11-17 22:31:30'),
(190, 9, 'Which loop can have an optional condition and still run?', '[\"do-while loop\", \"for loop\", \"while loop\", \"foreach loop\"]', 'do-while loop', '2025-11-17 22:31:30'),
(191, 10, 'What does HTML stand for?', '[\"Hyper Text Markup Language\", \"Hyperlinks and Text Markup Language\", \"Home Tool Markup Language\", \"Hyperlinking Text Marking Language\"]', 'Hyper Text Markup Language', '2025-11-17 22:32:09'),
(192, 10, 'Which HTML tag is used to create a paragraph?', '[\"<p>\", \"<para>\", \"<paragraph>\", \"<text>\"]', '<p>', '2025-11-17 22:32:09'),
(193, 10, 'Which attribute is used to specify an image source in HTML?', '[\"src\", \"href\", \"link\", \"img\"]', 'src', '2025-11-17 22:32:09'),
(194, 10, 'Which tag is used to create a hyperlink in HTML?', '[\"<a>\", \"<link>\", \"<href>\", \"<hyperlink>\"]', '<a>', '2025-11-17 22:32:09'),
(195, 10, 'Which tag is used to define a heading in HTML?', '[\"<h1> to <h6>\", \"<heading>\", \"<head>\", \"<title>\"]', '<h1> to <h6>', '2025-11-17 22:32:09'),
(196, 10, 'Which tag is used to create an unordered list?', '[\"<ul>\", \"<ol>\", \"<li>\", \"<list>\"]', '<ul>', '2025-11-17 22:32:09'),
(197, 10, 'Which attribute is used to provide alternative text for an image?', '[\"alt\", \"title\", \"text\", \"descr\"]', 'alt', '2025-11-17 22:32:09'),
(198, 10, 'Which tag is used to create a table row?', '[\"<tr>\", \"<td>\", \"<th>\", \"<table-row>\"]', '<tr>', '2025-11-17 22:32:09'),
(199, 10, 'Which tag is used to create a table header?', '[\"<th>\", \"<td>\", \"<tr>\", \"<thead>\"]', '<th>', '2025-11-17 22:32:09'),
(200, 10, 'Which tag is used to include JavaScript in HTML?', '[\"<script>\", \"<js>\", \"<javascript>\", \"<code>\"]', '<script>', '2025-11-17 22:32:09'),
(201, 11, 'Which HTML tag is used to create a form?', '[\"<form>\", \"<input>\", \"<fieldset>\", \"<label>\"]', '<form>', '2025-11-17 22:32:47'),
(202, 11, 'Which attribute specifies the URL where the form data is sent?', '[\"action\", \"method\", \"target\", \"enctype\"]', 'action', '2025-11-17 22:32:47'),
(203, 11, 'Which attribute specifies the HTTP method to be used when submitting the form?', '[\"method\", \"action\", \"type\", \"submit\"]', 'method', '2025-11-17 22:32:47'),
(204, 11, 'Which input type is used for a single-line text field?', '[\"text\", \"password\", \"email\", \"textarea\"]', 'text', '2025-11-17 22:32:47'),
(205, 11, 'Which input type is used for a checkbox?', '[\"checkbox\", \"radio\", \"option\", \"select\"]', 'checkbox', '2025-11-17 22:32:47'),
(206, 11, 'Which tag is used to group related elements within a form?', '[\"<fieldset>\", \"<div>\", \"<section>\", \"<form-group>\"]', '<fieldset>', '2025-11-17 22:32:47'),
(207, 11, 'Which attribute is used to specify a default value for an input field?', '[\"value\", \"default\", \"placeholder\", \"name\"]', 'value', '2025-11-17 22:32:47'),
(208, 11, 'Which input type allows selection of multiple options from a list?', '[\"select with multiple attribute\", \"checkbox\", \"radio\", \"textarea\"]', 'select with multiple attribute', '2025-11-17 22:32:47'),
(209, 11, 'Which input type is used to submit a form?', '[\"submit\", \"button\", \"reset\", \"send\"]', 'submit', '2025-11-17 22:32:47'),
(210, 11, 'Which attribute specifies a short hint displayed in an input field?', '[\"placeholder\", \"title\", \"value\", \"label\"]', 'placeholder', '2025-11-17 22:32:47'),
(211, 12, 'Which HTML tag is used to create a table?', '[\"<table>\", \"<tr>\", \"<td>\", \"<th>\"]', '<table>', '2025-11-17 22:33:24'),
(212, 12, 'Which tag is used to define a table row?', '[\"<tr>\", \"<td>\", \"<th>\", \"<row>\"]', '<tr>', '2025-11-17 22:33:24'),
(213, 12, 'Which tag is used to define a table header?', '[\"<th>\", \"<td>\", \"<tr>\", \"<thead>\"]', '<th>', '2025-11-17 22:33:24'),
(214, 12, 'Which tag is used to define a table cell?', '[\"<td>\", \"<th>\", \"<tr>\", \"<cell>\"]', '<td>', '2025-11-17 22:33:24'),
(215, 12, 'Which attribute is used to merge two or more cells horizontally?', '[\"colspan\", \"rowspan\", \"merge\", \"span\"]', 'colspan', '2025-11-17 22:33:24'),
(216, 12, 'Which attribute is used to merge two or more cells vertically?', '[\"rowspan\", \"colspan\", \"merge\", \"span\"]', 'rowspan', '2025-11-17 22:33:24'),
(217, 12, 'Which tag is used to group table rows that form the body of the table?', '[\"<tbody>\", \"<thead>\", \"<tfoot>\", \"<table>\"]', '<tbody>', '2025-11-17 22:33:24'),
(218, 12, 'Which tag is used to group table rows that form the header of the table?', '[\"<thead>\", \"<tbody>\", \"<tfoot>\", \"<tr>\"]', '<thead>', '2025-11-17 22:33:24'),
(219, 12, 'Which tag is used to group table rows that form the footer of the table?', '[\"<tfoot>\", \"<tbody>\", \"<thead>\", \"<tr>\"]', '<tfoot>', '2025-11-17 22:33:24'),
(220, 12, 'Which attribute is used to add a border around a table?', '[\"border\", \"frame\", \"cellborder\", \"tableborder\"]', 'border', '2025-11-17 22:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `tutorial_subtopics`
--

CREATE TABLE `tutorial_subtopics` (
  `id` int(11) NOT NULL,
  `tutorial_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `video_url` varchar(500) NOT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutorial_subtopics`
--

INSERT INTO `tutorial_subtopics` (`id`, `tutorial_id`, `title`, `video_url`, `duration`, `created_at`) VALUES
(1, 1, 'Introduction to Java', 'video/java_oops.mp4', '12:00', '2025-11-17 21:19:43'),
(2, 1, 'Java Variables', 'video/java_oops.mp4', '15:20', '2025-11-17 21:19:43'),
(3, 1, 'Java oops', 'video/java_oops.mp4', '14:10', '2025-11-17 21:19:43'),
(4, 2, 'Introduction to SQL', 'video/java_oops.mp4', '10:30', '2025-11-17 21:19:43'),
(5, 2, 'SQL SELECT Queries', 'video/python_variables.mp4', '12:45', '2025-11-17 21:19:43'),
(6, 2, 'SQL JOINs', 'video/java_oops.mp4', '13:50', '2025-11-17 21:19:43'),
(7, 3, 'Introduction to PHP', 'video/python_variables.mp4', '10:23', '2025-11-17 21:19:43'),
(8, 3, 'Variables in PHP', 'video/python_variables.mp4', '15:12', '2025-11-17 21:19:43'),
(9, 3, 'Loops in PHP', 'video/java_oops.mp4', '12:45', '2025-11-17 21:19:43'),
(10, 4, 'HTML Basics', 'video/java_oops.mp4', '08:30', '2025-11-17 21:19:43'),
(11, 4, 'HTML Forms', 'video/python_variables.mp4', '14:10', '2025-11-17 21:19:43'),
(12, 4, 'HTML Tables', 'video/python_variables.mp4', '11:00', '2025-11-17 21:19:43'),
(13, 5, 'Python Variables and Data Types', 'video/python_variables.mp4', '05:20', '2025-11-17 21:53:22'),
(14, 5, 'Python Loops and Conditions', 'video/python_loops.mp4', '07:45', '2025-11-17 21:53:22'),
(15, 5, 'Python Functions', 'video/python_functions.mp4', '06:30', '2025-11-17 21:53:22'),
(17, 6, 'JavaScript Variables and Data Types', 'video/js_variables.mp4', '05:40', '2025-11-17 21:54:20'),
(18, 6, 'JavaScript Functions and Scope', 'video/js_variables.mp4', '07:20', '2025-11-17 21:54:20'),
(19, 6, 'JavaScript Loops and Conditions', 'video/js_variables.mp4', '06:50', '2025-11-17 21:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('candidate','admin') DEFAULT 'candidate',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'neha tyagi', 'tyagi.neha1130@gmail.com', '$2y$10$dZkLcDYnj7XFZrfWGd533O85k3898RmG9ZWemnXfXZA9qwu3I6DKW', 'candidate', '2025-11-02 01:24:54'),
(2, 'Vidhi Tyagi', 'vidhi@gamil.com', '$2y$10$CqOz8tP0gJ13XBcLMeVxnuIUxqB0JuvgC3v4Hv1kmxTPwSWl/VJ8m', 'candidate', '2025-12-09 03:04:38'),
(3, 'Admin', 'admin@gmail.com', '$2y$10$dZkLcDYnj7XFZrfWGd533O85k3898RmG9ZWemnXfXZA9qwu3I6DKW', 'admin', '2025-12-09 03:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `interview_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT 0,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate_profile`
--
ALTER TABLE `candidate_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `candidate_scores`
--
ALTER TABLE `candidate_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview_results`
--
ALTER TABLE `interview_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `interview_id` (`interview_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interview_id` (`interview_id`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorial_questions`
--
ALTER TABLE `tutorial_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutorial_subtopic_id` (`tutorial_subtopic_id`);

--
-- Indexes for table `tutorial_subtopics`
--
ALTER TABLE `tutorial_subtopics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutorial_id` (`tutorial_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_question` (`user_id`,`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate_profile`
--
ALTER TABLE `candidate_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidate_scores`
--
ALTER TABLE `candidate_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interviews`
--
ALTER TABLE `interviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `interview_results`
--
ALTER TABLE `interview_results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=497;

--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tutorial_questions`
--
ALTER TABLE `tutorial_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `tutorial_subtopics`
--
ALTER TABLE `tutorial_subtopics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `interview_results`
--
ALTER TABLE `interview_results`
  ADD CONSTRAINT `fk_interview` FOREIGN KEY (`interview_id`) REFERENCES `interviews` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`interview_id`) REFERENCES `interviews` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tutorial_questions`
--
ALTER TABLE `tutorial_questions`
  ADD CONSTRAINT `tutorial_questions_ibfk_1` FOREIGN KEY (`tutorial_subtopic_id`) REFERENCES `tutorial_subtopics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tutorial_subtopics`
--
ALTER TABLE `tutorial_subtopics`
  ADD CONSTRAINT `tutorial_subtopics_ibfk_1` FOREIGN KEY (`tutorial_id`) REFERENCES `tutorials` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
