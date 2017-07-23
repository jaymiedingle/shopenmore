-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2017 at 01:22 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shopenmore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_banners`
--

CREATE TABLE `tb_banners` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `image_url` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_banners`
--

INSERT INTO `tb_banners` (`id`, `name`, `link`, `image_url`, `is_active`) VALUES
(1, 'Shoe Sale', 'http://localhost/shopenmore/category.php?id=5', 'shoe-sale.png', 1),
(4, 'Kids wear', 'http://localhost/shopenmore/category.php?id=2', '150019670130457596b2f5d7cb99-sweet.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_items`
--

CREATE TABLE `tb_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_status_id` int(1) NOT NULL DEFAULT '0',
  `image_url` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_item_category`
--

CREATE TABLE `tb_item_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `theme` text NOT NULL,
  `image_url` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_item_category`
--

INSERT INTO `tb_item_category` (`id`, `name`, `theme`, `image_url`, `is_active`) VALUES
(1, 'Gadget', 'success', '150011508236515969f08a17301-gadgets-190615.jpg', 1),
(2, 'Clothes', 'info', '150012049830753596a05b25f6e2-hanger.gif', 1),
(3, 'School supplies', 'warning', '150012057410805596a05fe95597-00da223cfd4028f69847bda2544b809c.jpg', 1),
(4, 'Makeup', 'default', '150012540411456596a18dc5eb0e-giphy.gif', 1),
(5, 'Shoes', 'danger', '150012638618491596a1cb298dad-download (7).jpg', 1),
(11, 'Food', '', '150012642227480596a1cd679aec-20121024-MacNCheese-12.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_item_status`
--

CREATE TABLE `tb_item_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `theme` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_item_status`
--

INSERT INTO `tb_item_status` (`id`, `name`, `theme`) VALUES
(1, 'For Sale', 'success'),
(2, 'For Rent', 'info'),
(3, 'Limited Stock', 'danger'),
(4, 'Out of Stock', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `tb_messages`
--

CREATE TABLE `tb_messages` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `is_opened` tinyint(1) NOT NULL DEFAULT '0',
  `date_send` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rating`
--

CREATE TABLE `tb_rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `voter_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rating`
--

INSERT INTO `tb_rating` (`id`, `user_id`, `voter_id`, `rate`, `date`, `is_active`) VALUES
(3, 36, 35, 1, '2017-07-16 12:21:10', 0),
(4, 36, 21, 0, '2017-07-16 12:21:34', 0),
(5, 21, 36, 1, '2017-07-16 12:33:36', 0),
(6, 35, 36, 1, '2017-07-16 12:35:01', 0),
(7, 35, 21, 0, '2017-07-16 12:35:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_site_info`
--

CREATE TABLE `tb_site_info` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `tagline` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_site_info`
--

INSERT INTO `tb_site_info` (`id`, `title`, `tagline`) VALUES
(1, 'ShopenMore', 'ICCT students buy and sell without the hassle. We help you find the product you need and make the deal with fellow students.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_student`
--

CREATE TABLE `tb_student` (
  `id` varchar(50) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_student`
--

INSERT INTO `tb_student` (`id`, `lname`, `fname`) VALUES
('000', 'HERRERA', 'SUMMER'),
('20012527', 'Malana', 'Ryan Martinez'),
('20132946', 'ECALDRE', 'NIEL MARK '),
('20145149', 'Trinidad', 'Emerson Ferrer'),
('20152634', 'Zaragoza ', 'Juan Miguel Manila'),
('20156818', 'Arago ', 'Jay Mark Aragones'),
('AG080098', 'Villadiego', 'Regine'),
('AG100005', 'Cordova', 'Ailea Marie'),
('Ag120144', 'Villadiego', 'Johnrey'),
('AG140001', 'Amoguis', 'Mark Aljon'),
('AG140182', 'Benito', 'Harris Del Rosario'),
('AG140269', 'Daganio  ', 'Feil Clarence Cervo'),
('B150508', 'Esquibal  ', 'Brian Jay Battung'),
('BI100183', 'Nadora', 'Joseph'),
('BI100210', 'Buenaventura ', '  Jay E.'),
('Bi110220', 'Viray', 'DianaRose'),
('BI110326', 'Moncupa', 'Jameron Rick'),
('BI110372', 'ARALAR', 'SEDRIC'),
('BI1140288', 'MALLARI', 'RAY ERICKSON'),
('BI1150376', 'JAGDON', ' MARK MILLEN'),
('BI120042', 'Cubio', 'Jonel'),
('BI120063', 'Payuran ', 'Jocelyn Antonil'),
('BI120119', 'Espiritu', 'Ley Ann'),
('BI120121', 'Mesa', 'Marlene'),
('BI120127', 'Ferido', 'Ellamarie'),
('BI120398', 'Garcia Jr.', 'Jerry'),
('BI120403', 'Alojado', 'Lloyd Anthony'),
('BI130026', 'Basaysay', 'Jerome '),
('BI130028', 'BELISON', 'MC ARVIN'),
('BI130035', 'Anonical ', 'Dan Jason Biteranta'),
('BI130089', 'Gonzales', 'Kristine'),
('BI130104', 'Decatoria', 'Roman'),
('BI130108', 'Eda', 'John Kenneth'),
('BI130109', 'Antazo', 'Jolan'),
('BI130122', 'Ravinera', 'Glenn Dale'),
('BI130133', 'Encoy', 'Daniel'),
('BI130148', 'Mactao', 'Manuel Kristoffer'),
('BI130196', 'Hipos', 'Andrea Fei'),
('BI130205', 'Billiones', 'Clarimae'),
('BI130218', 'CELEBRE', 'JOHN JORDAN'),
('BI130258', 'Mahinay', 'Ma. Mitzi'),
('BI130290', 'GULADA', 'MARITONIE'),
('BI130320', 'Saul', 'Shella May'),
('BI130377', 'CETRO', 'CRISOLOGO '),
('BI130396', 'Arabit ', 'Mark Andrew Bolada'),
('BI140001', 'Onilongo', 'Rodely Charm'),
('BI140019', 'GALIS', 'JOAN '),
('BI140020', 'ELLAMIL', 'MICHAEL HARVEY'),
('BI140022', 'PARALEJAS', 'VINCENT'),
('BI140023', 'Navato', 'James Patrick'),
('BI140031', 'Celestra', 'Christian'),
('BI140032', 'Unida', 'Mar rose'),
('BI140050', 'Bocacao', 'Johnalou'),
('BI140055', 'Zapatero', 'Allen Nicole'),
('BI140065', 'Fonte', 'Jan Ian'),
('BI140066', 'Oliveros', 'Rhonilyn Paralejas'),
('BI140080', 'Flores', 'Ma.Jellan'),
('BI140085', 'Alejandrino', 'Ariane'),
('BI140103', 'SAPNAY', 'AARON JOHN'),
('BI140113', 'Gallardo', 'Russel'),
('BI140118', 'Sila', 'John Christian'),
('BI140119', 'Macaloi', 'Desiree'),
('BI140120', 'ENRIQUES JR.', 'EMMANUEL'),
('BI140121', 'DINO', 'JIN PAUL'),
('BI140135', 'Comilang ', 'Jestoni Anical'),
('BI140141', 'Unidad', 'Kenneth'),
('BI140142', 'Picones', 'Raymond'),
('BI140159', 'Ortencio ', 'John Michael Dingoy'),
('BI140181', 'Reyes', 'Rhobet James'),
('BI140182', 'Flores', 'Reymar'),
('BI140188', 'Trinidad', 'Adrian'),
('BI140190', 'Dumagdag', 'Aaron'),
('BI140191', 'Bernardo', 'Juzel Ann'),
('BI140216', 'GONZALES JR.', 'FERNANDO '),
('BI140223', 'Rivera', 'Jonalyn'),
('BI140224', 'Dingle', 'Jaymie'),
('BI140241', 'Rublico', 'Mark Joseph'),
('BI140264', 'Zamora', 'Theresa Jane'),
('BI140279', 'LOMONDOT', 'JAN JALANIE'),
('BI140284', 'Arabit', 'Jethro'),
('BI140288', 'Mallari', 'Ray Erickson Salvador'),
('BI140301', 'Paralejas', 'Lenard'),
('BI140328', 'Rivera ', 'Guillan Binadas'),
('BI140335', 'Guitang', 'Edmar'),
('BI140337', 'SAN MIGUEL', 'MICHIE ANN'),
('BI140343', 'Mesa', 'John Glenn Revillame'),
('BI140346', 'CALIPAYAN', 'SARAH JANE'),
('BI140360', 'BERNARDO', 'EARLGIO'),
('BI140371', 'BALDADO', 'JAY ANN'),
('BI140397', 'De Amboy', 'April'),
('BI140406', 'LIRIO', 'MARY JOY'),
('BI140409', 'DE GUZMAN', 'ALLAN PATRIC'),
('BI140417', 'Cruz', 'Royvin'),
('BI140433', 'Palorma ', 'Jan Pastor Alcantara'),
('BI140448', 'Bolante', 'Kevin'),
('BI140458', 'Chicote', 'Lenon'),
('BI140466', 'MIRANDA ', 'MARVIN'),
('BI140477', 'Eclipse', 'Ralph Christian'),
('BI140499', 'VILLEGAS', 'VINCE'),
('BI140514', 'Andres ', 'Mary Grace C.'),
('BI150003', 'Manayaga ', ' William Felix Taberaos'),
('BI150004', 'CENIDOZA', 'JUSTIN PAU '),
('BI150007', 'Aseoche ', 'Gio Eila'),
('Bi150009', 'Caincoy', 'April'),
('Bi150011', 'Aquino', 'Esperania'),
('Bi150014', 'Borja', 'Kier'),
('BI150019', 'NACION', 'AHLVIC'),
('BI150020', 'SALVADOR III', 'JAIME LEOJ'),
('BI150024', 'EVARDONE', 'CHRISTINE JOY'),
('BI150026', 'Moscosa ', 'Carmina Claud'),
('BI150035', 'Genota ', ' KeaneAlan Nocete'),
('Bi150040', 'Arescon', 'ReinaAndrea'),
('BI150042', 'ARABIT', 'ARINALYN '),
('Bi150053', 'Canchola', 'KylieAnne'),
('BI150058', 'SORIANO', 'LYRA'),
('BI150073', 'Beronilla ', 'Jessel Ongue'),
('BI150074', 'Villaamer ', 'Allandale Petalio'),
('BI150078', 'LOBARBIO', 'VINA'),
('BI150080', 'Villarina ', 'Ma. Nica Ramos'),
('BI150089', 'MALAZARTE', 'JEMBOY'),
('BI150098', 'Macacuna ', ' Somayah Hadji Omar'),
('BI150103', 'Ribo', 'Joshua Bismonte'),
('BI150105', 'AMARANTE', 'CHERYL MAE'),
('BI150106', 'TE', 'CARYL MAE '),
('BI150111', 'MANOSO', 'SHELLA'),
('BI150116', 'PERDIGUERRA', ' MARK JAYSON'),
('BI150122', 'Pinon ', 'Alaina Christine Remigio'),
('BI150126', 'CEQUENA', 'XAVIER '),
('BI150131', 'Demafeliz ', ' Cherry Mar Dela Cruz'),
('BI150133', 'ESPARTINEZ', 'JOVY LEE'),
('BI150141', 'RODA', 'JOSSA MAE'),
('BI150150', 'BUENDIA', 'DOMINIC'),
('BI150158', 'SALADAR', 'KIMBERLY'),
('BI150166', 'Bolante ', 'Dayne Gondraneos'),
('BI150168', 'Vitalicio', 'Darwin Gonzal'),
('BI150169', 'LOPEZ', 'VICTOR RYAN'),
('BI150174', 'Flores ', 'Aljun Aumentado'),
('BI150183', 'NADORA', 'JOSEPH EMMANUEL'),
('BI150186', 'FERNANDO', 'JOSHUA'),
('BI150194', 'GULA', 'MICHAEL'),
('Bi150199', 'Ulang', 'JesseLyn'),
('BI150205', 'MANDANI', 'MARICRIS'),
('BI150206', 'LUNAS', 'GLESON'),
('BI150214', 'Dominguez ', 'Alaiza Joy Villadiego'),
('BI150215', 'BOJO', 'KING JAMES'),
('BI150216', 'PAYURAN', 'MARK SEIMEN'),
('BI150226', 'Olvida ', 'Renz Marvic De Guzman'),
('Bi150228', 'Antonio', 'Jaymelvin'),
('Bi150239', 'AquinoJr.', 'Crisanto'),
('BI150242', 'PEREIRA', 'RONALYN'),
('BI150260', 'PILAPIL', 'MARK GIL'),
('BI150262', 'DEGALA', 'CHRISTIAN '),
('BI150263', 'ICAPIN', 'JOHN LESTER'),
('BI150280', 'DORIA', 'JUNEL'),
('BI150288', 'MANIEGO', 'ROMMEL'),
('BI150290', 'Anis ', 'Jeremil Venadas'),
('BI150304', 'MEMBREEBE', 'MARK MILTON'),
('BI150314', 'Batalon', 'Aireen Joy Cequena'),
('BI150316', 'Calzado ', ' Nikoh Alde'),
('BI150317', 'POLICARPIO', 'MARK PHILIP'),
('BI150358', 'Villa ', 'Federico Durana'),
('BI150363', 'MERCADO', 'NISHYK'),
('BI150364', 'Banares ', 'Richruel Angelo Malubay'),
('BI150380', 'MANGARIN ', 'JHOANA'),
('BI150381', 'ARAMBULO', 'KENNETH JOHN'),
('BI150385', 'De Padua ', ' Lance Liam Suarez'),
('BI150427', 'Frial  ', ' Jeran Krido Carriaga'),
('BI150454', 'REVES JR ', 'ARMANDO'),
('BI150466', 'DECANO', 'MARK PAULO '),
('BI150472', 'PINEDA', 'JEANE ALEXANDRA'),
('BI150478', 'Sumcad  ', 'Christian Kyle Nagares'),
('BI150486', 'OLVIDA', 'REDFORD'),
('BI150487', 'Obina ', 'Jonas Q.'),
('BI150499', 'Curaza', 'Marjorie Malina'),
('BI150501', 'SOMBESE', 'ERRON'),
('BI150504', 'De Leon ', 'Alyssa Jean'),
('BI150507', 'Lapinig', 'Joremar Lungay'),
('BI150510', 'Lomboy', 'Ella Mae Padlan'),
('BI150525', 'Aguirre ', 'Geff Masunurin'),
('BI150530', 'Aguirre', 'Ciara Montevirgen'),
('BI150532', 'Vasquez ', 'Ronnalyn Alvarez'),
('BI150538', 'BUEZA', 'NEIL CHRISTIAN '),
('BI150540', 'Villadiego ', 'Jane Wendy Olvida'),
('BI150543', 'Siclat ', 'Catherine'),
('BI160007', 'Medina', 'Armalyn Bairante'),
('BI160008', 'Ilisan', 'Margaret Penaflor'),
('BI160012', 'Alvez', 'Mervilyn Ticman'),
('BI160013', 'Alcantara', 'John Michael Igneo'),
('BI160014', 'Cotiangco', 'Bianca Isabel Villadiego'),
('BI160016', 'Arago', 'Jhazel Ann Aragones'),
('BI160017', 'Basilio', 'Christian Kelly Asuncion'),
('BI160020', 'Lim', 'Mervin Gamalo'),
('BI160026', 'Lucia', 'Von Bryan'),
('BI160027', 'Fernandez', 'Graceziel Janda'),
('BI160029', 'Batalia ', 'Angeline Sison'),
('BI160038', 'Rivera', 'Kent Raymond Arambulo'),
('BI160042', 'Abelido', 'Miguel'),
('BI160049', 'Capulong', 'Renz Jandy Dinoso'),
('BI160051', 'Santos', 'Gabrielle Adriano'),
('BI160065', 'ANTINERO', 'ANTONETTE JELLY ACE'),
('BI160079', 'Loilo', 'Sharleen'),
('BI160082', 'CABUGAYAN', 'KIM JONAS'),
('BI160086', 'Reonico', 'Rommel'),
('BI160087', 'REYES', 'LEA MAE'),
('BI160092', 'ESPENIDA', 'ALFRED'),
('BI160098', 'Cabalejo ', 'Mark John Manuelito Flores'),
('BI160101', 'GALLARGAN', 'DANISON YUMICKO'),
('BI160109', 'PARALEJAS', 'SPENCER '),
('BI160121', 'AVILES', 'BRYAN JOSEPH'),
('BI160124', 'TAMAYO', 'HAMHELTHON'),
('BI160132', 'Matugas', 'Eyen Jabagat'),
('BI160136', 'Mariveles', 'Ralph Simon Gonzal'),
('BI160141', 'Silayan', 'Janine Melissa Lachica'),
('BI160144', 'Eguilos', 'Marphy Ticon'),
('BI160148', 'ABELLANOSA', 'MAE CLIEN'),
('BI170003', 'Sta.Ana', 'Joy Dolores Gareza'),
('BI170020', 'BINADAS', 'RENDEL'),
('BI170031', 'Martos ', ' Marilou Gomez'),
('BI170035', 'Hilapo', 'Jomaico Aragones'),
('BI170036', 'RIVERA', 'LEMUEL'),
('BI170044', 'CAIGOY', 'MARY JOY'),
('BI170045', 'ODITA', 'JUSTICE MITCHAEL'),
('BI170046', 'PADUA', 'REVELYN'),
('BI170047', 'CORDOVIS', 'JHON KENS LAWRENCE'),
('BI170048', 'BAIR JR.', ' LORENZO'),
('BI170049', 'Hermoso ', ' Ma.Alene Herador'),
('BI170050', 'INES', 'CHEENEE'),
('BI170051', 'Dagle ', ' Jericho Bob Clinton Nido'),
('BI170053', 'LOMBOY', 'GENERULFO'),
('BI170054', 'CLATA', 'EDMUND'),
('BI170055', 'ALOG', 'MENCHIE'),
('BI170056', 'MONTEMAYOR', 'JORD KENNETH'),
('BI170057', 'LABANGON', 'MARITES'),
('BI170058', 'ESQUIBAL', 'LOUIE JAY'),
('BI170059', 'OLIVIDO', 'MICHAEL JOHN'),
('BI170060', 'FLORDELIZA', 'JOHNPAUL'),
('BI170061', 'BITERANTA', 'AILEEN '),
('BI170062', 'SOMBESE', 'ERRON'),
('BI170063', 'FELIX', 'SIGNORE FRANZ'),
('BI170064', 'CEREMONIA', 'REA'),
('BI170065', 'ROXAS', 'MILANE'),
('BI170066', 'CENIDOZA', 'ANTONETTE'),
('BI170067', 'SANTOS', 'MARICAL ROMEO'),
('BI170068', 'BALIGERA', 'AIRA'),
('BI170069', 'OLIVAR', 'SONNY EDWARD'),
('BI170070', 'NATE', 'JESIBEL'),
('BI170071', 'ALINSUOT', 'JERIC'),
('BI170072', 'PEDRERA', 'NICOLLE'),
('BI170073', 'JULIAN', 'ANARISSA'),
('BI170074', 'DISCUTIDO', 'SHAIRA MAE'),
('BI170075', 'CRUZ', 'SAM PAULO'),
('BI170076', 'Lorenzo ', ' Marc Luis Castillo'),
('BI170077', 'DE CASTRO', 'HERSHEY  ROSE'),
('BI170078', 'RELINGADO', 'JOHN KENNETH'),
('BI170079', 'SIERRA', 'LESLIE'),
('BI170080', 'PECORE', 'JUWHANIE'),
('BI170081', 'TOLENTINO', 'DANIEL'),
('BI170082', 'CRUZ', 'RHANCY'),
('BI170084', 'AZULIS', 'MARK ANTHONY'),
('BI170085', 'ESPLANA', 'JELICA MAY'),
('BI170086', 'RIVERA', 'LEMUEL'),
('BI170087', 'INOJALES', 'DALE'),
('BI170088', 'TOLENTINO', 'SHELA MAEN'),
('BI170089', 'Liagas  ', ' Mary Jane Sarmiento'),
('BI170090', 'ROSAS', 'NOUREELYN'),
('BI170092', 'ANDAG', 'UGEAN'),
('BI170096', 'SONE', 'JORDAN'),
('BI170098', 'LOPEZ', 'IAN JOSHUA'),
('BI170099', 'LAGULA', 'EZEKIEL'),
('BI170100', 'TOLEDANA', 'HANNELIE'),
('BI170102', 'MEJORADA', 'RICHARD'),
('BI170103', 'TEJADA', 'DAVID SHAUN'),
('BI170106', 'RIVERA', 'ROMDEL'),
('BI170107', 'CUDIAMAT', 'RHAYNALYN'),
('BI170109', 'VITAL', 'CZARINA ROSE'),
('BI170110', 'ABRIS', 'ALDRIN'),
('BIA70045', 'ODITA', 'JUSTICE MITCHAEL'),
('BIA70096', 'SONE', 'JORDAN'),
('HB160014', 'Certeza', 'Rikki Mae'),
('HB160017', 'Delos Santos', 'Daren'),
('HB160023', 'Arada', 'Renz Joseph'),
('HB160035', 'Conise', 'Justine'),
('HB160039', 'Basi', 'Joana Marie'),
('HB160042', 'Teves', 'Mark Andrei'),
('HB160048', 'Tamayo', 'Jake Vincent'),
('HB160053', 'Granale', 'May'),
('HB160054', 'Gocor', 'Maria Paula'),
('HB160064', 'Sevilla', 'Cara Jane'),
('HB160067', 'Gocor', 'Bryan'),
('HB160083', 'Villadiego', 'Clarissa'),
('HB160085', 'Estacio', 'Janfer'),
('HB160086', 'Cipria', 'Carl Angelo'),
('HB160088', 'Sobredo', 'Marjorie'),
('HB160089', 'Perez', 'RoseMarie'),
('HB160090', 'Fajilan', 'Kaye Harriet'),
('HB160096', 'La Cumbis', 'Esther Edmilyn'),
('HB160097', 'Zabala', 'Johntere'),
('HB160114', 'Rivera', 'Mark Real'),
('HB160131', 'La Cumbis', 'Isaiah Edmil'),
('HB160134', 'Salazar', 'Orphin JR'),
('HB160136', 'Aran', 'Kimberly'),
('HB160137', 'Moriel', 'Kevin'),
('HB160146', 'Aynaga', 'Erica'),
('HB160156', 'Masucal', 'Roma Erica'),
('HB160159', 'Villar', 'Alyssa May'),
('HB160163', 'Taganile', 'Shaina'),
('HB160167', 'Apostadero', 'Mark Julius'),
('HB160182', 'Tolentino', 'Hanzel'),
('HB160183', 'Necesito', 'Roma Mae'),
('HB160187', 'Mirabete', 'Von Joshua'),
('HB160190', 'Antinero', 'Pocholo'),
('HB160201', 'Naval', 'Israel Janiel'),
('HB160215', 'Lacambra', 'Adrian'),
('HB160223', 'Pulpulaan', 'Earl Daniel'),
('HB160224', 'Trinidad', 'William John'),
('HB160227', 'Alcoseba', 'Theresa'),
('HB160230', 'Balmonte', 'John Paulo'),
('HB160235', 'Grande', 'Julius'),
('HB160236', 'Etrata', 'Chad Emerson'),
('HB160237', 'Galzote', 'Rene Oliver'),
('HB160238', 'Jabonillo', 'Allan'),
('HB160241', 'Picones', 'Thalia'),
('HB160243', 'Tusi', 'Joshua'),
('HB160248', 'Quito', 'Christine Joy'),
('HB160249', 'Ranoco', 'Rommel Joshua '),
('HB160256', 'Quemation', 'Rodel'),
('HB160258', 'Nadal', 'Ralph Laurence'),
('HB160261', 'Garcia', 'Carla Mae'),
('HB160267', 'Lavina', 'Bernard Joseph'),
('HB160276', 'Enaborre', 'Zindrix Dhan'),
('HB160280', 'Dimaocor', 'Namraida'),
('HB160281', 'Dela Pacion', 'Romiel Chris'),
('HB160293', 'Andales', 'Jerick'),
('HB170005', 'GARIBAY', 'MARK JOSHUA'),
('HB170006', 'TANGPUS', 'DANAH AMOR'),
('HB170009', 'LUKLUKAN', 'LHESLIE ANNE'),
('HB170014', 'BANGUILAN', 'ROANN'),
('HB170015', 'MANISAN', 'JENNY'),
('HB170016', 'BUCKINGHUM', 'MARIAH JUVILYN'),
('HB170017', 'TADIWAN', 'DANEEN AIRA'),
('HB170019', 'FERNANDEZ', 'PATRICIA MAE'),
('HB170028', 'VILLAMOR', 'ALLYZA ANNE'),
('HB170029', 'VALDIVIA', 'ELIZA MAE'),
('HB170030', 'ESGUERA', 'ZEN WENDY'),
('HB170031', 'LUBERISCO', 'JHON ILON'),
('HB170032', 'SANTOS', 'ANDY JAY'),
('HB170033', 'BARBER', 'PRINCE EZEKIEL'),
('HB170034', 'LABIAN', 'RONALD'),
('HB170036', 'TRINIDAD', 'JOHN NAZZER'),
('HB170037', 'TUMALE', 'CREOS ANTHONY'),
('HB170041', 'MONSALES', 'DESIREE'),
('HB170043', 'FRANCIA', 'MARY ANGELINE'),
('HB170044', 'SUQUINA', 'JHUNAVEL'),
('HB170045', 'CABURNAY', 'CARLYN ROSE'),
('HB170050', 'GONZALES', 'JAN PAMELA'),
('HB170051', 'MEDALLADA', 'CATHLEA'),
('HB170053', 'BULIBOLI', 'ELLEN'),
('HB170054', 'TAGHAP', 'GRACE'),
('HB170055', 'DELA CRUZ', 'SARAH GRACE'),
('HB170059', 'ANO', 'SAMUEL'),
('HB170060', 'BUSTILLO', 'EDISON'),
('HB170061', 'VALDEZ', 'CHERRY-ANN'),
('HB170063', 'SERNADILLA', 'KIMBERLY'),
('HB170065', 'MECHILINA', 'JOHN CHRISTIAN'),
('HB170066', 'ARAN', 'JUSTINE JOY'),
('HB170067', 'ANORE', 'SARAH'),
('HB170068', 'RAYNES', 'JESERIE MAE'),
('HB170071', 'LERONA', 'CYLE KRISTIAN'),
('HB170072', 'BOADA', 'SOPHIA ROSE'),
('HB170073', 'IMAN', 'JOANALYN'),
('HB170074', 'BERNABE', 'FRANCIS'),
('HB170075', 'ULANG', 'CLEMDEL JOY'),
('HB170078', 'ESTACIO', 'JAN ANDREA MHAE'),
('HB170080', 'JIMENEZ', 'ADRIAN'),
('HB170081', 'MESA', 'PRINCESS'),
('HB170082', 'MANIO', 'KRISTINA'),
('HB170084', 'DIONIO', 'DANICA'),
('HB170089', 'GANALON', 'GERLYN ROSE'),
('HB170090', 'ARAGONCILLO', 'LADY MARIANNE'),
('HB170091', 'SIM', 'ANGELICA MAE'),
('HB170095', 'MONTECILLO', 'MARVIN'),
('HB170096', 'CENIDOZA', 'JHERALYN'),
('HB170097', 'CENIDOZA', ' IDELLE JOY'),
('HB170099', 'BERNABE', 'PRINCESS JOY'),
('HB170100', 'EVANGELISTA', 'PHILIP JOHN'),
('HB170102', 'RUMA', 'JOHN PATRICK NEWDI'),
('HB170103', 'PELAGIO', 'JOANA'),
('HB170106', 'DALISAY', 'EURICK JAN'),
('HB170107', 'TABIAN', 'KIMBERLY'),
('HB170109', 'APOSTADERO', 'LEONA'),
('HB170110', 'GUMANGAN', 'ANGELICA'),
('HB170111', 'CRUZ', 'ROSEMARIE JANE'),
('HB170112', 'TABIAN', 'KENNETH'),
('HB170114', 'SALIDO', 'VANESSA'),
('HB170119', 'SUMAYO', 'ROVELYN'),
('HB170125', 'MEJORADA', ' AIRA GAIL'),
('HB170126', 'ARAGON', 'FRESELLE NINA'),
('HB170129', 'MONTILLA', 'MA. NICOLE'),
('HB170131', 'OLISCO', 'ERICA JOY'),
('HB170134', 'ARAGONES', 'LORENCE'),
('HB170136', 'DUMA', 'GEORGE FRANCIS'),
('HB170137', 'GRANALE', 'JHON MANUEL'),
('HB170138', 'ARABIT', 'KIA'),
('HB170142', 'MOLOD', 'JESSA MAE'),
('HB170143', 'ACUNA', 'DAVE JOHN'),
('HB170145', 'PASTOR', 'DECERTE CATTE'),
('HB170146', 'MITRA', 'ZABELA KATE'),
('HB170147', 'BISCOCHO', 'ANNIE'),
('HB170148', 'BERNAL', 'MICKY'),
('HB170150', 'ALCALA', ' KEECY JOY'),
('HB170152', 'BURGOS', 'CHRISTINE JOY'),
('HB170153', 'BAUTISTA', 'ALLEN JAKE'),
('HB170157', 'ARABIT', 'JHANELLA'),
('HB170159', 'ESPLANA', 'MHICAELLA'),
('HB170163', 'RABINO', 'ARNOLD'),
('HB170164', 'ARBOLLIENTE', 'PAULA JOY'),
('HB170165', 'BAQUIRAN', 'SHELLA MARIE'),
('HB170166', 'POLO', 'LIEZEL'),
('HB170168', 'MERCADO', 'STEVEN KHARL'),
('HB170169', 'TANO', 'NAZARINE'),
('HB170170', 'SANCHEZ', 'CRYSTAL JADE'),
('HB170171', 'VILLANUEVA', 'TRIXIE NICOLE'),
('HB170172', 'PENAFLOR', 'JOHN BENEDICT'),
('HB170175', 'POLICARPIO', 'URSULA GRACE'),
('HB170176', 'BAGAPORO', 'ANGELINA'),
('HB170177', 'BOLADO', 'MARK POCHOLO'),
('HB170179', 'MILLARES', 'ANGELAH'),
('HB170180', 'BENITEZ', 'LOVELY'),
('HB170181', 'NUQUI', 'ROMINA MAE'),
('HB170183', 'NANCIS', 'CRYSTEL'),
('HB170184', 'BUENO', 'JEROME'),
('HB170185', 'ISAGON', 'JUSTINE'),
('HB170186', 'BASALLOTE', 'ROMMEL'),
('HB170188', 'SUERTO', 'MARIA ROSE'),
('HB170189', 'DE GUZMAN', 'ERICA'),
('HB170191', 'CILLION JR', 'ALAN'),
('HB170193', 'TAPION', 'JERLYN'),
('HB170195', 'VILLADIEGO', 'NICA'),
('HB170196', 'YAP', 'LESLIE'),
('HB170198', 'RODRIGUEZ', 'PAMELA MAE'),
('HB170200', 'DUCUT', 'MARVIN'),
('HB170201', 'PONELAS', 'JANE ELVIE'),
('HB170202', 'MAGLASANG', 'JOHNBERT'),
('HB170204', 'CELESTRA', 'JACEL ANN MAE'),
('HB170207', 'CATALAN', 'MARBEN'),
('HB170208', 'JOSEPH', 'MERY JOY ANN'),
('HB170209', 'UBAGAN', 'DAHNIA'),
('HB170213', 'BASALLOTE', 'NORBERTO'),
('HB170214', 'SAMSON', 'ROSEMARIE'),
('HB170215', 'DISCAYA', 'AERON'),
('HB170216', 'DISCAYA', 'ANDRE'),
('HB170221', 'BALINGBING', 'JANNELLA MAE'),
('HB170223', 'CRUZ', 'TRIXIE CORRINE'),
('HB170224', 'ARCILLA', 'MARISSA'),
('HB170226', 'GEMANG', 'JAYMIE'),
('HB170227', 'TOLENTINO', 'BU CONISE'),
('HB170228', 'NACIONAL', 'KYLE ANGELO'),
('HB170230', 'CANGAS', 'RICHELLE'),
('HB170231', 'PAYUMO', 'AUSTIN KIEL'),
('HB170232', 'REUTOTAR', 'RYAN LEONARD'),
('HB170234', 'CEBANICO', 'DARREL'),
('HB170235', 'CLEMENTE', 'PRINCESS ALYSELLE'),
('HB170236', 'ESPIRITU', 'JOHN IRIS'),
('HB170238', 'MASUCAL', 'ERMINA'),
('HB170241', 'PALOMANIA', 'JHOANNA'),
('HB170244', 'BELMONTE', 'JACKY LOU'),
('HB170246', 'FIGURACION', 'JERRY'),
('HB170248', 'JIMENEZ', 'ELLA'),
('HB170249', 'BAUTISTA', 'JOHN LEO'),
('HB170251', 'FLORDELIZA', ' JULIE PEARL'),
('HB170252', 'GARCIA', 'DENNISE MARIE'),
('HB170260', 'ENSANO', 'ALVIN JAY'),
('HB170261', 'MAGNO', 'ROI RONEL'),
('HB170263', 'BERNAL', 'ROCHELLE'),
('HB170264', 'DESALISA', 'WILMARK'),
('HB170267', 'BALDICANO', 'ALLYSSA'),
('HB170269', 'TAGULIMOT', 'JOYCI MAE'),
('HB170270', 'RUBIO', 'ROSELYN JOY'),
('HB170272', 'DIAZ', 'JOEVELYN'),
('HB170274', 'OPENA', 'JASMIN JOY'),
('HB170276', 'ESPIRITU', 'CIELANNELLE'),
('HB170277', 'BUNAGAN', 'KRISTINE'),
('HB170278', 'RODRIGUEZA', 'ANSHERINA'),
('HB170279', 'OLARTE', 'CHEENEY'),
('HB170280', 'QUISQUINO', 'DANLYN'),
('HB170281', 'ANTAZO', 'ERICA MAE'),
('HB170282', 'BARAOIDAN', 'MARIELLE'),
('HB170285', 'OBEJAS', 'VINCENT GUILE'),
('HB170286', 'DY', 'SEAN SEINSTER'),
('HB170307', 'LIRIO', 'MARK JAY'),
('HB170308', 'SULIT', 'SHANNEN LOUISE'),
('HB170309', 'SULIT', 'KOR'),
('HB170313', 'MAGNO', 'PAULINE'),
('HB170325', 'CASTILLO', 'KASANDRA'),
('HB170342', 'DELGADO', 'CRISTY'),
('HB170343', 'SALINAS', 'KHRYSSTEL AMETHYST'),
('HB170344', 'CARCALLAS', 'SKINERD'),
('HB170347', 'GINTO', 'LOREMIE'),
('HB170354', 'BROWN', 'JHON ANGELO'),
('HB170358', 'VILLALUNA', 'KIMELIE'),
('HB170363', 'GONDRA', 'JENSEN'),
('HB170364', 'SALVADOR JR', 'RUDY'),
('HB170365', 'REYES', 'KRISTIAN ACE'),
('HB170366', 'DESTAJO', 'JOHN MARK'),
('HB170368', 'TIONKO', 'JEROME'),
('HB170371', 'CENIDO JR', 'RUBEN'),
('HB170372', 'MIRANDA', 'KYLLE ROCHELLE'),
('HB170384', 'JOSE', 'SEAN GABRIEL'),
('SU100432', 'PLEGARIA', 'RONIEL'),
('TA120289', 'Roxas', 'Jamuel'),
('TA120675', 'Cervo', 'Fred Kenneth'),
('TA130564', 'Nievera ', 'Aeron Cerda'),
('TA140496', 'Crujedo', 'Cyrus'),
('TA140511', 'Munar', 'Alyssa Nicole'),
('TA140532', 'Lanza', 'Mark Gil'),
('TA150812', 'TALAMPAS', 'MICHAELA BJ'),
('TA150896', 'TODOC ', 'EUGENE FRANCIS'),
('UA120284', 'Traxler  ', 'Jeffrey Henoguin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `student_id` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `image_url` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `user_role_id`, `student_id`, `email`, `password`, `fname`, `lname`, `contact`, `image_url`, `is_active`, `date_reg`) VALUES
(35, 1, 'BI140224', 'jaymiedingle@gmail.com', '96e79218965eb72c92a549dd5a330112', 'Jaymie', 'Dingle', '09106225625', '1499839742129485965bcfeafcd1-14996916591867059637a8b6443f-jaymie.jpg', 1, '2017-07-12 06:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `theme` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_role`
--

INSERT INTO `tb_user_role` (`id`, `name`, `theme`) VALUES
(1, 'Superadmin', 'danger'),
(2, 'Admin', 'primary'),
(3, 'Member', 'default');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_banners`
--
ALTER TABLE `tb_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_items`
--
ALTER TABLE `tb_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_item_category`
--
ALTER TABLE `tb_item_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_item_status`
--
ALTER TABLE `tb_item_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_messages`
--
ALTER TABLE `tb_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site_info`
--
ALTER TABLE `tb_site_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_student`
--
ALTER TABLE `tb_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_banners`
--
ALTER TABLE `tb_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_items`
--
ALTER TABLE `tb_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_item_category`
--
ALTER TABLE `tb_item_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_item_status`
--
ALTER TABLE `tb_item_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_messages`
--
ALTER TABLE `tb_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_site_info`
--
ALTER TABLE `tb_site_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
