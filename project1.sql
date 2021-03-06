-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 22 Ιαν 2018 στις 22:36:48
-- Έκδοση διακομιστή: 10.1.28-MariaDB
-- Έκδοση PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `project1`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `cart`
--

CREATE TABLE `cart` (
  `wine_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idr` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `customer`
--

CREATE TABLE `customer` (
  `customer_name` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `debt` float NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bank_account` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `customer`
--

INSERT INTO `customer` (`customer_name`, `phone`, `address`, `debt`, `password`, `email`, `bank_account`) VALUES
('Giwrgos Georgiou', 281036987, 'Xania', 0, '123', 'g@gmail.com', 258742692),
('Giannhs Ioanou', 281026549, 'Rethymno', 0, '123', 'gi@gmail.com', 156489484),
('Giwrgos Parhs', 281021495, 'Sitia', 0, '123', 'gp@gmail.com', 1648451),
('Kwstas Papadakhs', 28101686, 'Malia', 0, '123', 'k@gmail.com', 1654891157),
('Manos Papadakis', 281065489, 'Knossos', 0, '123', 'ma@gmail.com', 164618484),
('Manos Manou', 245821586, 'Hrakleio', 0, '123', 'manos@gmail.com', 16895845),
('Manolhs Papadakhs', 69758214, 'Papanastasiou 100', 0, '123456789', 'papadakis@gmail.com', 2147483647);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `item`
--

CREATE TABLE `item` (
  `order_id` int(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `wine_id` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `order`
--

CREATE TABLE `order` (
  `order_id` int(50) NOT NULL,
  `order_date` date NOT NULL,
  `cost` float NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `trader`
--

CREATE TABLE `trader` (
  `email` varchar(100) NOT NULL,
  `trader_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` int(20) NOT NULL,
  `debt` float NOT NULL,
  `bank_account` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `trader`
--

INSERT INTO `trader` (`email`, `trader_name`, `address`, `password`, `phone`, `debt`, `bank_account`) VALUES
('k@hotmail.com', 'Koula Pantelaki', 'Papanastasiou', '123', 281068415, 310, 58948645),
('m@hotmail.com', 'Mixalhs Papadakhs', 'Thesalonikh', '123', 231058958, 0, 610835289),
('mi@hotmail.com', 'Mistos Papadakhs', 'Peireas', '123', 23108165, 0, 56561542),
('s@hotmail.com', 'Soula Triantafulou', 'Meleses', '123', 23106116, 0, 8646848),
('x@gmail.com', 'Xaris Theoxaridhs', 'Dhkaiosinhs', '123', 28106848, 0, 12894864);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `varieties`
--

CREATE TABLE `varieties` (
  `wine_id` int(10) NOT NULL,
  `variaty_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `wine`
--

CREATE TABLE `wine` (
  `wine_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `winery` enum('ALEXAKIS WINERY','Δουλουφάκης','Αμπελώνες Καραβιτάκη','ΜΙΝΩΣ Κρασιά Κρήτης ΑΕ','Ρους Οινοποιία Ταμιωλακη','Αφοί Σπ. Μαραγκάκη','Ευφροσύνη','Λυραράκης - ΓΕΑ ΑΕ','Κτήμα Μιχαλάκη','Κτήμα Ζαχαριουδάκη','Δασκαλάκη') CHARACTER SET utf8 NOT NULL,
  `color` enum('Κόκκινο','Λευκό','Ροζέ') CHARACTER SET utf8 NOT NULL,
  `foto` varchar(100) CHARACTER SET utf8 NOT NULL,
  `info` text CHARACTER SET utf8 NOT NULL,
  `year` year(4) NOT NULL,
  `retail_price` float NOT NULL,
  `wholesale_price` float NOT NULL,
  `wine_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `wine`
--

INSERT INTO `wine` (`wine_name`, `winery`, `color`, `foto`, `info`, `year`, `retail_price`, `wholesale_price`, `wine_id`) VALUES
('35o - 25o Λευκό', 'ΜΙΝΩΣ Κρασιά Κρήτης ΑΕ', 'Λευκό', 'images/35o-25o Λευκό_ΜΙΝΩΣ Κρασιά Κρήτης ΑΕ–Οινοποιείο Μηλιαράκη.jpg', 'Σύγχρονη οινοποιητική διαδικασία και επιλεγμένη πρώτη ύλη συνδυάζονται σε αυτήν την νέα πρόταση του Οινοποιείου Μηλιαράκη για το προσεγμένο καθημερινό σας τραπέζι\r\n\r\nΟι συντεταγμένες 35ο 1258.10O Bόρεια - 25ο 1139.02O Aνατολικά αποτελούν το γεωγραφικό στίγμα της κυριότερης οινοπαραγωγικής περιοχής του νησιού, τα Πεζά. Από τον αμπελώνα των Πεζών και τις Κρητικές ποικιλίες Θραψαθήρι και Βιλάνα, οινοποιημένες με τη μέθοδο της κρυοεκχύλισης, προέρχεται αυτό το δροσιστικό λευκό κρασί που συνοδεύει την καθημερινή σας γευστική απόδραση, χαρακτηρισμένο από τα αναδυόμενα φρουτώδη αρώματα μπανάνας και κίτρου,την ευχάριστη οξύτητα και πλούσια μακριά επίγευση', 2003, 20, 18, 17),
('35ο - 25ο Ερυθρό', 'ΜΙΝΩΣ Κρασιά Κρήτης ΑΕ', 'Κόκκινο', 'images/35ο - 25ο Ερυθρό_ ΜΙΝΩΣ Κρασιά Κρήτης ΑΕ – Οινοποιείο Μηλιαράκη.jpg', 'Σύγχρονη οινοποιητική διαδικασία και επιλεγμένη πρώτη ύλη συνδυάζονται σε αυτήν την νέα πρόταση του Οινοποιείου Μηλιαράκη για το προσεγμένο καθημερινό σας τραπέζι\r\n\r\nΟι συντεταγμένες 35ο 1258.10O Bόρεια - 25ο 1139.02O Aνατολικά αποτελούν το στίγμα της κυριότερης οινοπαραγωγικής περιοχής του νησιού, τα Πεζά. Από τον αμπελώνα των Πεζών προέρχεται αυτό ερυθρό κρασί που συνοδεύει την καθημερινή σας γευστική απόδραση, χαρακτηρισμένο από τα αρώματα κόκκινων φρούτων, γεμάτη γεύση με στοιχεία δαμάσκηνου, κανέλας και γαρύφαλλου και βελούδινη επίγευση με νότες βανίλιας. Από τις ποικιλίες Κοτσιφάλι, Μαντηλάρι και Syrah, το κρασί ωριμάζει για 6 μήνες σε δρύινα βαρέλια και στη συνέχεια εμφιαλώνεται.', 2003, 22, 20, 18),
('35ο - 25ο Ροζέ', 'ΜΙΝΩΣ Κρασιά Κρήτης ΑΕ', 'Ροζέ', 'images\\35ο - 25ο Ροζέ_ΜΙΝΩΣ Κρασιά Κρήτης ΑΕ – Οινοποιείο Μηλιαράκη.jpg', 'Σύγχρονη οινοποιητική διαδικασία και επιλεγμένη πρώτη ύλη συνδυάζονται σε αυτήν την νέα πρόταση του Οινοποιείου Μηλιαράκη για το προσεγμένο καθημερινό σας τραπέζι\r\n\r\nΟι συντεταγμένες 35ο 1258.10O Bόρεια - 25ο 1139.02O Aνατολικά αποτελούν το στίγμα της κυριότερης οινοπαραγωγικής περιοχής του νησιού, τα Πεζά. Από τον αμπελώνα των Πεζών προέρχεται αυτό το δροσιστικό ροζέ κρασί, από τις ποικιλίες Κοτσιφάλι και Syrah, συνοδεύει την καθημερινή σας γευστική απόδραση, χαρακτηρισμένο από τα αρώματα φρέσκων κόκκινων φρούτων, πλούσια γεύση κερασιού, φράουλας και μύρτιλου, ζωντανή και μακρά επίγευση.', 2003, 17, 15, 21),
('Artis', 'ALEXAKIS WINERY', 'Κόκκινο', 'images\\Artis_ ALEXAKIS WINERY.jpg', 'Μονοποικιλιακός από τη γηγενή ερυθρή ποικιλία Κοτσιφάλι.\r\nΜε ελαφριά γεύση, όγκο, στρογγυλό χαρακτήρα, μέτρια οξύτητα, ήπια τανικότητα και μακριά επίγευση.', 2015, 10, 8, 22),
('Artis', 'ALEXAKIS WINERY', 'Λευκό', 'images\\Arti_ALEXAKIS WINERY.jpg', 'Xαρμάνι των γηγενών λευκών ποικιλιών Bιδιανό και Mοσχάτο.\r\nΦρέσκο, υψηλόβαθμο και πολύπλοκο χαρμάνι με αρώματα εσπεριδοειδών, αχλαδιού, τριαντάφυλλου και τροπικών φρούτων. Mε λαμπερό πρασινοκίτρινο χρώμα, φρέσκο, εξαιρετική οξύτητα και όμορφο, στρογγυλό τελείωμα. Ένα υπέροχο, καλοκαιρινό κρασί.', 2015, 13, 11, 23),
('CABERNET SAUVIGNON', 'Κτήμα Μιχαλάκη', 'Κόκκινο', 'images\\CABERNET SAUVIGNON ΚΤΗΜΑ ΜΙΧΑΛΑΚΗ_Κτήμα Μιχαλάκη.jpg', 'Χρώμα σκούρο ερυθρό.  Σύνθετο BOUQUET αρωμάτων καβουρντισμένου αμυγδάλου, ξηρών καρπών, αποξηραμένα δαμάσκηνα και πράσινη πιπεριά.  Πλούσια δομή, με γεμάτη γεύση και μακρά επίνευση που επιδέχεται περεταίρω παλαίωσης.', 2002, 14, 12, 24),
('CABERNET SAUVIGNON', 'Αφοί Σπ. Μαραγκάκη', 'Κόκκινο', 'images\\CABERNETSAUVIGNONΙΔΑΙΑ_Ιδαια Οινοποιητική.jpg', 'Έντονο πορφυρό χρώμα με πλούσια και πολύπλοκη γεύση με αρώματα  βανίλιας, δαμάσκηνου, καφέ και σοκολάτας, στόμα γεμάτο με μακρά επίγευση', 2007, 19, 17, 25),
('CABERNET SAUVIGNON “INDIGO”', 'Ευφροσύνη', 'Κόκκινο', 'images\\CABERNET SAUVIGNON “INDIGO”_Οινοποιείο Ευφροσύνη.png', 'Οίνος ερυθρός, βαθύ κόκκινος (μελιτζανί).  Ο χυμός του σταφυλιού μένει με τις ρώγες για 8 ημέρες, αποκτώντας χρώμα άρωμα, τανίνες. Εμβολιάζεται και ζυμώνεται σε σταθερή θερμοκρασία 25οC. Μετά από παραμονή 12 και πλέον μηνών σε επιλεγμένα δρύινα βαρέλια, εμφιαλώνεται και εσείς μπορείτε να το απολαύσετε στους 18οC. Συνοδεύει κόκκινα κρέατα, κυνήγι και πικάντικες σάλτσες.', 2001, 19, 17, 26),
('CHARDONNAY', 'Κτήμα Μιχαλάκη', 'Λευκό', 'images\\CHARDONNAY ΚΤΗΜΑ ΜΙΧΑΛΑΚΗ_Κτήμα Μιχαλάκη.jpg', 'ΕΝΤΟΝΟ ΞΑΝΘΟΚΙΤΡΙΝΟ ΧΡΩΜΑ\r\n\r\nΣΥΝΘΕΤΗ ΔΟΜΗ ΑΡΩΜΑΤΩΝ ΑΧΛΑΔΙΟΥ, ΒΟΥΤΥΡΟΥ ΚΑΙ ΚΑΠΝΙΣΤΗΣ ΔΡΥΟΣ\r\nΠΛΟΥΣΙΟ ΚΑΙ ΛΙΠΑΡΟ, ΜΕ ΙΣΟΡΡΟΠΗΜΕΝΗ ΟΞΥΤΗΤΑ ΚΑΙ ΕΝΤΟΝΑ ΑΡΩΜΑΤΑ ΣΤΟΜΑΤΟΣ ΚΑΙ ΜΑΚΡΑ ΕΠΙΓΕΥΣΗ ', 2007, 21, 19, 28),
('CHARDONNAY Λευκός Ξηρός', 'Δουλουφάκης', 'Λευκό', 'images\\CHARDONNAY Λευκός Ξηρός οίνος_Δουλουφάκης Οινοποιείο.png', 'Κρασί με κυρίαρχα αρώματα φρούτων. Όμορφο χρυσοκίτρινο χρώμα. Πλούσιο, γεμάτο σώμα, λιπαρό στο στόμα, με ευχάριστη επίγευση.', 2009, 23, 20, 29),
('DAFNIOS ερυθρό', 'Δουλουφάκης', 'Κόκκινο', 'images\\DAFNIOS ερυθρός_Δουλουφάκης Οινοποιείο.jpg', 'Το λιάτικο είναι κρητική γηγενής ποικιλία και το κρασί αυτό έχει αυτό τον παραδοσιακό χαρακτήρα. Χρώμα ζωηρό κόκκινο με χαρακτηριστικό άρωμα φρούτων σε πλήρη ωριμότητα. Βελούδινη γεύση, μαλακό και ισορροπημένο. ', 2012, 9, 0, 30),
('DAFNIOS λευκός', 'Δουλουφάκης', 'Λευκό', 'images\\DAFNIOS λευκός_ Δουλουφάκης Οινοποιείο.jpg', 'Η ποικιλία επανέρχεται στο προσκήνιο μετά από πολλές προσπάθειες των οινοποιών της κρήτης. Έχει μοναδικά αρώματα, πολύπλοκα και φινετσάτα !Απαλό χρυσαφί χρώμα. Στρογγυλό σώμα με φρουτώδη αρώματα, φρεσκάδα στη γεύση και ευχάριστη, ισορροπημένη οξύτητα. ', 2011, 9, 8, 31),
('Emphasis Ερυθρό', 'Δασκαλάκη', 'Κόκκινο', 'images\\Emphasis Ερυθρό_Silva Δασκαλάκη.jpg', 'Συνδυασμός ποικιλιών Cabernet Sauvignon και Μαντηλαριά. Εντυπωσιακός συνδυασμός από δυο ξεχωριστές ποικιλίες. Παλαίωση για 8 μήνες σε δρύινα βαρέλια. ', 2010, 15, 14, 32),
('Emphasis Λευκό', 'Δασκαλάκη', 'Λευκό', 'images\\Emphasis Λευκό_Silva Δασκαλάκη.jpg', 'Συνδυασμός ποικιλιών Πλυτό και Sauvignon Blanc. Χρυσαφί χρώμα με πρασινωπές ανταύγειες πολύπλοκη μύτη με φρουτώδη χαρακτήρα και μίξεις εσπεριδοειδών, στόμα πλούσιο, γεμάτο με αρμονικό δέσιμο οξύτητας- αλκοόλης. ', 2010, 18, 17, 33),
('ENOTRIA ερυθρός', 'Δουλουφάκης', 'Κόκκινο', 'images\\ENOTRIA ερυθρός_Δουλουφάκης Οινοποιείο.jpg', 'Το κρασί αυτό είναι συνδιασμός των γηγενή ποικιλιών Κοτσιφάλι και Λιάτικο με το κοσμοπολίτικο Syrah. Έχει ζωηρό κόκκινο χρώμα και μαλακές , στρογγυλές τανίνες . ', 2004, 23, 20, 34),
('ENOTRIA λευκός', 'Δουλουφάκης', 'Λευκό', 'images\\ENOTRIA λευκός_Δουλουφάκης Οινοποιείο.jpg', 'Tο κρασί αυτό είναι το πάντρεμα της Βηλάνας με το Sauvignon Blanc. Είναι ένας συνδυασμός της νευρικής και λεμονάτης Βηλάνας με το εξωτικό και έντονο Sauvignon Blanc. ', 2007, 24, 21, 35),
('ENOTRIA ροζέ', 'Δουλουφάκης', 'Ροζέ', 'images\\ENOTRIA ροζέ_Δουλουφάκης Οινοποιείο.jpg', 'Φωτεινό ροζέ με πορτοκαλί ανταύγειες . Πληθωρικά αρώματα λουλουδιών και φρούτων. Μαλακό γευστικά κρασί, ισορροπημένο , γεμάτο αρώματα και ευχάριστο τελείωμα στο στόμα.', 2008, 29, 26, 36),
('kotsifali-syrah', 'ALEXAKIS WINERY', 'Κόκκινο', 'images\\kotsifali-syrah_alexakis.jpg', 'Μοναδική κράση του κοσμοπολίτικου Syrah με την κρητική ποικιλία Kοτσιφάλι.\r\nΧρώμα έντονα κόκκινο, ενώ το μπουκέτο του είναι πολύπλοκο με αναμνήσεις από φρούτα του δάσους και νύξεις πράσινου πιπεριού. Το στόμα χαρακτηρίζεται από έντονη καλοδομημένη βελούδινη γεύση, άψογα ισορροπημένη οξύτητα και μακριά επίγευση. ', 2000, 32, 28, 37),
('Ahinos_Ρους ', 'Ρους Οινοποιία Ταμιωλακη', 'Λευκό', 'images\\Ahinos_Ρους Οινοποιία Ταμιωλακη.png', 'Λαμπερό αχυροκίτρινο χρώμα με πράσινες ανταύγειες. Τυπική έκφραση του Sauvignon blanc στη μύτη. Σε πρώτο χρόνο αντιλαμβανόμαστε νότες πράσινης πιπεριάς και όσο το κρασί αναπνέει στο ποτήρι αναδύονται αρώματα μάνγκο και γκρεϊπ-φρουτ. Στο στόμα τσιμπάει το πικάντικο νεύρο, το οποίο και προσδίδει στο κρασί μακρά επίγευση και αρωματική επιστροφή.', 2011, 28, 25, 38),
('Malvasia Aromatica', 'ALEXAKIS WINERY', 'Λευκό', 'images\\Malvasia Aromatica_ALEXAKIS WINERY.jpg', 'Μονοποικιλιακός οίνος της ποικιλίας Malvasia Aromatica.\r\nΜε χρυσοκίτρινο χρώμα, φρουτώδες και νότες εσπεριδοειδών. Απαλό και κρεμώδες στο στόμα με εξαιρετική γευστική ισορροπία και χαρακτηριστική αρωματική επίγευση από γιασεμί και νυχτολούλουδο.', 2002, 17, 15, 39),
('Moscato Sweetheart', 'ALEXAKIS WINERY', 'Κόκκινο', 'images\\Moscato Sweetheart _ALEXAKIS WINERY.jpg', 'Μια ξεχωριστή οινική παρουσία.\r\nΟίνος λευκός γλυκός με έντονο χρυσοκίτρινο χρώμα. Αρωματικά κυριαρχεί ο συνδυασμός των αποξηραμένων φρούτων (βερίκοκο, δαμάσκηνο) με καβουρδισμένους ξηρούς καρπούς, μέλι και σταφίδα. Τελειώνει εκρηκτικά με νότες καλοκαιρινών φρούτων όπως πεπόνι και ροδάκινο. Γεμάτο στόμα και εκπληκτική γευστική ισορροπία.', 2002, 18, 17, 40),
('ALARGO ', 'Δουλουφάκης', 'Κόκκινο', 'images\\ALARGO Ερυθρός Ξηρός οίνος _Δουλουφάκης Οινοποιείο.png', 'Χρώμα: Βαθύ κόκκινο χρώμα.\r\n\r\nΆρωμα: Αρώματα φρούτων και βανίλιας\r\n\r\nΓεύση: Γεμάτο στη γεύση, μαλακό και ισορροπημένο.', 2016, 18, 15, 41),
('Ελιά Καραβιτάκης', 'Αμπελώνες Καραβιτάκη', 'Ροζέ', 'images\\Ελιά Καραβιτάκης  Αμπελώνες Καραβιτάκη.png', 'Η Ελιά είναι χαρμάνι 70% Syrah, 20% Grenage Rouge και 10% Carignan. Το κτήμα που την παράγει βρίσκεται πλάι στην Ελιά των Βουβών που θεωρείται το αρχαιότερο δέντρο παγκοσμίως και στεφάνωσε τους ολυμπιονίκες του 2004 και κυρήχθηκε διατηρητέο μνημείο της φύσης (ΦΕΚ 284/1997). Πρόκειται για ένα κρασί με εξαιρετικά γεμάτο στόμα, έντονες τανίνες και σύνθετο αρωματικό μπουκέτο. Παλαίωση για ένα χρόνο. Τύπος δρυός Allier  Nevers. Δεν έχει υποστεί φιλτράρισμα. ', 2000, 27, 14, 42),
('Δαφνί Ψαράδες', 'Λυραράκης - ΓΕΑ ΑΕ', 'Λευκό', 'images\\Λυραράκης Δαφνί _Ψαράδες_ Λυραράκης _ΓΕΑ ΑΕ.png', 'Η ποικιλία Δαφνί διασώθηκε από την εξαφάνιση από την οικογένεια Λυραράκη, όταν την φύτεψε στον οικογενειακό αμπελώνα «Ψαράδες» (480μ. υψόμετρο) στην κεντρική Κρήτη,  στις αρχές της δεκαετίας του 90.\r\n\r\nΤο όνομά της προέρχεται από το ομώνυμο φυτό της Δάφνης, λόγω της αρωματικής ομοιότητας με τον οίνο που παράγει.Οίνος με χαρακτηριστικό βοτανικό χαρακτήρα, με αναζωογονητικό στόμα και έντονη αρωματική επίγευση σε φόντο εσπεριδοειδών. ', 2000, 15, 14, 43);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idr`);

--
-- Ευρετήρια για πίνακα `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`) USING BTREE;

--
-- Ευρετήρια για πίνακα `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`order_id`,`wine_id`);

--
-- Ευρετήρια για πίνακα `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Ευρετήρια για πίνακα `trader`
--
ALTER TABLE `trader`
  ADD PRIMARY KEY (`email`) USING BTREE;

--
-- Ευρετήρια για πίνακα `wine`
--
ALTER TABLE `wine`
  ADD PRIMARY KEY (`wine_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `cart`
--
ALTER TABLE `cart`
  MODIFY `idr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT για πίνακα `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT για πίνακα `wine`
--
ALTER TABLE `wine`
  MODIFY `wine_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
