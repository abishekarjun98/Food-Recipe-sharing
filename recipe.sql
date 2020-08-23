-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2020 at 07:53 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `audio_post`
--

CREATE TABLE `audio_post` (
  `P_ID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Location` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audio_post`
--

INSERT INTO `audio_post` (`P_ID`, `UID`, `Title`, `Location`) VALUES
(122, 1, 'qmqm`', 'audio_rec/1_qmqm`.wav'),
(123, 9, '', 'audio_rec/9_.wav'),
(124, 9, '', 'audio_rec/9_.wav'),
(125, 1, 'eeeee', 'audio_rec/1_eeeee.wav');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `C_ID` int(11) NOT NULL,
  `P_ID` int(11) NOT NULL,
  `C_By` varchar(255) NOT NULL,
  `Comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`C_ID`, `P_ID`, `C_By`, `Comment`) VALUES
(7, 36, '2', 'sss'),
(8, 36, '10', 'so good'),
(9, 36, '12', 'woowww'),
(10, 36, '12', 'very gud'),
(11, 20, '10', 'woowww'),
(12, 41, '1', 'super taste'),
(13, 42, '1', 'suoer'),
(14, 42, '1', 'wowow'),
(15, 35, '8', 'very gud'),
(16, 49, '2', 'so good'),
(17, 49, '2', 'rrrr'),
(18, 49, '2', 'so good'),
(19, 49, '2', 'very gud'),
(20, 50, '2', 'very gud'),
(21, 50, '2', 'so good'),
(22, 50, '2', 'woowww'),
(23, 48, '2', 'very gud'),
(24, 21, '2', 'very gud'),
(25, 21, '2', ''),
(26, 21, '2', 'sss'),
(27, 47, '2', 'so good'),
(28, 47, '12', 'super taste'),
(29, 47, '12', 'ddd'),
(30, 47, '12', 'ddd'),
(31, 47, '12', 'rrrrr'),
(32, 47, '12', ''),
(33, 49, '12', 'sss'),
(34, 49, '12', 'so good'),
(35, 59, '12', 'very gud'),
(36, 60, '12', 'so good'),
(37, 60, '12', ''),
(38, 60, '12', ''),
(39, 27, '12', 'so good'),
(40, 29, '12', 'so good'),
(41, 32, '12', 'so good'),
(42, 55, '8', 'very gud'),
(43, 113, '2', 'very gud'),
(44, 119, '1', 'woowww'),
(45, 113, '2', 'mamam'),
(46, 123, '1', 'aaaah'),
(47, 100, '11', 'noiiice'),
(48, 101, '1', 'so good');

-- --------------------------------------------------------

--
-- Table structure for table `comp_data`
--

CREATE TABLE `comp_data` (
  `Contest_Id` int(11) NOT NULL,
  `Hosted_by` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Description` longtext NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Winner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comp_data`
--

INSERT INTO `comp_data` (`Contest_Id`, `Hosted_by`, `Title`, `Description`, `Start_date`, `End_date`, `Winner`) VALUES
(11, 2, 'new_contest', 'descripton....', '2020-08-15', '2020-08-16', ''),
(13, 8, 'sambha', 'something', '2020-08-15', '2020-08-16', ''),
(14, 2, 'something :?', '', '2020-08-16', '2020-08-19', ''),
(15, 1, 'sambha', '1', '2020-08-21', '2020-08-23', ''),
(16, 1, 'qq,,qmqmq', '', '2020-08-22', '2020-08-25', 'entry1');

-- --------------------------------------------------------

--
-- Table structure for table `daily_tips`
--

CREATE TABLE `daily_tips` (
  `ID` int(11) NOT NULL,
  `Tip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_tips`
--

INSERT INTO `daily_tips` (`ID`, `Tip`) VALUES
(0, 'Wash vegetables before peeling or cutting to preserve the water soluble vitamins.'),
(1, 'Peel vegetables as thinly as possible to preserve the minerals and vitamins.'),
(2, 'Soak potatoes and eggplant after cutting, to avoid discoloration.'),
(3, 'If you boil vegetables in water, do not throw the water, keep it to make gravies.'),
(4, 'To avoid browning of apples after cutting, apply a little lemon juice on the cut surface. The apples will stay and look fresh for a longer time.'),
(5, 'Heat the oil thoroughly before adding seasonings or vegetables.'),
(6, 'Fry the seasonings until they change color, to get full flavour of seasonings.'),
(7, 'If masala sticks to the pan that shows quantity of fat included is not enough.'),
(8, 'Add some hot oil and 1/2 tsp of baking soda in batter while making pakodas.'),
(9, 'When coconut is used in grinding masala, do not fry for a longer time.'),
(10, 'Always use ghee or vanaspathi with or instead of oil, which gives a good flavour to the gravy. If oil alone is used, it does not get separated easily from the ground mixture, as ghee separates from it.'),
(11, 'Fry the ground masala in reduced flame, so that it retains its colour and taste.'),
(12, 'Little plain sugar or caramelised sugar added to the gravy makes it tasty.'),
(13, 'When tomatoes are not in season, tomato ketchup or sauce can be successfully used in the gravies.'),
(14, 'To retain colour in the gravy always use ripe red tomatoes. Discard green portions if any.'),
(15, 'If you are making pasta or rice, cook some extra and store in refrigerator for the next meal.'),
(16, 'Keep some boiled potatoes in fridge, to make quick sandwiches for breakfast.'),
(17, 'Use left over rice for next day meal, use your imagination and cook something new.'),
(18, 'Keep some extra dough in fridge to make chapatis for breakfast.'),
(19, 'Use leftover sukhi dal to make stuffed paratha.'),
(20, 'When you cook chicken or meat, you should first cook over high heat to seal juices and then lower the heat and cook till tender'),
(21, 'If you want to store fish for more than a day, first clean it, rub it with salt, turmeric and maybe, a dash of vinegar, and then freeze. It will stay fresh.'),
(22, 'Don’t salt meat before you cook it. The salt forces the juices out and impedes browning. Instead, salt meat halfway through cooking, then taste when the meat is done and adjust the salt as needed.'),
(23, 'Meat that is partially frozen is much easier to cut or slice.'),
(24, 'Cooking of hamburgers may take hell of a long time. To cook them a little faster, you could poke a hole in the middle of the hamburger patties while shaping them. This helps them cook faster and the holes disappear once the burgers are done.'),
(25, 'Allow meat to stand at room temperature 1 hour before cooking: It will cook more quickly, brown more evenly, and stick less when pan-fried.'),
(26, 'To help keep meats moist during a long grill or barbecue, add a pan of water close to the fire, but away from the meat.'),
(27, 'To coat chicken evenly, you can place the seasonings or crumbs in a plastic bag, and then add a few pieces at a time and shake them well.'),
(28, 'For golden-brown fried chicken, roll in powdered milk instead of flour before frying.'),
(29, 'To prevent bacon from curling, dip the strips in cold water before cooking.'),
(30, 'Sprinkle a little amount of salt in the frying pan before adding bacon to fry. That way it will not splatter all over.'),
(31, 'To ensure that sausages keep their shape, put them into cold water, bring to a boil and then drain immediately and grill or fry in a saucepan.'),
(32, 'When you cook chicken or meat, you should first cook over high heat to seal juices and then lower the heat and cook till tender.'),
(33, 'To avoid kebabs from becoming hard and chewy, marinate them for a longer time and avoid over cooking them.'),
(34, 'To get rid of the smell of prawns, apply salt and lemon juice to the prawns before cooking. Leave for 15-20 minutes, then wash off and proceed with the recipe. This is usually done with prawns, fish and al kinds of seafood.'),
(35, 'For better results, mutton should be of a younger animal. It looks pink and not red and texture should be firm. If it is red and looks ‘wrinkled’, it will be tough.'),
(36, 'Softening chicken for salads and sandwiches Chicken in salads and sandwhiches is usually poached. What poaching does is surrounds the chicken with liquid, so no moisture is lost and cooks the chicken gently, as opposed to grilling or pan frying.'),
(37, 'How can you tell that steaks are done? Color can be a good indicator of doneness. This is because myoglobin which gives meat its color, changes from red to pink to brown as meat cooks. A rare steak is bright red. A medium-rare steak is dark pink with some red present; a medium steak is very light pink in color and of course, well-done is brown.'),
(38, 'To make 1 cup of dal, add atleast 2-3 cups of water, depending on the type of dal.'),
(39, 'Soak whole pulses overnight and other dals for one hour before cooking.'),
(40, 'Always add hot water to the gravy to enhance the taste.'),
(41, 'Add 1 Tbsp of hot oil to the dough for making Kachories or Kulchas.'),
(42, 'Always use heavy bottomed vessels to make desserts, in order to avoid burning.'),
(43, 'Make desserts with full cream milk, to get thick creamy texture.'),
(44, 'Whenever curd is to be added to the masala, it should be beaten well and add gradually.'),
(45, 'Chop some extra vegetables, for next day stir fry.'),
(46, 'Use the leftover dal water to make rasam or sambar.'),
(47, 'Never discard water in which vegetables are cooked, use it in gravies, soups, rasam or kolumbu.'),
(48, 'Onions and masala are fried in the cooker body itself, raw vegetables are added to that with enough salt and water. Cook under pressure according to the cooking time of the vegetable. This method helps us minimise our cooking time, use of utensils and nutrients are also preserved.'),
(49, 'If poppy seeds are used in grinding, soak it in hot water for 10 to 15 minutes, if you are grinding it in a mixie.'),
(50, 'While boiling milk, always add a little water at the base of the vessel to avoid the milk from sticking at the bottom.'),
(51, 'Add a tsp. of hot oil to homemade pastes of garlic, ginger or green chili, along with salt to make it last longer and taste fresher.'),
(52, 'Store raisins in an airtight container in the refrigerator. They will stay fresh for much longer. Pour very hot water over them if they had harden, after that drain them immediately, and spread on a paper towel to dry. You can also leave a spoon in the vessel in which the milk is being boiled at low heat so that it does not get burnt at the bottom'),
(53, 'Add a few drops of lemon a tsp of oil to rice before boiling to separate each grain.'),
(54, 'Never discard the water in which vegetables are cooked, use it in gravies or soups.'),
(55, 'Put tomatoes in a large bowl and cover with boiling water Leave it for about 5 minutes. Take out one by one, piercing them with a sharp knife, the skin will peel off easily.'),
(56, 'Immediately after boiling noodles put them in normal cold water to separate them each.'),
(57, 'If you forget to soak chana/Rajma overnight. Just soak the chana/Rajma in the boiling water for an hour before cooking.'),
(58, 'Curd in winter – Set in a ceramic container and place it on the voltage stabilizer of your refrigerator.'),
(59, 'Potatoes soaked in salt water for 20 minutes will bake more rapidly.'),
(60, 'Roasting is a dry heat method of cooking – it does not use water. The flavors roasting draws forth result from the process of browning. As the surface of the meat browns, and its juices and fats drip down and brown on the surface of the hot roasting pan, it adds to the flavour of the meat.');

-- --------------------------------------------------------

--
-- Table structure for table `find_recipes`
--

CREATE TABLE `find_recipes` (
  `entry_id` int(11) NOT NULL,
  `entry_content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `find_recipes`
--

INSERT INTO `find_recipes` (`entry_id`, `entry_content`) VALUES
(1, 'capsicum'),
(2, 'capsicum'),
(3, 'panner'),
(4, 'panner'),
(5, 'panner,capsicum'),
(6, 'panner,capsicum'),
(7, 'tomato+chilli'),
(8, 'tomato'),
(9, 'panner'),
(10, 'panner'),
(11, 'panner'),
(12, 'panner'),
(13, 'panner'),
(14, 'panner'),
(15, 'panner'),
(16, 'panner'),
(17, 'panner'),
(18, 'panner'),
(19, 'panner'),
(20, 'panner'),
(21, 'panner'),
(22, 'panner'),
(23, 'panner'),
(24, 'tomato'),
(25, 'panner'),
(26, 'panner'),
(27, 'capsicum'),
(28, 'capsicum'),
(29, 'tomato'),
(30, 'tomato+chilli'),
(31, 'mutton+beans+carrot'),
(32, 'mutton+beans+carrot'),
(33, 'mutton+beans+carrot'),
(34, 'chicken+carrot'),
(35, 'carrot+beans+brinjal'),
(36, 'carrot+beans+brinjal'),
(37, 'carrot+beans+brinjal'),
(38, 'carrot+beans+brinjal'),
(39, 'carrot+beans+brinjal'),
(40, 'carrot+beans+brinjal'),
(41, 'carrot+beans+brinjal'),
(42, 'carrot+beans+brinjal'),
(43, 'carrot+beans+brinjal'),
(44, 'carrot+beans+brinjal'),
(45, 'carrot+beans+brinjal'),
(46, 'carrot+beans+brinjal'),
(47, 'carrot+beans+brinjal'),
(48, 'carrot+beans+brinjal'),
(49, 'carrot+beans+brinjal'),
(50, 'carrot+beans+brinjal'),
(51, 'capsicum+bread'),
(52, 'eggs'),
(53, 'capsicum+egg'),
(54, 'capsicum+egg'),
(55, 'eggs'),
(56, 'eggs'),
(57, 'eggs'),
(58, ''),
(59, ''),
(60, 'panner'),
(61, ''),
(62, 'capsicum'),
(63, 'capsicum'),
(64, 'capsicum'),
(65, 'capsicum'),
(66, 'capsicum'),
(67, 'capsicum'),
(68, 'capsicum'),
(69, 'panner'),
(70, ''),
(71, 'tomato'),
(72, 'tomato'),
(73, 'tomato+chilli'),
(74, 'tomato+chilli'),
(75, 'tomato+chilli'),
(76, 'chilli'),
(77, 'chilli'),
(78, 'chilli'),
(79, 'chilli'),
(80, 'chilli'),
(81, 'chilli'),
(82, 'chilli'),
(83, 'chilli'),
(84, 'chicken+carrot'),
(85, 'chicken+carrot'),
(86, 'chicken+carrot'),
(87, 'chicken+carrot'),
(88, 'panner'),
(89, 'panner'),
(90, 'panner'),
(91, 'panner'),
(92, 'panner'),
(93, 'panner'),
(94, 'tomato'),
(95, 'tomato'),
(96, 'tomato'),
(97, 'tomato'),
(98, 'tomato'),
(99, 'tomato'),
(100, 'tomato'),
(101, 'tomato'),
(102, 'tomato'),
(103, 'tomato'),
(104, 'tomato'),
(105, 'panner'),
(106, 'panner'),
(107, 'panner'),
(108, 'panner'),
(109, 'panner'),
(110, 'tomato+chilli'),
(111, 'tomato+chilli'),
(112, 'tomato+chilli'),
(113, 'tomato+chilli'),
(114, 'tomato+chilli'),
(115, 'turnip'),
(116, 'turnip'),
(117, 'turnip'),
(118, 'turnip'),
(119, 'turnip'),
(120, 'turnip'),
(121, 'turnip'),
(122, 'turnip'),
(123, 'turnip'),
(124, 'turnip'),
(125, 'carrot+beans+cabbage+potato'),
(126, 'panner'),
(127, 'tomato'),
(128, 'mayonnise'),
(129, 'panner+mayonnise'),
(130, 'panner+mayonnise'),
(131, 'panner'),
(132, ''),
(133, 'tomato+chilli'),
(134, 'tomato+chilli'),
(135, 'panner'),
(136, 'panner'),
(137, 'panner'),
(138, 'tomato+chilli'),
(139, 'tomato+chilli'),
(140, 'capsicum'),
(141, 'capsicum'),
(142, 'capsicum'),
(143, 'capsicum'),
(144, 'capsicum'),
(145, 'capsicum'),
(146, 'capsicum'),
(147, 'capsicum'),
(148, 'capsicum'),
(149, 'capsicum'),
(150, 'capsicum'),
(151, 'capsicum'),
(152, 'tomato+chilli'),
(153, 'panner'),
(154, 'eggs'),
(155, 'tomato'),
(156, 'tomato+chilli'),
(157, 'carrot+beans+cabbage+potato'),
(158, 'panner'),
(159, 'tomato+chilli'),
(160, 'capsicum'),
(161, 'tomato+chilli'),
(162, 'dosa'),
(163, 'sambhar'),
(164, 'sambhar chutney'),
(165, 'sambhar chutney'),
(166, 'carrot'),
(167, 'panner'),
(168, 'tomato'),
(169, 'spicy'),
(170, 'panner'),
(171, 'panner'),
(172, 'panner'),
(173, 'panner'),
(174, 'panner'),
(175, 'panner'),
(176, 'panner'),
(177, 'panner'),
(178, 'panner'),
(179, 'panner'),
(180, 'panner'),
(181, 'capsicum'),
(182, 'capsicum'),
(183, 'capsicum'),
(184, 'panner'),
(185, 'panner'),
(186, 'masal dosa'),
(187, 'dosa'),
(188, 'podi dosa'),
(189, 'ham burger'),
(190, 'tomato'),
(191, 'oregano'),
(192, 'oregano'),
(193, 'red sauce paste'),
(194, 'spinach'),
(195, 'spinach'),
(196, 'spinach'),
(197, 'spinach'),
(198, 'spinach'),
(199, 'tomato'),
(200, 'paneer'),
(201, 'paneer'),
(202, 'panner');

-- --------------------------------------------------------

--
-- Table structure for table `flame_data`
--

CREATE TABLE `flame_data` (
  `P_ID` varchar(300) NOT NULL,
  `Flames` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flame_data`
--

INSERT INTO `flame_data` (`P_ID`, `Flames`) VALUES
('0', 0),
('5f409f6575a73', 4),
('5f40a30adb3ac', 0),
('5f40a33052876', 0),
('5f40d7b0df506', 0),
('5f40dd072df81', 0),
('5f40dd13e8e3a', 0),
('5f41205f5191c', 0);

-- --------------------------------------------------------

--
-- Table structure for table `followers_data`
--

CREATE TABLE `followers_data` (
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followers_data`
--

INSERT INTO `followers_data` (`user1_id`, `user2_id`) VALUES
(1, 2),
(1, 4),
(1, 8),
(1, 9),
(1, 10),
(1, 12),
(1, 13),
(2, 1),
(4, 13),
(5, 3),
(7, 2),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 11),
(9, 2),
(9, 11),
(10, 1),
(10, 2),
(10, 3),
(11, 7),
(11, 13),
(12, 1),
(12, 2),
(12, 4),
(12, 5),
(12, 6),
(12, 8),
(12, 9),
(12, 11);

-- --------------------------------------------------------

--
-- Table structure for table `pic_data`
--

CREATE TABLE `pic_data` (
  `Pic_id` int(11) NOT NULL,
  `Location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pic_data`
--

INSERT INTO `pic_data` (`Pic_id`, `Location`) VALUES
(1, 'images/sample.png'),
(2, 'uploads/profilepics/wallpaper2you_441810.jpg'),
(3, 'uploads/profilepics/thor4_1.jpg'),
(4, 'uploads/profilepics/36550317-iron-man-wallpapers-hd.jpg'),
(5, 'uploads/profilepics/avengers-infinity-war-2018-4k-cq-1920x1080.jpg'),
(6, 'uploads/profilepics/633221.jpg'),
(7, 'uploads/profilepics/bev2.jpeg'),
(8, 'uploads/profilepics/633221.jpg'),
(9, 'uploads/profilepics/bev1.jpeg'),
(10, 'uploads/postpics/N3.jpeg'),
(11, 'uploads/profilepics/avengers-infinity-war-2018-4k-cq-1920x1080.jpg'),
(12, 'uploads/profilepics/p3.jpg'),
(13, 'uploads/postpics/P2.jpeg'),
(14, 'uploads/postpics/bev3.jpeg'),
(15, 'uploads/postpics/N2.jpeg'),
(16, 'uploads/profilepics/WhatsApp Image 2019-03-11 at 10.05.26 PM.jpeg'),
(17, 'uploads/postpics/WhatsApp Image 2019-03-11 at 10.05.31 PM(1).jpeg'),
(18, 'uploads/postpics/v3.jpg'),
(19, 'uploads/postpics/WhatsApp Image 2019-03-11 at 10.05.32 PM.jpeg'),
(20, 'uploads/postpics/v4.jpg'),
(21, 'uploads/postpics/v2.jpeg'),
(22, 'uploads/postpics/v1.jpeg'),
(23, 'uploads/postpics/N3.jpeg'),
(24, 'uploads/postpics/N4.jpeg'),
(25, 'uploads/postpics/v2.jpeg'),
(26, 'uploads/postpics/N3.jpeg'),
(27, 'uploads/postpics/bev1.jpeg'),
(28, 'uploads/postpics/bev4.jpeg'),
(29, 'uploads/postpics/v2.jpeg'),
(30, 'uploads/postpics/N3.jpeg'),
(31, 'uploads/postpics/N4.jpeg'),
(32, 'uploads/postpics/N2.jpeg'),
(33, 'uploads/postpics/N2.jpeg'),
(34, 'uploads/postpics/N2.jpeg'),
(35, 'uploads/postpics/v3.jpg'),
(36, 'uploads/postpics/v3.jpg'),
(37, 'uploads/postpics/N2.jpeg'),
(38, 'uploads/postpics/v2.jpeg'),
(39, 'uploads/postpics/download.png'),
(40, 'uploads/postpics/WhatsApp Image 2019-03-11 at 10.05.32 PM.jpeg'),
(41, 'uploads/postpics/N2.jpeg'),
(42, 'uploads/profilepics/N1.jpeg'),
(43, 'uploads/postpics/bev2.jpeg'),
(44, 'uploads/postpics/N3.jpeg'),
(45, 'uploads/postpics/v4.jpg'),
(46, 'uploads/profilepics/36550317-iron-man-wallpapers-hd.jpg'),
(47, 'uploads/postpics/p3.jpg'),
(48, 'uploads/postpics/bev1.jpeg'),
(49, 'uploads/postpics/WhatsApp Image 2019-03-11 at 10.05.26 PM.jpeg'),
(50, 'uploads/postpics/N1.jpeg'),
(51, 'uploads/postpics/p3.jpg'),
(52, 'uploads/postpics/p3.jpg'),
(53, 'uploads/profilepics/633221.jpg'),
(54, 'uploads/postpics/bev1.jpeg'),
(55, 'uploads/postpics/p3.jpg'),
(56, 'uploads/postpics/p3.jpg'),
(57, 'uploads/postpics/p3.jpg'),
(58, 'uploads/postpics/bev1.jpeg'),
(59, 'uploads/postpics/p3.jpg'),
(60, 'uploads/postpics/p3.jpg'),
(61, 'uploads/postpics/bev1.jpeg'),
(62, 'uploads/postpics/bev1.jpeg'),
(63, 'uploads/postpics/p3.jpg'),
(64, 'uploads/postpics/p3.jpg'),
(65, 'uploads/postpics/WhatsApp Image 2019-03-11 at 10.05.26 PM.jpeg'),
(66, 'uploads/postpics/p3.jpg'),
(67, 'uploads/postpics/bev2.jpeg'),
(68, 'uploads/postpics/WhatsApp Image 2019-03-11 at 10.05.26 PM.jpeg'),
(69, 'uploads/profilepics/avengers-infinity-war-2018-4k-cq-1920x1080.jpg'),
(70, 'uploads/postpics/bev1.jpeg'),
(71, 'uploads/postpics/p3.jpg'),
(72, 'uploads/postpics/N1.jpeg'),
(73, 'uploads/postpics/p3.jpg'),
(74, 'uploads/postpics/WhatsApp Image 2019-03-11 at 10.05.32 PM.jpeg'),
(75, 'uploads/postpics/N4.jpeg'),
(76, 'uploads/postpics/bev3.jpeg'),
(77, 'uploads/postpics/P2.jpeg'),
(78, 'uploads/postpics/N1.jpeg'),
(79, 'uploads/postpics/P2.jpeg'),
(80, 'uploads/postpics/N2.jpeg'),
(81, 'uploads/postpics/WhatsApp Image 2019-03-11 at 10.05.31 PM(1).jpeg'),
(82, 'uploads/profilepics/wallpaper2you_441810.jpg'),
(83, 'uploads/postpics/bev1.jpeg'),
(84, 'uploads/postpics/bev2.jpeg'),
(85, 'uploads/postpics/N1.jpeg'),
(86, 'uploads/postpics/WhatsApp Image 2019-03-11 at 10.05.26 PM.jpeg'),
(87, 'uploads/postpics/p3.jpg'),
(88, ''),
(89, 'uploads/postpics/633221.jpg'),
(90, ''),
(91, 'uploads/postpics/thor4_1.jpg'),
(92, 'uploads/postpics/wallpaper2you_441810.jpg'),
(93, 'uploads/postpics/bev2.jpeg'),
(94, 'uploads/postpics/bev3.jpeg'),
(95, 'uploads/postpics/bev4.jpeg'),
(96, 'uploads/postpics/N4.jpeg'),
(97, 'uploads/postpics/P1.jpeg'),
(98, 'uploads/postpics/N2.jpeg'),
(99, ''),
(100, 'uploads/profilepics/twitter.png'),
(101, ''),
(102, 'uploads/profilepics/twitter.png'),
(103, 'uploads/postpics/N4.jpeg'),
(104, 'uploads/postpics/N4.jpeg'),
(105, 'uploads/postpics/Capture.JPG'),
(106, 'uploads/postpics/3723611.jpg'),
(107, 'uploads/postpics/3723611.jpg'),
(108, 'uploads/postpics/3723611.jpg'),
(109, 'uploads/postpics/Capture.JPG'),
(110, 'uploads/postpics/3723611.jpg'),
(111, ''),
(112, 'uploads/postpics/3723611.jpg'),
(113, 'uploads/postpics/N4.jpeg'),
(114, 'uploads/postpics/bev3.jpeg'),
(115, 'uploads/postpics/N4.jpeg'),
(116, 'uploads/postpics/p3.jpg'),
(117, 'uploads/postpics/bev2.jpeg'),
(118, 'uploads/postpics/download.png'),
(119, 'uploads/postpics/sm_5a9794da1b10e.png'),
(120, 'uploads/postpics/N1.jpeg'),
(121, 'uploads/postpics/twitter.png'),
(122, 'uploads/postpics/download.png'),
(123, 'uploads/postpics/P2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `post_data`
--

CREATE TABLE `post_data` (
  `P_ID` varchar(300) NOT NULL,
  `C_ID` int(11) NOT NULL DEFAULT '0',
  `U_ID` int(11) NOT NULL,
  `Title` varchar(25) NOT NULL,
  `Tags` longtext NOT NULL,
  `Description` mediumtext NOT NULL,
  `Serves` varchar(25) NOT NULL,
  `Ingredients` longtext NOT NULL,
  `Steps` longtext NOT NULL,
  `Origin` varchar(255) DEFAULT '0',
  `Post_Pic` varchar(255) NOT NULL,
  `Flames` int(11) NOT NULL DEFAULT '0',
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `steps_pic` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_data`
--

INSERT INTO `post_data` (`P_ID`, `C_ID`, `U_ID`, `Title`, `Tags`, `Description`, `Serves`, `Ingredients`, `Steps`, `Origin`, `Post_Pic`, `Flames`, `Timestamp`, `steps_pic`) VALUES
('5f40865f85125', 0, 9, 'sambha', 'veg,andhra,', 'something', '1-2', '', '', '', 'uploads/postpics/5f4086824253e.jpeg', 0, '2020-08-22 02:44:18', ''),
('5f4086f57384c', 0, 9, 'sambha', 'veg,andhra,', 'something', '1-2', '', '', '', 'uploads/postpics/5f408711535f0.jpeg', 0, '2020-08-22 02:46:41', ''),
('5f4089ef01af6', 0, 9, 'lalallalalala', 'veg,andhra,', '', '1-2', '', '', '', 'uploads/postpics/5f408a06bc6c6.', 0, '2020-08-22 02:59:18', ''),
('5f408b42f2c4a', 0, 9, 'dosa', 'veg,', '', '1-2', '', '', '', '', 0, '2020-08-22 03:04:46', ''),
('5f408b7b93cea', 0, 9, 'dosa', 'veg,', '', '1-2', '', '', '', '', 0, '2020-08-22 03:05:40', ''),
('5f408c54659a6', 0, 9, 'dosa', 'veg,', '', '1-2', '', '', '', '', 0, '2020-08-22 03:09:21', ''),
('5f408d8456f5e', 0, 9, 'wewqqq', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f408d964ba51.png', 0, '2020-08-22 03:14:30', 'Array'),
('5f408e3b67cdc', 0, 9, 'ioio', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f408e566824b.png', 0, '2020-08-22 03:17:42', 'Array'),
('5f408ead750f1', 0, 9, 'ytyt', 'veg,mexican,', '', '1-2', '', '', '', 'uploads/postpics/5f408ec1b9f2a.jpeg', 0, '2020-08-22 03:19:29', 'Array'),
('5f408fa1a299a', 0, 9, '89856o', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f408fb7306b1.jpeg', 0, '2020-08-22 03:23:35', 'Array'),
('5f40903ca83cd', 0, 9, 'rarar', 'veg,andhra,', '', '1-2', '', '', '', 'uploads/postpics/5f40904d12cbe.jpeg', 0, '2020-08-22 03:26:05', 'Array'),
('5f40905ea81c7', 0, 9, 'qqqqqq', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f40906bb3c29.png', 0, '2020-08-22 03:26:35', 'uploads/postpics/5f40906bb3e90.png,uploads/postpics/5f40906bb4048.png'),
('5f4090a76bb69', 0, 9, 'rerereh', 'veg,italian,', '', '1-2', '', '', '', 'uploads/postpics/5f4090b9cf225.jpeg', 0, '2020-08-22 03:27:53', 'uploads/postpics/5f4090b9cf437.jpeg,uploads/postpics/5f4090b9cf7ce.jpeg'),
('5f40931e64665', 0, 9, 'reteyew', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f409348871c1.jpeg', 0, '2020-08-22 03:38:48', 'uploads/postpics/5f409348873ee.jpeg,uploads/postpics/5f409348875d9.jpeg'),
('5f409368d1659', 0, 9, 'risc', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f40937262ed4.jpeg', 0, '2020-08-22 03:39:30', 'uploads/postpics/5f40937263132.jpg,uploads/postpics/5f40937263308.jpg'),
('5f4094227019f', 0, 9, 'capsicum', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f4094319e7e6.jpg', 0, '2020-08-22 03:42:41', 'uploads/postpics/5f4094319ea8c.jpg,uploads/postpics/5f4094319ece0.jpeg'),
('5f4094779eac7', 0, 9, 'aaaaaaaa', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f409484c9106.jpg', 0, '2020-08-22 03:44:04', 'uploads/postpics/5f409484c93c6.jpeg,uploads/postpics/5f409484c95f1.jpeg'),
('5f40953b2dcec', 0, 9, 'capsicum', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f409544a16cd.jpeg', 0, '2020-08-22 03:47:17', 'uploads/postpics/5f409544a1956.jpg'),
('5f40956a7337c', 0, 9, 'iakaak', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f409578430aa.png', 0, '2020-08-22 03:48:08', 'uploads/postpics/5f40957843363.png,uploads/postpics/5f409578436fa.png'),
('5f4095c30ad3e', 0, 9, 'pppp', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f4095d27e9dc.jpeg', 0, '2020-08-22 03:49:38', 'uploads/postpics/5f4095d27ec24.jpeg,uploads/postpics/5f4095d27edf1.jpeg'),
('5f40964eb2d7c', 0, 9, 'vavav', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f40965b1c1dc.jpeg', 0, '2020-08-22 03:51:55', 'uploads/postpics/5f40965b1c440.jpeg,uploads/postpics/5f40965b1c605.jpeg'),
('5f4096c01f47c', 0, 9, 'uauau', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f4096cd22335.jpeg', 0, '2020-08-22 03:53:49', 'uploads/postpics/5f4096cd22575.jpeg,uploads/postpics/5f4096cd2275e.jpeg'),
('5f409732243de', 0, 9, 'pllla', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f40973de02e9.png', 0, '2020-08-22 03:55:41', 'uploads/postpics/5f40973de052e.png,uploads/postpics/5f40973de0725.png'),
('5f4097d2e3cbd', 0, 9, 'ppa19101', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f4097e436e97.jpeg', 0, '2020-08-22 03:58:28', 'uploads/postpics/5f4097e4370fd.jpeg,uploads/postpics/5f4097e4372cf.jpg'),
('5f40988578a7c', 0, 9, 'olooo', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f4098937948b.jpeg', 0, '2020-08-22 04:01:23', 'uploads/postpics/5f409893798d3.jpg,uploads/postpics/5f40989379b00.jpeg'),
('5f409df61d1a1', 0, 12, 'ewrfava', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f409e05d2422.jpeg', 0, '2020-08-22 04:24:37', 'uploads/postpics/5f409e05d262f.jpg,uploads/postpics/5f409e05d27f9.jpeg'),
('5f409e51275b3', 0, 12, 'lalmd', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f409e63c9e7c.jpeg', 0, '2020-08-22 04:26:11', 'uploads/postpics/5f409e63ca0ef.jpeg,uploads/postpics/5f409e63ca2c6.jpeg'),
('5f409e6c42786', 0, 12, 'lalmd', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f409e778a2d7.jpeg', 0, '2020-08-22 04:26:31', 'uploads/postpics/5f409e778a519.jpg,uploads/postpics/5f409e778a6e7.jpg,uploads/postpics/5f409e778a8ac.jpeg'),
('5f409f2129e69', 0, 12, '090', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f409f2b576e1.jpg', 0, '2020-08-22 04:29:31', 'uploads/postpics/5f409f2b5791d.png'),
('5f409f6575a73', 0, 12, 'vcvcvc', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f409f710c88c.jpeg', 0, '2020-08-22 04:30:41', 'uploads/postpics/5f409f710cab8.jpeg,uploads/postpics/5f409f710cc8d.jpeg'),
('5f40a30adb3ac', 16, 12, 'entry1', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f40a31b90938.jpeg', 0, '2020-08-22 04:46:19', 'uploads/postpics/5f40a31b90f21.jpeg,uploads/postpics/5f40a31b914fb.jpg'),
('5f40a33052876', 16, 9, 'entry2', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f40a34418cfa.jpeg', 0, '2020-08-22 04:47:00', 'uploads/postpics/5f40a344192ad.jpeg'),
('5f40d7b0df506', 0, 1, 'bestttttt', 'veg,mexican,', 'lalallannchchjajajajajjaja', '1-2', 'nanna,', 'mamam,', 'kolkata', 'uploads/postpics/5f40d7e1c43da.jpeg', 0, '2020-08-22 08:31:29', 'uploads/postpics/5f40d7e1c4748.jpeg,uploads/postpics/5f40d7e1c4adc.jpeg,uploads/postpics/5f40d7e1c4e3a.jpeg,uploads/postpics/5f40d7e1c5286.jpeg'),
('5f40dd072df81', 15, 1, '', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f40dd0e7c534.', 0, '2020-08-22 08:53:34', ''),
('5f40dd13e8e3a', 15, 1, '', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f40dd1aa8891.jpeg', 0, '2020-08-22 08:53:46', ''),
('5f41205f5191c', 0, 2, 'tarata', 'veg,', '', '1-2', '', '', '', 'uploads/postpics/5f4120751def3.jpeg', 0, '2020-08-22 13:41:09', 'uploads/postpics/5f4120751e113.jpeg,uploads/postpics/5f4120751e2bb.jpeg,uploads/postpics/5f4120751e455.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

CREATE TABLE `saved` (
  `UID` int(11) NOT NULL,
  `P_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saved`
--

INSERT INTO `saved` (`UID`, `P_ID`) VALUES
(12, 129),
(1, 101),
(1, 37),
(2, 130);

-- --------------------------------------------------------

--
-- Table structure for table `steps_pic`
--

CREATE TABLE `steps_pic` (
  `P_ID` varchar(255) NOT NULL,
  `Pic_ID` int(11) NOT NULL,
  `Location` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `T_ID` int(11) NOT NULL,
  `P_ID` int(11) NOT NULL,
  `T_By` varchar(255) NOT NULL,
  `pic` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`T_ID`, `P_ID`, `T_By`, `pic`) VALUES
(9, 42, '1', '2 more spoons'),
(10, 47, '12', ''),
(11, 47, '12', ''),
(12, 47, '12', ''),
(13, 47, '12', ''),
(14, 47, '12', 'uploads/postpics/P2.jpeg'),
(15, 60, '8', 'uploads/postpics/p4.jpg'),
(16, 60, '8', 'uploads/postpics/P1.jpeg'),
(17, 47, '8', ''),
(18, 47, '8', 'uploads/postpics/bev2.jpeg'),
(19, 47, '8', 'uploads/postpics/p4.jpg'),
(20, 55, '8', 'uploads/postpics/P1.jpeg'),
(21, 55, '8', 'uploads/postpics/WhatsApp Image 2019-03-11 at 10.05.32 PM.jpeg'),
(22, 49, '8', 'uploads/postpics/WhatsApp Image 2019-03-11 at 10.05.31 PM(1).jpeg'),
(23, 129, '12', 'uploads/postpics/p4.jpg'),
(24, 101, '1', 'uploads/postpics/P2.jpeg'),
(25, 130, '2', ''),
(26, 130, '2', 'uploads/postpics/bev2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `profilepic` varchar(255) NOT NULL DEFAULT 'images/img_avatar.png',
  `Bio` mediumtext NOT NULL,
  `goldb` int(11) NOT NULL DEFAULT '0',
  `silverb` int(11) NOT NULL DEFAULT '0',
  `bronzeb` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`ID`, `Name`, `Email`, `Password`, `Phone`, `profilepic`, `Bio`, `goldb`, `silverb`, `bronzeb`) VALUES
(1, 'abishek', '108119021@nitt.edu ', '123', '+917397431062', 'uploads/profilepics/5f40d52c34790.png', 'abishek here', 0, 0, 0),
(2, 'rajan', 'abivenkatesh16@gmail.com ', '12345678', '+917397431062', 'uploads/profilepics/avengers-infinity-war-2018-4k-cq-1920x1080.jpg', 'eat sleeep repeat!!', 0, 0, 0),
(3, 'anbu', '1081191@nitt.edu ', '12345678', '+917397431062', 'uploads/profilepics/36550317-iron-man-wallpapers-hd.jpg', 'eat sleeep repeat', 0, 0, 0),
(4, 'guna', '108119021@nitt.edu ', '12345678', '+917397431062', 'uploads/profilepics/WhatsApp Image 2019-03-11 at 10.05.26 PM.jpeg', '', 0, 0, 0),
(5, 'senthil', 'abivenkatesh16@gmail.com ', '12345678', '+917397431062', 'images/img_avatar.png', 'rooooo', 0, 0, 0),
(6, 'sethu', '108119021@nitt.edu ', '12345678', '+917397431062', 'images/img_avatar.png', 'eat sleeep repeat', 0, 0, 0),
(7, 'kali', '108119021@nitt.edu ', '12345678', '', 'images/img_avatar.png', '', 0, 0, 0),
(8, 'marta', '108119021@nitt.edu ', '12345678', '', 'images/img_avatar.png', 'poda', 0, 0, 32),
(9, 'hannah', '108119021@nitt.edu ', '12345678', '', 'images/img_avatar.png', 'eat sleeep repeat', 0, 53, 0),
(10, 'agnes', 'abivenkatesh16@gmail.com ', '12345678', '+917397431062', 'images/img_avatar.png', '', 0, 0, 0),
(11, 'adam', '108119021@nitt.edu ', '12345678', '+917397431062', 'uploads/profilepics/wallpaper2you_441810.jpg', 'i am jonas', 0, 0, 0),
(12, 'jonas', '108119021@nitt.edu ', '12345678', '+917397431062', 'uploads/profilepics/download.png', 'i follow adam', 0, 0, 0),
(13, 'aravinda', '1081191@nitt.edu ', '12345678', '07397431062', 'images/img_avatar.png', '', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audio_post`
--
ALTER TABLE `audio_post`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `comp_data`
--
ALTER TABLE `comp_data`
  ADD PRIMARY KEY (`Contest_Id`);

--
-- Indexes for table `daily_tips`
--
ALTER TABLE `daily_tips`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `find_recipes`
--
ALTER TABLE `find_recipes`
  ADD PRIMARY KEY (`entry_id`);

--
-- Indexes for table `flame_data`
--
ALTER TABLE `flame_data`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `followers_data`
--
ALTER TABLE `followers_data`
  ADD PRIMARY KEY (`user1_id`,`user2_id`);

--
-- Indexes for table `pic_data`
--
ALTER TABLE `pic_data`
  ADD PRIMARY KEY (`Pic_id`);

--
-- Indexes for table `post_data`
--
ALTER TABLE `post_data`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `steps_pic`
--
ALTER TABLE `steps_pic`
  ADD PRIMARY KEY (`Pic_ID`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`T_ID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audio_post`
--
ALTER TABLE `audio_post`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `comp_data`
--
ALTER TABLE `comp_data`
  MODIFY `Contest_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `find_recipes`
--
ALTER TABLE `find_recipes`
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `pic_data`
--
ALTER TABLE `pic_data`
  MODIFY `Pic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `steps_pic`
--
ALTER TABLE `steps_pic`
  MODIFY `Pic_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `T_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
