-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2020 at 06:19 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id6371104_digital_kissan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'dk123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_name_gujarati` varchar(100) NOT NULL,
  `category_image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_name_gujarati`, `category_image`) VALUES
(1, 'Farming Equipment', 'ખેતીના સાધનો', 'images/category_images/fe.png'),
(2, 'Seeds & Grains', 'બિયારણ અને અનાજ', 'images/category_images/baa.png'),
(3, 'Tractors & Its Equipment', 'ટ્રેક્ટર અને તેના સાધનો', 'images/category_images/tats.png'),
(4, 'Farming Land', 'ખેતીની જમીન', 'images/category_images/fl.png'),
(5, 'Plants & Seedling', 'છોડ અને રોપાઓ', 'images/category_images/pas.png'),
(6, 'Animal Husbandry', 'પશુપાલન', 'images/category_images/ah.png'),
(7, 'Agro Chemicals And Products', 'કૃષિ રસાયણો અને ઉત્પાદનો', 'images/category_images/acap.png');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobileno` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `mobileno`, `message`) VALUES
(25, 'Yash Nasit', 'yash.nasit111@gmail.com', '9737557068', 'Nice App For Farmers'),
(26, 'Bhavin Nandaniya', 'bhavi.ahir@gmail.com', '8200030714', 'Very Good App For Farmers.'),
(27, 'Maulik Bandhiya', 'maulikahir196@gmail.com', '9624577963', 'Good Work'),
(28, 'Nikita', 'nikita@gmail.com', '8530837558', 'Very useful app...');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8_unicode_ci NOT NULL,
  `post_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `user_fid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `post_time` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_uid`, `category`, `post_title`, `post_desc`, `user_fid`, `post_date`, `post_time`) VALUES
(56, 'DK1012205fd20033bf8c2', 'Plants & Seedling', 'મરચી અને કોબીના રોપ...', 'મરચી અને કોબીના રોપ માટે બ્રાન્ડેડ બિયારણમાંથી બનાવેલ મરચી અને કોબીનો વાયરસ ફ્રી રોપ હાજરમાં મળશે. પુરા સૌરાષ્ટ્રમાં સૌથી વધુ, સૌથી સસ્તા રોપ વેચાણ કરતી આધુનિક નર્સરીની મુલાકાત લો. શિવચંદન નર્સરી, મુ. દેવગાણા. તાલુકો : શિહોર જીલ્લો : ભાવનગર મો. 90990 95160 / 9725617770', 'Fr8b5YwUoRd1DUByW6zw6PdTdSz2', '10/12/2020', '04:32 PM'),
(57, 'DK1112205fd2f40c87260', 'Agro Chemicals And Products', 'જૈવિક શક્તિશાળી - ઝાયટોનીક એમ', 'જમીન નો કસ વધારવા માટે બાયો લોજી બૂસ્ટર # વધુ ઉપજ અને સારી ગુણવતા, નરમ હવાદાર અને ભરભરી જમીન...  Mo.8238009308', 'TTzMyrfs6EMAKDjahRjavBBEMNc2', '11/12/2020', '09:52 AM'),
(58, 'DK1112205fd2f550d8b94', 'Tractors & Its Equipment', 'કિસાન થ્રેસર', 'નવા કિસાન થ્રેસર લેવા માટે મળો... થ્રેસર ના સ્પેરપાર્ટ્સ માટે મળો.... આધુનિક ટેકનોલોજી સજ્જ..', 'TTzMyrfs6EMAKDjahRjavBBEMNc2', '11/12/2020', '09:58 AM'),
(60, 'DK1112205fd2fb885b125', 'Tractors & Its Equipment', 'જુનું થ્રેશર વહેચવાનું છે...', 'સ્થળ : મોટી ઘંસારી, તા. કેશોદ\nમો. નં. : 9723624304', 'Fr8b5YwUoRd1DUByW6zw6PdTdSz2', '11/12/2020', '10:24 AM'),
(61, 'DK1112205fd2ff02ca742', 'Animal Husbandry', 'બળદ ની જોડ', 'બળદ ની જોડ વેચવાની છે.\nસ્થળ : વીરપુર માંગરોળ\nમો. 7984279225', 'GFKRiPuNZqYGzzrzX3ExsF6kdHR2', '11/12/2020', '10:39 AM'),
(62, 'DK1112205fd3003c5554b', 'Tractors & Its Equipment', 'યુવરાજ મીની ટ્રેક્ટર વહેચવાનું છે.', 'યુવરાજ મીની ટ્રેક્ટર સાથે ઓજાર માં દાતિ, માઢ ,રાપ, સૂયા હાતિ નો પાટલો પાવડા બધું સાથે વહેચવાનું છે. \r\nમો. 9998447270', 'VSTO4W4xsOf3rkqTLSzrexFVi1O2', '11/12/2020', '10:44 AM'),
(63, 'DK1112205fd301acabd77', 'Animal Husbandry', 'બળદ વહેચવાના છે', 'બીજી ધર, બે બાજુ હાલે, સાવ સોજો, જવાબ દારી વાળો.\nસ્થળ : ગામ- લોએજ, તાલુકો- માંગરોળ, જીલ્લો જુનાગઢ.\nમો. 9825034169', 'VSTO4W4xsOf3rkqTLSzrexFVi1O2', '11/12/2020', '10:50 AM'),
(64, 'DK1112205fd302cfad151', 'Animal Husbandry', 'ભેંસ વહેચવાની છે.', 'મુ. દિવાસા \r\nમો.6356680986', 'GFKRiPuNZqYGzzrzX3ExsF6kdHR2', '11/12/2020', '10:55 AM'),
(65, 'DK1112205fd3273e386f6', 'Farming Equipment', 'ઓપનેર વેચવાનું છે', '૩ નું ઓપનેર, યોગી નું ૧૦ નુ મશીન પટેલ ફિલ્ડ માર્શલ સ્પેશિયલ એક્સલ ટાયર ૬૦% , પટા ૩ ના નવા , પંપડી , ૨.૫ ની ઉધ, ૪ નો ફાટો , સેન કંપી સાથે પૂરો સેટ આપવાનો છે.\n\nસ્થળ : માણાવદર. ( દગડ )\n\nMo. 6355567635', 'Fr8b5YwUoRd1DUByW6zw6PdTdSz2', '11/12/2020', '01:31 PM'),
(66, 'DK1112205fd32dff9924b', 'Farming Equipment', 'ગાડુ વહેચવાનુ છે..', 'સ્થળ : કાત્રાસા \nમો. 9624828848', 'VSTO4W4xsOf3rkqTLSzrexFVi1O2', '11/12/2020', '01:59 PM'),
(67, 'DK1112205fd330e593e9b', 'Seeds & Grains', 'જી 32 મગફળી બિયારણ', 'જી 32 મગફળી ડોડવા બિયારણ માં વેચવાની છે. ભાવ 1350 મણ ગામ કણેરી... Mo. 9925285952\nતા.કેશોદ જી.જૂનાગઢ', 'VSTO4W4xsOf3rkqTLSzrexFVi1O2', '11/12/2020', '02:12 PM'),
(68, 'DK1112205fd3318cec09b', 'Seeds & Grains', 'મગ વેચવાના છે.', 'Mo.9724563387', 'TTzMyrfs6EMAKDjahRjavBBEMNc2', '11/12/2020', '02:15 PM'),
(69, 'DK1112205fd3324593b63', 'Seeds & Grains', 'રેનો-૩૯ મગફળી', 'રેનો-૩૯ મગફળી બિયારણ વહેચવાનુ છે\nMo. - ૯૮૨૫૫૨૦૧૯૨ પર સંપર્ક કરવો..', 'Fr8b5YwUoRd1DUByW6zw6PdTdSz2', '11/12/2020', '02:18 PM'),
(70, 'DK1112205fd332d9be85a', 'Plants & Seedling', 'ડુંગળી નો રોપ વેચવાનો છે', 'સ્થળ : માળીયા હાટીના ગામ જુથલ રામ વાવ\nફોન - 9824162824', 'VSTO4W4xsOf3rkqTLSzrexFVi1O2', '11/12/2020', '02:20 PM'),
(71, 'DK1112205fd333e777f9f', 'Plants & Seedling', 'નાળીયેરી ના રોપ વહેચવાના છે.', 'શાપુર, માંગરોળ\r\nમો. 7698545386', 'GFKRiPuNZqYGzzrzX3ExsF6kdHR2', '11/12/2020', '02:25 PM'),
(72, 'DK1112205fd3358a45c44', 'Agro Chemicals And Products', 'એગ્રી 82 , એગ્રી હ્યુમીક', 'જમીન પોચી બનાવવા, જમીનની ફળદ્રુપતા વધારવા, પાકના મૂળ વધારવા, લસણ ડુંગળી માં સુકાળો આવ્યો તે કોઈપણ ખામી માટે, તથા ગમે તે પાક માટે ઉપયોગ કરી શકો છો કિંમત એગ્રી 82 ની :- 440 એગ્રી હ્યુમિક ની :- 595 \nનં. :- 9737837274', 'VSTO4W4xsOf3rkqTLSzrexFVi1O2', '11/12/2020', '02:32 PM'),
(73, 'DK1112205fd336ca5ac07', 'Farming Land', '21વીઘા જમીન વેચવાની છે', '21વીધા ખાતામાં અને 30વીધા વાવેતર,\nએક બોર, એક કુવો \nમોબાઈલ નંબર 7096984223', 'VSTO4W4xsOf3rkqTLSzrexFVi1O2', '11/12/2020', '02:37 PM'),
(74, 'DK1112205fd3371bab57c', 'Farming Land', '9 વિઘા જમીન વહેચવાની છે.', 'જુનાગઢ વંથલી હાઇવે ટચ\nમો. ૯૪૨૮૫૭૩૪૪૪', 'TTzMyrfs6EMAKDjahRjavBBEMNc2', '11/12/2020', '02:38 PM'),
(75, 'DK1112205fd337bebe58b', 'Farming Land', '૧૧ વીઘા જમીન વહેચવાની છે.', 'ફૂલ પાણી વાળી, કુવો અને 10hp નું લાઈટ કનેકશન, આંબાની બાગ.\nમો. ૯૪૦૯૯૪૪૪૫૫', 'Fr8b5YwUoRd1DUByW6zw6PdTdSz2', '11/12/2020', '02:41 PM');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` int(11) NOT NULL,
  `post_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_fid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `cmnt_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cmnt_time` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

CREATE TABLE `post_images` (
  `id` int(11) NOT NULL,
  `post_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_images`
--

INSERT INTO `post_images` (`id`, `post_uid`, `image_url`) VALUES
(98, 'DK1012205fd20033bf8c2', '/images/post_images/DK1012205fd20033bf8c2/4ca13ffa1fc8f43e999738706d1ade23.jpeg'),
(99, 'DK1012205fd20033bf8c2', '/images/post_images/DK1012205fd20033bf8c2/05a55daeb97bf9296c3580d4286b11f3.jpeg'),
(100, 'DK1012205fd20033bf8c2', '/images/post_images/DK1012205fd20033bf8c2/406812_359528288_5fcbc2c8810cb_1607189192.jpg'),
(101, 'DK1112205fd2f40c87260', '/images/post_images/DK1112205fd2f40c87260/315810_1036185752_5f54c678cceb4_1599391352.jpg'),
(102, 'DK1112205fd2f40c87260', '/images/post_images/DK1112205fd2f40c87260/852002f0cc4ef1bf1ba1008ed268d219.jpg'),
(103, 'DK1112205fd2f40c87260', '/images/post_images/DK1112205fd2f40c87260/f3fff2be3623aa470d1341cbfae722cc.jpg'),
(104, 'DK1112205fd2f40c87260', '/images/post_images/DK1112205fd2f40c87260/f39473230f42b1d6a96a7539691ff7b3.jpeg'),
(105, 'DK1112205fd2f550d8b94', '/images/post_images/DK1112205fd2f550d8b94/402127_1123299943_5fc5eabb4ccf2_1606806203.jpg'),
(106, 'DK1112205fd2f550d8b94', '/images/post_images/DK1112205fd2f550d8b94/402127_1975058204_5fc5eabb85e79_1606806203.jpg'),
(110, 'DK1112205fd2fb885b125', '/images/post_images/DK1112205fd2fb885b125/411498_372038744_5fd2d639a011d_1607652921.jpg'),
(111, 'DK1112205fd2fb885b125', '/images/post_images/DK1112205fd2fb885b125/411498_398664300_5fd2d639cb15a_1607652921.jpg'),
(112, 'DK1112205fd2fb885b125', '/images/post_images/DK1112205fd2fb885b125/411498_1082082180_5fd2d639b1d77_1607652921.jpg'),
(113, 'DK1112205fd2ff02ca742', '/images/post_images/DK1112205fd2ff02ca742/411627_74270480_5fd2f1422ddd8_1607659842.jpg'),
(114, 'DK1112205fd2ff02ca742', '/images/post_images/DK1112205fd2ff02ca742/411627_905851130_5fd2f13aedd74_1607659834.jpg'),
(115, 'DK1112205fd2ff02ca742', '/images/post_images/DK1112205fd2ff02ca742/411627_1690545684_5fd2f1473c02e_1607659847.jpg'),
(116, 'DK1112205fd3003c5554b', '/images/post_images/DK1112205fd3003c5554b/411529_32782863_5fd2def137995_1607655153.jpg'),
(117, 'DK1112205fd3003c5554b', '/images/post_images/DK1112205fd3003c5554b/411529_401345613_5fd2def1583d3_1607655153.jpg'),
(118, 'DK1112205fd3003c5554b', '/images/post_images/DK1112205fd3003c5554b/411529_1206577840_5fd2def161de0_1607655153.jpg'),
(119, 'DK1112205fd301acabd77', '/images/post_images/DK1112205fd301acabd77/411539_1157242982_5fd2e0f8c2c9b_1607655672.jpg'),
(120, 'DK1112205fd301acabd77', '/images/post_images/DK1112205fd301acabd77/411539_1407243101_5fd2e0f9b340b_1607655673.jpg'),
(121, 'DK1112205fd301acabd77', '/images/post_images/DK1112205fd301acabd77/411539_1798590483_5fd2e0f8a214b_1607655672.jpg'),
(122, 'DK1112205fd302cfad151', '/images/post_images/DK1112205fd302cfad151/411510_1135846409_5fd2daee0e188_1607654126.jpg'),
(123, 'DK1112205fd302cfad151', '/images/post_images/DK1112205fd302cfad151/411510_1280523586_5fd2daedd6314_1607654125.jpg'),
(124, 'DK1112205fd302cfad151', '/images/post_images/DK1112205fd302cfad151/411510_1542622828_5fd2daee122f7_1607654126.jpg'),
(125, 'DK1112205fd3273e386f6', '/images/post_images/DK1112205fd3273e386f6/411802_369311620_5fd30dbe7ed65_1607667134.jpg'),
(126, 'DK1112205fd3273e386f6', '/images/post_images/DK1112205fd3273e386f6/411802_476003678_5fd30dbfb8f09_1607667135.jpg'),
(127, 'DK1112205fd3273e386f6', '/images/post_images/DK1112205fd3273e386f6/411802_988768797_5fd30dbe91134_1607667134.jpg'),
(128, 'DK1112205fd32dff9924b', '/images/post_images/DK1112205fd32dff9924b/409408_898986313_5fcf6c5b3e05b_1607429211.jpg'),
(129, 'DK1112205fd32dff9924b', '/images/post_images/DK1112205fd32dff9924b/409408_978760611_5fcf6c61d2b52_1607429217.jpg'),
(130, 'DK1112205fd32dff9924b', '/images/post_images/DK1112205fd32dff9924b/409408_1530955288_5fcf6c6294737_1607429218.jpg'),
(131, 'DK1112205fd330e593e9b', '/images/post_images/DK1112205fd330e593e9b/408685_523080506_5fce4866c73d6_1607354470.jpg'),
(132, 'DK1112205fd330e593e9b', '/images/post_images/DK1112205fd330e593e9b/408685_1738514642_5fce486684151_1607354470.jpg'),
(133, 'DK1112205fd330e593e9b', '/images/post_images/DK1112205fd330e593e9b/408685_2000291934_5fce486679905_1607354470.jpg'),
(134, 'DK1112205fd3318cec09b', '/images/post_images/DK1112205fd3318cec09b/408296_115696091_5fcde4a8b5308_1607328936.jpg'),
(135, 'DK1112205fd3318cec09b', '/images/post_images/DK1112205fd3318cec09b/408296_1238049031_5fcde4a8a43b0_1607328936.jpg'),
(136, 'DK1112205fd3324593b63', '/images/post_images/DK1112205fd3324593b63/407694_284301557_5fccdd6437315_1607261540.jpg'),
(137, 'DK1112205fd3324593b63', '/images/post_images/DK1112205fd3324593b63/407694_556313765_5fccdd7400d2c_1607261556.jpg'),
(138, 'DK1112205fd332d9be85a', '/images/post_images/DK1112205fd332d9be85a/410615_5256314_5fd1811c5e61d_1607565596.jpg'),
(139, 'DK1112205fd332d9be85a', '/images/post_images/DK1112205fd332d9be85a/410615_1313111384_5fd1811c296f4_1607565596.jpg'),
(140, 'DK1112205fd333e777f9f', '/images/post_images/DK1112205fd333e777f9f/397300_83766463_5fbf640497528_1606378500.jpg'),
(141, 'DK1112205fd333e777f9f', '/images/post_images/DK1112205fd333e777f9f/397300_1433589477_5fbf6404b633f_1606378500.jpg'),
(142, 'DK1112205fd3358a45c44', '/images/post_images/DK1112205fd3358a45c44/409202_190242867_5fcf35bf57fb4_1607415231.jpg'),
(143, 'DK1112205fd3358a45c44', '/images/post_images/DK1112205fd3358a45c44/409202_1692083818_5fcf35bede3a1_1607415230.jpg'),
(144, 'DK1112205fd3358a45c44', '/images/post_images/DK1112205fd3358a45c44/409202_1722983879_5fcf35bec466a_1607415230.jpg'),
(145, 'DK1312205fd5a30a52261', '/images/post_images/DK1312205fd5a30a52261/IMG-20201213-WA0002.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `id` int(11) NOT NULL,
  `post_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_fid` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_likes`
--

INSERT INTO `post_likes` (`id`, `post_uid`, `user_fid`) VALUES
(175, 'DK1112205fd2f40c87260', 'GFKRiPuNZqYGzzrzX3ExsF6kdHR2'),
(182, 'DK1112205fd336ca5ac07', 'Fr8b5YwUoRd1DUByW6zw6PdTdSz2'),
(183, 'DK1112205fd3371bab57c', 'Fr8b5YwUoRd1DUByW6zw6PdTdSz2'),
(184, 'DK1112205fd337bebe58b', 'Fr8b5YwUoRd1DUByW6zw6PdTdSz2'),
(185, 'DK1112205fd32dff9924b', 'Fr8b5YwUoRd1DUByW6zw6PdTdSz2'),
(186, 'DK1112205fd3273e386f6', 'Fr8b5YwUoRd1DUByW6zw6PdTdSz2'),
(187, 'DK1112205fd3003c5554b', 'Fr8b5YwUoRd1DUByW6zw6PdTdSz2'),
(188, 'DK1112205fd2fb885b125', 'Fr8b5YwUoRd1DUByW6zw6PdTdSz2'),
(189, 'DK1112205fd332d9be85a', 'Fr8b5YwUoRd1DUByW6zw6PdTdSz2'),
(193, 'DK1112205fd32dff9924b', 'VSTO4W4xsOf3rkqTLSzrexFVi1O2');

-- --------------------------------------------------------

--
-- Table structure for table `saved_posts`
--

CREATE TABLE `saved_posts` (
  `id` int(11) NOT NULL,
  `post_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_fid` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `saved_posts`
--

INSERT INTO `saved_posts` (`id`, `post_uid`, `user_fid`) VALUES
(18, 'DK1112205fd3273e386f6', 'RBcSPz9CKTNKS52rpjixXqssVOA3'),
(19, 'DK1112205fd32dff9924b', 'Fr8b5YwUoRd1DUByW6zw6PdTdSz2'),
(20, 'DK1112205fd3273e386f6', 'xNyhE5IBQnS7vkXi77mqTXWiNF93');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `img_url` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `img_url`) VALUES
(1, 'images/slider/1-min.jpg'),
(2, 'images/slider/2-min.jpg'),
(3, 'images/slider/3-min.jpg'),
(4, 'images/slider/4-min.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firebase_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobileno` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_picture` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pincode` int(6) NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firebase_uid`, `name`, `email`, `mobileno`, `gender`, `profile_picture`, `pincode`, `district`, `city`, `state`) VALUES
('Fr8b5YwUoRd1DUByW6zw6PdTdSz2', 'Yash Nasit', 'yash.nasit111@gmail.com', '9737557068', 'Male', '/images/profile_pictures/Fr8b5YwUoRd1DUByW6zw6PdTdSz2/FB_IMG_1607578683739.jpg', 362220, 'Junagadh', 'Keshod', 'Gujarat'),
('GFKRiPuNZqYGzzrzX3ExsF6kdHR2', 'Rutvik Mori', 'rutvik.mori@gmail.com', '9104870432', 'Male', '/images/profile_pictures/blank-dp.jpg', 362001, 'Junagadh', 'Junagadh', 'Gujarat'),
('TTzMyrfs6EMAKDjahRjavBBEMNc2', 'Prakash Bharda', 'prakash.bharda@gmail.com', '9925988458', 'Male', '/images/profile_pictures/blank-dp.jpg', 362220, 'Junagadh', 'Keshod', 'Gujarat'),
('VSTO4W4xsOf3rkqTLSzrexFVi1O2', 'Bhavin Nandaniya', 'bhavin.ahir@gmail.com', '8200030710', 'Male', '/images/profile_pictures/blank-dp.jpg', 362225, 'Junagadh', 'Mangrol', 'Gujarat'),
('xNyhE5IBQnS7vkXi77mqTXWiNF93', 'Nikita', 'nikita@gmail.com', '8530837558', 'Female', '/images/profile_pictures/xNyhE5IBQnS7vkXi77mqTXWiNF93/74798841-happy-faces-flowers-logo-vector-design.jpg', 362630, 'Junagadh', 'Manavadar', 'Gujarat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_posts`
--
ALTER TABLE `saved_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`firebase_uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `saved_posts`
--
ALTER TABLE `saved_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
