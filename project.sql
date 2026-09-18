-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2026 at 05:29 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `bid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `bdate` date NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `payment_status` varchar(80) NOT NULL,
  `no_of_kids` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`bid`, `pid`, `uid`, `bdate`, `payment_mode`, `payment_status`, `no_of_kids`) VALUES
(8, 50, 23, '2027-01-10', 'Net Banking', 'Completed', 1),
(9, 26, 23, '2027-01-22', 'Net Banking', 'pending', 1),
(10, 29, 25, '2027-01-29', 'UPI', 'Completed', 2),
(11, 30, 25, '2026-12-17', 'Net Banking', 'Processing', 0),
(12, 27, 23, '2027-01-28', 'Net Banking', 'pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_destination`
--

CREATE TABLE `tbl_destination` (
  `did` int(11) NOT NULL,
  `dname` varchar(80) NOT NULL,
  `dpic` text NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_destination`
--

INSERT INTO `tbl_destination` (`did`, `dname`, `dpic`, `type`) VALUES
(34, 'KASHMIR', 'uploads/kashmir.jpg', 'Domestic'),
(35, 'US', 'uploads/us (2).avif', 'International'),
(36, 'HAWAII', 'uploads/hawaii.avif', 'International'),
(37, 'DUBAI', 'uploads/dubai.avif', 'International'),
(38, 'LEH-LADAKH', 'uploads/leh.jpg', 'Domestic'),
(40, 'THAILAND', 'uploads/thailand.jpg', 'International'),
(41, 'MALDIVES', 'uploads/maldives.avif', 'International'),
(42, 'VIETNAM', 'uploads/vietnam.jpg', 'International'),
(43, 'JAIPUR', 'uploads/jaipur.webp', 'Domestic'),
(45, 'CHINA', 'uploads/china.jpg', 'International'),
(46, 'UDAIPUR', 'uploads/udaipur.jpg', 'Domestic'),
(47, 'GOA', 'uploads/goa.jpg', 'Domestic'),
(48, 'KERALA', 'uploads/kerala.avif', 'Domestic'),
(49, 'VARANASI', 'uploads/varanasi.jpg', 'Domestic'),
(50, 'DARJEELING', 'uploads/darjeeling.webp', 'Domestic'),
(51, 'ANDAMAN & NICOBAR ISLANDS', 'uploads/andaman.jpg', 'Domestic'),
(52, 'SWITZERLAND', 'uploads/switzerland.jpg', 'International'),
(53, 'SINGAPORE', 'uploads/singapore.jpg', 'International'),
(54, 'JAPAN', 'uploads/japan.webp', 'International'),
(55, 'BALI', 'uploads/bali.png', 'International'),
(56, 'FRANCE', 'uploads/france.jpg', 'International'),
(57, 'PARI', 'uploads/singapore_p2.jpg', 'International');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `image`) VALUES
(2, 'uploads/jaipur.webp'),
(4, 'uploads/vietnam.jpg'),
(5, 'uploads/maldives.avif'),
(7, 'uploads/thailand.jpg'),
(8, 'uploads/bali.webp'),
(9, 'uploads/leh.jpg'),
(11, 'uploads/goa.avif'),
(13, 'uploads/dubai.avif'),
(15, 'uploads/us (2).avif'),
(17, 'uploads/udaipur.jpg'),
(18, 'uploads/china.jpg'),
(20, 'uploads/chinapack.webp'),
(63, 'uploads/andaman_p1.jpg'),
(64, 'uploads/andaman_p2.jpg'),
(65, 'uploads/bali_p1.avif'),
(66, 'uploads/bali_p2.avif'),
(67, 'uploads/china_p1.avif'),
(68, 'uploads/china_p2.avif'),
(69, 'uploads/darjeeling_p1.jpg'),
(70, 'uploads/darjeeling_p2.jpg'),
(71, 'uploads/dubai_p1.avif'),
(72, 'uploads/dubai_p2.avif'),
(73, 'uploads/france_p1.jpg'),
(74, 'uploads/france_p2.webp'),
(75, 'uploads/goa_p1.jpg'),
(76, 'uploads/goa_p2.avif'),
(77, 'uploads/hawai_p1.jpg'),
(78, 'uploads/hawai_p2.jpg'),
(79, 'uploads/jaipur_p1.jpg'),
(80, 'uploads/jaipur_p2.avif'),
(81, 'uploads/japan_p1.jpeg'),
(82, 'uploads/japan_p2.jpeg'),
(83, 'uploads/kashmir_p1.jpg'),
(84, 'uploads/kashmir_p2.webp'),
(85, 'uploads/kerala_p1.avif'),
(86, 'uploads/kerala_p2.webp'),
(87, 'uploads/leh_p1.webp'),
(88, 'uploads/leh_p2.jpg'),
(89, 'uploads/maldives_p1.jpg'),
(90, 'uploads/maldives_p2.jpg'),
(91, 'uploads/singapore_p1.jpg'),
(92, 'uploads/singapore_p2.jpg'),
(93, 'uploads/switzerland_p1.jpg'),
(94, 'uploads/switzerland_p2.jpg'),
(95, 'uploads/thailand_p1.jpg'),
(96, 'uploads/thailand_p2.jpg'),
(97, 'uploads/udaipur_p1.avif'),
(98, 'uploads/udaipur_p2.jpg'),
(99, 'uploads/us_p1.jpg'),
(100, 'uploads/us_p2.jpg'),
(101, 'uploads/varanasi_p1.webp'),
(102, 'uploads/varanasi_p2.webp'),
(103, 'uploads/vietnam_p1.jpg'),
(104, 'uploads/vietnam_p2.jpg'),
(105, 'uploads/gallery1.png'),
(106, 'uploads/gallery2.png'),
(107, 'uploads/gallery3.png'),
(108, 'uploads/gallery4.png'),
(109, 'uploads/gallery5.png'),
(110, 'uploads/gallery6.png'),
(111, 'uploads/gallery7.png'),
(112, 'uploads/gallery8.png'),
(113, 'uploads/gallery9.png'),
(114, 'uploads/gallery10.png'),
(115, 'uploads/gallery11.png'),
(116, 'uploads/gallery12.png'),
(117, 'uploads/gallery13.png'),
(118, 'uploads/gallery14.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `pid` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `did` int(11) NOT NULL,
  `pic` text NOT NULL,
  `type` varchar(80) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` text NOT NULL,
  `no_of_people` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`pid`, `pname`, `did`, `pic`, `type`, `price`, `description`, `no_of_people`, `date`, `time`) VALUES
(26, 'KASHMIR: PARADISE ON EARTH', 34, 'uploads/kashmir_p1.jpg', 'Domestic', 24999, 'Experience the magic of the Kashmir Valley across 5 Days and 4 Nights. Includes private transfers, stays in Srinagar and Pahalgam, a night in a luxury Dal Lake houseboat, a Gondola ride in Gulmarg, and a Shikara cruise at sunset.', 2, '2027-01-22', '09:00'),
(27, 'KASHMIR: WINTER & SNOW ADVENTURE', 34, 'uploads/kashmir_p2.webp', 'Domestic', 38500, 'A premium 6 Days and 5 Nights winter itinerary exploring Srinagar, Gulmarg, Pahalgam, and Sonmarg. Features skiing equipment rental, private heaters, 4-star boutique hotel stays, and full-day sightseeing of snow-clad mountain passes.', 2, '2027-01-28', '10:30'),
(28, 'LEH-LADAKH: LAND OF HIGH PASSES', 38, 'uploads/leh_p1.webp', 'Domestic', 28999, 'Explore the high-altitude desert over 6 Days and 5 Nights. Includes Leh acclimatization, Khardung La Pass crossing, camping at Nubra Valley, a double-humped camel ride, and a visit to Pangong Tso Lake. Inner Line Permits included.', 2, '2026-11-15', '07:00'),
(29, 'LEH-LADAKH: BIKERS ODYSSEY', 38, 'uploads/leh_p2.jpg', 'Domestic', 42000, 'An 8 Days and 7 Nights self-ride adventure covering Leh, Sham Valley, Nubra, Turtuk village, and Pangong Lake. Includes 500cc Royal Enfield rental, fuel, backup vehicle, mechanic assistance, oxygen cylinders, and camp stays.', 1, '2027-01-29', '20:00'),
(30, 'JAIPUR: THE PINK CITY', 43, 'uploads/jaipur_p1.jpg', 'Domestic', 12499, 'A 3 Days and 2 Nights immersion into Rajput grand history. Includes guided visits to Amber Fort, Hawa Mahal, City Palace, and Jantar Mantar, paired with a traditional Rajasthani dinner at Chokhi Dhani and heritage hotel stays.', 2, '2026-12-17', '05:00'),
(31, 'JAIPUR: MAHARAJAH LUXURY EXPERIENCE', 43, 'uploads/jaipur_p2.avif', 'Domestic', 26500, 'Indulge in royal luxury across 4 Days and 3 Nights. Includes accommodation in a 5-star heritage palace, private AC cab with an English-speaking guide, elephant rides at Amer Fort, private block-printing workshops, and fine dining.', 2, '2026-12-30', '02:30'),
(32, 'UDAIPUR: CITY OF LAKES', 46, 'uploads/udaipur_p1.avif', 'Domestic', 16999, 'Discover romance across 4 Days and 3 Nights in Rajasthan\'s lake city. Includes Lake Pichola boat cruises, Jag Mandir visits, Sajjangarh Monsoon Palace sunset viewings, City Palace tours, and lakeside hotel accommodations.', 2, '2027-01-10', '10:00'),
(33, 'UDAIPUR: HERITAGE & CULTURE CIRCUIT', 46, 'uploads/udaipur_p2.jpg', 'Domestic', 22999, 'A 5 Days and 4 Nights comprehensive tour covering Udaipur, Chittorgarh Fort, and Ranakpur Jain Temples. Features traditional cultural performances at Bagore Ki Haveli, heritage hotel stays, and private transfers.', 2, '2027-01-01', '07:30'),
(34, 'GOA: SUN, SAND & NIGHTLIFE', 47, 'uploads/goa_p1.jpg', 'Domestic', 14500, 'Relax over 4 Days and 3 Nights across North Goa famous beaches. Package covers Baga, Calangute, and Anjuna beach visits, water sports activities (parasailing and jet-skiing), entry passes to top nightlife hubs, and 3-star resort stays.', 2, '2027-01-01', '00:00'),
(35, 'GOA: PEARL OF THE ORIENT', 47, 'uploads/goa_p2.avif', 'Domestic', 24999, 'Escape to tranquility for 5 Days and 4 Nights in South Goa. Includes luxury beachfront resort stays, Dudhsagar Waterfalls jeep safari, spice plantation tours with buffet lunch, Portuguese heritage walks in Old Goa, and a private luxury catamaran cruise.', 2, '2027-01-10', '11:00'),
(36, 'KERALA: GODS OWN COUNTRY', 48, 'uploads/kerala_p1.avif', 'Domestic', 21999, 'Explore 5 Days and 4 Nights covering Munnar tea gardens, spice plantations in Thekkady, and a 24-hour private houseboat stay with all meals through the tranquil Alleppey backwaters.', 2, '2026-12-01', '08:00'),
(37, 'KERALA: WELLNESS & COASTAL RETREAT', 48, 'uploads/kerala_p2.webp', 'Domestic', 36000, 'Rejuvenate across 7 Days and 6 Nights covering Cochin, Munnar, Thekkady, Alleppey, and Varkala Cliff Beach. Includes daily authentic Ayurvedic massages, tea tasting, bamboo rafting, and 4-star resort stays.', 2, '2026-12-01', '23:30'),
(38, 'DARJEELING: QUEEN OF THE HILLS', 50, 'uploads/darjeeling_p1.jpg', 'Domestic', 15999, 'Experience classic hill station charm across 4 Days and 3 Nights. Includes an early morning Tiger Hill sunrise view over Mt. Kanchenjunga, Toy Train heritage rides, visits to Happy Valley Tea Estate, and Peace Pagoda.', 2, '2027-02-07', '10:30'),
(39, 'DARJEELING: GRAND EASTERN CIRCUIT', 50, 'uploads/darjeeling_p2.jpg', 'Domestic', 27500, 'Combine Darjeeling and Gangtok over 6 Days and 5 Nights. Covers Tiger Hill sunrise, Batasia Loop, Tsomgo Lake, Baba Mandir, tea tasting tours, cable car rides, and private mountain transfers.', 2, '2027-02-14', '23:00'),
(40, 'ANDAMAN: EMERALD ISLANDS', 51, 'uploads/andaman_p1.jpg', 'Domestic', 29999, 'Escape for 5 Days and 4 Nights to Port Blair and Havelock Island. Includes visits to Radhanagar Beach, Cellular Jail light show, Makruzz luxury ferry transfers, and introductory scuba diving or snorkeling.', 2, '2027-01-25', '02:40'),
(41, 'ANDAMAN : LUXURY HONEYMOON ESCAPE', 51, 'uploads/andaman_p2.jpg', 'Domestic', 48500, 'A premium 7 Days and 6 Nights journey across Port Blair, Havelock Island, and Neil Island. Includes beachfront resort stays, underwater sea-walks, private romantic candlelight dinners on the beach, and speed boat cruises.', 2, '2026-11-28', '20:41'),
(42, 'VARANASI: THE SPIRITUAL CAPITAL', 49, 'uploads/varanasi_p1.webp', 'Domestic', 13500, 'Immerse yourself in India\'s spiritual heart over 3 Days and 2 Nights. Includes an early morning sunrise boat ride on the Ganges, VIP darshan at the Kashi Vishwanath Temple, witnessing the grand evening Ganga Aarti at Dashashwamedh Ghat, and a guided walking tour through the ancient city alleys.', 2, '2027-02-01', '12:00'),
(43, 'VARANASI: MYSTICISM & HERITAGE CIRCUIT', 49, 'uploads/varanasi_p2.webp', 'Domestic', 18999, 'Discover ancient history and culture across 4 Days and 3 Nights. This package covers a day trip to the Buddhist stupas at Sarnath, a visit to Ramnagar Fort, a Banarasi silk weaving village tour, exclusive evening boat cruises, and premium boutique hotel accommodations near the ghats.', 2, '2027-01-03', '05:00'),
(44, 'US: NEW YORK & WASHINGTON DC EXPRESS', 35, 'uploads/us_p1.jpg', 'International', 185000, 'Explore the East Coast over 6 Days and 5 Nights. Covers New York City and Washington DC, featuring Statue of Liberty cruises, Times Square tours, Central Park, Empire State Building deck access, and visits to the Capitol Hill and Smithsonian museums.', 4, '2026-12-06', '22:00'),
(45, 'US: LOS ANGELES & LAS VEGAS HIGHLIGHTS', 35, 'uploads/us_p2.jpg', 'International', 245000, 'Experience the American West across 7 Days and 6 Nights. Includes Hollywood Universal Studios, Santa Monica Pier, the high-energy Las Vegas Strip, private limousine tours, and a Grand Canyon West Rim day trip.', 6, '2027-01-23', '16:00'),
(46, 'HAWAII: OAHU & HONOLULU ISLAND ESCAPE', 36, 'uploads/hawai_p1.jpg', 'International', 210000, 'Enjoy tropical bliss across 5 Days and 4 Nights in Honolulu. Includes Waikiki Beach stays, Pearl Harbor historic tours, Diamond Head crater hikes, and an authentic Polynesian Luau dinner with traditional performances.', 4, '2027-01-10', '04:00'),
(47, 'HAWAII: MAUI & HONOLULU TROPICAL EXPLORER', 36, 'uploads/hawai_p2.jpg', 'International', 320000, 'An extensive 8 Days and 7 Nights dual-island itinerary covering Oahu and Maui. Features the scenic Road to Hana drive, Haleakala National Park sunrise tours, snorchel cruises to Molokini Crater, and luxury beachfront resort stays.', 4, '2027-02-06', '22:00'),
(49, 'DUBAI: CITY & DESERT SAFARI HIGHLIGHTS', 37, 'uploads/dubai_p1-.jpg', 'International', 150000, 'Discover modern luxury over 5 Days and 4 Nights in Dubai. Includes entry to the 124th floor of Burj Khalifa, Dubai Mall sightseeing, a 4x4 Desert Safari with dune bashing and BBQ dinner, and a Marina Dhow Cruise.', 3, '2027-01-01', '10:00'),
(50, 'DUBAI: ABU DHABI & ATLANTIS GRAND TOUR', 37, 'uploads/dubai_p2.avif', 'International', 145000, 'A premium 6 Days and 5 Nights itinerary covering Dubai and Abu Dhabi. Features stays at Atlantis The Palm, entry to Aquaventure Waterpark, Museum of the Future tickets, Sheikh Zayed Grand Mosque tour, and Ferrari World entry.', 4, '2027-01-10', '00:00'),
(51, 'THAILAND: BANGKOK & PATTAYA GATEWAY', 40, 'uploads/thailand_p1.jpg', 'International', 90000, 'Experience culture and coastlines over 5 Days and 4 Nights. Covers Pattaya\'s Coral Island speed boat tours and Alcazar Cabaret Show, paired with Bangkok\'s Grand Palace and famous Buddhist Temple tours.', 3, '2027-01-01', '15:00'),
(52, 'THAILAND: PHUKET & KRABI ISLAND HOPPING', 40, 'uploads/thailand_p2.jpg', 'International', 94999, 'Relax for 6 Days and 5 Nights across Southern Thailand\'s top islands. Includes speed boat tours to Phi Phi Islands, Maya Bay, and James Bond Island, sea kayaking in Krabi, and luxury beach resort stays.', 2, '2027-01-15', '10:00'),
(53, 'MALDIVES: MALE ATOLL BEACH RESORT ESCAPE', 41, 'uploads/maldives_p1.jpg', 'International', 85000, 'Unwind over 4 Days and 3 Nights at a premium island beach villa. Includes speedboat transfers from Male Airport, all-inclusive meal packages, access to water sports equipment, and sunset dolphin cruises.', 2, '2027-03-21', '16:19'),
(54, 'MALDIVES: LUXURY WATER VILLA RETREAT', 41, 'uploads/maldives_p2.jpg', 'International', 145000, 'The ultimate romantic 5 Days and 4 Nights stay in an iconic overwater ocean villa with a private plunge pool. Features seaplane transfers, candlelight beach dinners, spa sessions, and guided house-reef snorkeling.', 4, '2026-12-01', '14:20'),
(55, 'VIETNAM: HANOI & HA LONG BAY CRUISE', 42, 'uploads/vietnam_p1.jpg', 'International', 114999, 'Explore Northern Vietnam over 5 Days and 4 Nights. Includes Hanoi Old Quarter walking tours, street food tasting, and an overnight luxury cruise through Ha Long Bay with limestone cave kayaking and bamboo boat tours.', 2, '2027-01-30', '01:30'),
(56, 'VIETNAM: DA NANG & HO CHI MINH CITY EXPLORER', 42, 'uploads/vietnam_p2.jpg', 'International', 120000, 'A 7 Days and 6 Nights journey spanning Central and Southern Vietnam. Features the Golden Bridge at Ba Na Hills in Da Nang, ancient Hoi An town walks, Ho Chi Minh City historic sites, and Mekong Delta boat trips.', 3, '2027-01-01', '15:00'),
(57, 'CHINA: BEIJING & SHANGHAI GOLDEN EXPRESS', 45, 'uploads/china_p1.avif', 'International', 115000, 'Tour iconic capitals across 6 Days and 5 Nights. Includes Beijing\'s Great Wall of China, Forbidden City, and Tiananmen Square, combined with Shanghai\'s high-speed bullet train transfer, The Bund, and Yu Garden.', 4, '2027-04-01', '00:00'),
(58, 'CHINA: BEIJING, XI\'AN & SHANGHAI DYNASTY TOUR', 45, 'uploads/china_p2.avif', 'International', 165000, 'Delve into deep history across 8 Days and 7 Nights. Features Beijing sights, the Terracotta Warriors in Xi\'an, Shanghai city tours, acrobatic show tickets, and internal flights.', 2, '2027-01-01', '14:30'),
(59, 'SWITZERLAND: ZURICH & LUCERNE ALPINE EXPRESS', 52, 'uploads/switzerland_p1.jpg', 'International', 175000, 'A classic 5 Days and 4 Nights Swiss holiday. Includes scenic train transfers, Zurich city walks, Lake Lucerne boat cruises, and an excursion to Mount Titlis via the world\'s first revolving cable car.', 1, '2027-05-01', '09:30'),
(60, 'SWITZERLAND: INTERLAKEN & ZERMATT GRAND ALPINE', 52, 'uploads/switzerland_p2.jpg', 'International', 255000, 'Experience alpine magic across 7 Days and 6 Nights. Features Jungfraujoch (Top of Europe) cogwheel train trips, views of the iconic Matterhorn in Zermatt, scenic Swiss Travel Pass access, and mountain chalet stays.', 2, '2027-03-14', '21:00'),
(61, 'SINGAPORE: MARINA BAY & SENTOSA HIGHLIGHTS', 53, 'uploads/singapore_p1.jpg', 'International', 155000, 'Discover the Lion City over 4 Days and 3 Nights. Includes Gardens by the Bay, Supertree Grove, Marina Bay Sands SkyPark entry, Sentosa Island cable car rides, and S.E.A. Aquarium access', 2, '2027-01-02', '22:00'),
(62, 'SINGAPORE: UNIVERSAL STUDIOS & NIGHT SAFARI EXPERIENCE', 53, 'uploads/singapore_p2.jpg', 'International', 178000, 'A family-favorite 5 Days and 4 Nights itinerary. Features full-day tickets to Universal Studios Singapore, Mandai Night Safari tram rides, Jewel Changi Rain Vortex access, and city sightseeing.(Entry prices and Tickets inclusive in package)', 2, '2027-02-07', '01:00'),
(63, 'JAPAN: TOKYO & KYOTO GOLDEN ROUTE', 54, 'uploads/japan_p1.jpeg', 'International', 165000, 'Discover contrasts over 6 Days and 5 Nights. Includes Tokyo\'s Shibuya Crossing and Senso-ji Temple, Shinkansen bullet train transfers to Kyoto, Fushimi Inari Shrine, and Arashiyama Bamboo Grove.', 2, '2027-06-01', '23:42'),
(64, 'JAPAN: TOKYO, MOUNT FUJI & OSAKA HIGHLIGHTS', 54, 'uploads/japan_p2.jpeg', 'International', 224999, 'Explore key highlights across 8 Days and 7 Nights. Features Tokyo sightseeing, Lake Ashi cruise near Mt. Fuji, Osaka Castle, Dotonbori street food tours, and a day trip to Nara Deer Park.', 2, '2027-01-03', '07:00'),
(65, 'BALI: UBUD & KUTA ISLAND ESCAPE', 55, 'uploads/bali_p1.avif', 'International', 79999, 'Experience Bali\'s culture and beaches over 5 Days and 4 Nights. Includes Tegallalang Rice Terraces, Bali Swing, Monkey Forest in Ubud, Tanah Lot Temple sunset views, and Kuta beach resort stays.', 1, '2027-02-01', '05:30'),
(66, 'BALI: SEMINYAK & NUSA PENIDA ISLAND TOUR', 55, 'uploads/bali_p2.avif', 'International', 62000, 'A premium 6 Days and 5 Nights package. Features private villa stays with a private pool in Seminyak, day trips by speedboat to Nusa Penida (Kelingking Beach & Broken Beach), and Uluwatu Kecak Dance tickets.', 2, '2027-01-01', '11:00'),
(67, 'FRANCE: PARIS CITY OF LIGHTS EXPRESS', 56, 'uploads/france_p1.jpg', 'International', 145000, 'Experience romance and culture over 4 Days and 3 Nights in Paris. Includes priority Eiffel Tower summit access, a Louvre Museum guided tour, Seine River dinner cruises, and walks along the Champs-Élysées.', 2, '2027-01-01', '11:50'),
(68, 'FRANCE: PARIS, LYON & FRENCH RIVIERA', 56, 'uploads/france_p2.webp', 'International', 235000, 'A grand 7 Days and 6 Nights journey through France. Features Paris landmarks, TGV high-speed train ride to Lyon for culinary tours, and coastal stays in Nice and Cannes along the French Riviera.', 2, '2027-02-05', '15:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobileno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `password`, `email`, `mobileno`) VALUES
(23, 'aryan', '123', 'aryansingh30706@gmail.com', '7412589632'),
(24, 'Dhruv123', '123', 'dhruv@gmail.com', '7412589632'),
(25, 'bhavya', '123', 'b@gmail.com', '1478512589');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `tbl_destination`
--
ALTER TABLE `tbl_destination`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_destination`
--
ALTER TABLE `tbl_destination`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
