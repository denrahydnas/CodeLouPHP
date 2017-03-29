-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 28, 2017 at 11:48 PM
-- Server version: 5.6.34
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `CodeLouisville`
--

-- --------------------------------------------------------

--
-- Table structure for table `phpproject`
--

CREATE TABLE `phpproject` (
  `ID` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Completed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phpproject`
--

INSERT INTO `phpproject` (`ID`, `Title`, `Completed`) VALUES
(1, 'Feed the Dog', 0),
(2, 'Make Dinner', 0),
(3, 'Make Bed', 0);

-- --------------------------------------------------------

--
-- Table structure for table `travelogue`
--

CREATE TABLE `travelogue` (
  `key` int(11) NOT NULL,
  `country` mediumtext NOT NULL,
  `city` mediumtext NOT NULL,
  `sights` longtext NOT NULL,
  `image` longtext NOT NULL,
  `visited` tinyint(1) NOT NULL DEFAULT '0',
  `fave` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `travelogue`
--

INSERT INTO `travelogue` (`key`, `country`, `city`, `sights`, `image`, `visited`, `fave`) VALUES
(1, 'South Korea', 'Jeju', 'Visit Jeju Loveland & tour Secret Garden Locations', 'jeju.png', 0, 0),
(2, 'Turkey', 'Istanbul', 'Visit the Hagia Sophia, Blue Mosque, the Bosphorus & the ruins of Troy', 'istanbul.png', 0, 0),
(3, 'Northern Ireland', 'Portrush, Portstewart and Coleraine', 'Explore the Giant&#39;s Causeway and Dunluce Castle; go to Anchor pub and my old University of Ulster stomping grounds', 'giants.png', 1, 1),
(4, 'Uruguay', 'Punta Del Este', 'See Los Dedos on the beach, stay at L&#39;Auberge', 'dedos.png', 1, 0),
(5, 'Netherlands', 'Amsterdam', 'Go to the Van Gogh Museum, Banana Bar, Cafe Old Sailor and the Grasshopper', 'amsterdam.png', 1, 0),
(6, 'South Korea', 'Seoul', 'Visit Gyeongbokgung Palace & Namsan Tower, walk along the Cheonggyecheong, explore Gangnam & Insadong', 'seoul.png', 1, 1),
(7, 'Mongolia', 'Ulaanbataar', 'See the Ghengis Khan statue, drink fermented mare\'s milk, go to a Buddhist temple and spin the drums for good luck', 'ulaanbataar.png', 1, 0),
(8, 'New Zealand', 'North Island', 'Visit Auckland, Orewa, Piha Beach, Rotorua, Hobbiton & Napier City. Go  Zorbing, sledging, bungee jumping, & absailing in Waitomo Caves!', 'rotorua.png', 1, 1),
(9, 'USA', 'Oakland, California', 'Wander through the Chapel of the Chimes & visit Kat', 'oakland.png', 1, 1),
(10, 'England', 'Firle, East Sussex', 'Visit Charleston Farmhouse, country home of Vanessa Bell and Duncan Grant', 'charleston.png', 1, 1),
(13, 'USA', 'Guam', 'Go parasailing!', 'guam.png', 1, 0),
(14, 'France', 'Paris', 'Visit the Musee D&#39;Orsay & Montmartre', 'paris.png', 1, 0),
(16, 'Autonomous Community of Spain', 'Canary Islands', 'Go on a live-aboard sailing trip around the islands', 'canary.png', 0, 0),
(18, 'USA', 'Alaska', 'See crazy animal carvings near Soldotna, drive down Seward Peninsula, See Denali, eat sushi on Kodiak Island', 'alaska.png', 1, 0),
(19, 'Trinidad', 'Port of Spain', 'Go to the beach, eat Bake & Shark sandwiches', 'trinidad.png', 1, 0),
(29, 'Australia', 'Sydney and Melbourne', 'All of the things', 'australia.png', 0, 0),
(30, 'USA', 'Baltimore', 'Hang out at Fells Point, sail the Chesapeake Bay, eat Blue Crabs', 'baltimore.png', 1, 0),
(31, 'Thailand', 'Phuket', 'Sail down the eastern coast, visit Ko Hong and Krabi', 'phuket.png', 1, 1),
(32, 'Fiji', 'Suva', 'Stand on the international date line', 'fiji.png', 0, 0),
(34, 'Japan', 'Tokyo', 'Eat Yakitori, go on a boat trip through Tokyo and visit Nikko Temple', 'japan.png', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `travelogue`
--
ALTER TABLE `travelogue`
  ADD PRIMARY KEY (`key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `travelogue`
--
ALTER TABLE `travelogue`
  MODIFY `key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;