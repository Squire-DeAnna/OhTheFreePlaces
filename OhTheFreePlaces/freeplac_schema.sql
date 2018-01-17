-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2018 at 09:43 AM
-- Server version: 5.6.32-78.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `freeplac_schema`
--

-- --------------------------------------------------------

--
-- Table structure for table `attraction`
--

CREATE TABLE IF NOT EXISTS `attraction` (
  `attractionID` int(11) NOT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `attractionName` varchar(200) DEFAULT NULL,
  `cost` varchar(45) DEFAULT NULL,
  `hours` varchar(200) DEFAULT NULL,
  `streetAddress` varchar(100) DEFAULT NULL,
  `cityID` int(11) DEFAULT NULL,
  `stateID` int(11) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attraction`
--

INSERT INTO `attraction` (`attractionID`, `categoryID`, `attractionName`, `cost`, `hours`, `streetAddress`, `cityID`, `stateID`, `phone`, `website`, `description`) VALUES
(1, 1, 'National Museum of the American Indian', 'FREE', 'Monday - Wednesday 10:00am - 5:00pm, Thursday 10:00am - 8:00pm, Friday - Sunday 10:00am - 5:00pm', 'Alexander Hamilton U.S. Custom HouseOne Bowling Green', 2, 33, '212-514-3700', 'http://nmai.si.edu/visit/newyork/', ''),
(2, 1, 'Museum of Jewish Heritage', 'FREE', 'Wednesday 4:00pm - 8:00pm, Thursdays 4:00pm - 8:00pm', '36 Battery Place', 2, 33, '646-437-4202', 'http://mjhnyc.org/', ''),
(3, 1, 'South Street Seaport Museum', 'FREE', 'June through September Every Other Friday 3:00pm - 7:00pm', '12 Fulton Street', 2, 33, '212-748-8600', 'www.southstreetseaportmuseum.org', ''),
(4, 1, 'Museum at Eldridge Street', 'PAY-WHAT-YOU-WISH', 'Monday 10:00am - 5:00pm', '12 Eldridge Street', 2, 33, '212-219-0302', 'www.eldridgestreet.org', ''),
(5, 1, 'Museum Of Chinese In America', 'FREE', 'First Friday of Each Month 11:00am - 9:00pm', '215 Centre St', 2, 33, '855-955-MOCA', 'http://www.mocanyc.org/', ''),
(6, 1, 'The Drawing Center', 'FREE', 'Thursday 6:00pm - 8:00pm', '35 Wooster St', 2, 33, '212-219-2166', 'http://www.drawingcenter.org/', ''),
(7, 1, 'Children''s Museum of the Arts', 'PAY-WHAT-YOU-WISH', 'Thursday 4:00pm - 6:00pm', '103 Charlton St', 2, 33, '212-274-0986', 'http://cmany.org/', ''),
(8, 1, 'The Museum of Modern Art', 'FREE', 'Friday 4:00pm - 8:00pm', '11 W 53rd St', 2, 33, '212-708-9400', 'https://www.moma.org/', ''),
(9, 1, 'American Folk Art Museum', 'FREE', 'Tuesday 11:30 am - 7:00 pm, Wednesday 11:30 am - 7:00 pm, Thursday 11:30 am - 7:00 pm, Friday 12:00pm - 7:30pm, Saturday 11:30am - 7:00pm, Sunday 12:00pm - 6:00pm', '2 Lincoln Square', 2, 33, '212-769-5100', 'https://www.amnh.org/', ''),
(10, 1, 'Museum of the City of New York', 'PAY-WHAT-YOU-WISH', 'Monday - Sunday 10:00am - 6:00pm', '1220 5th Ave & 103rd St', 2, 33, '212-534-1672', 'http://www.mcny.org/', ''),
(11, 1, 'The Jewish Museum', 'FREE', 'Saturday 11:00am - 5:45pm (Pay-as-you-wish Thursdays 5:00pm – 8:00pm)', '1109 5th Ave & 92nd St', 2, 33, '212-423-3200', 'http://thejewishmuseum.org/', ''),
(12, 1, 'Cooper Hewitt Smithsonian Design Museum', 'PAY-WHAT-YOU-WISH', 'Saturday 6:00pm - 9:00pm', '2 E 91st St', 2, 33, '212-849-2950', 'https://www.cooperhewitt.org/', ''),
(13, 1, 'The Metropolitan Museum of Art', 'PAY-WHAT-YOU-WISH', 'Sunday–Thursday 10:00am – 5:30pm, Friday and Saturday 10:00am – 9:00pm', '1000 5th Ave', 2, 33, '212-535-7710', 'http://www.metmuseum.org/visit/met-fifth-avenue', ''),
(14, 1, 'The Met Breuer', 'PAY-WHAT-YOU-WISH', 'Tuesday–Thursday: 10 am–5:30 pm, Friday and Saturday: 10 am–9 pm, Sunday: 10 am–5:30 pm', '945 Madison Ave', 2, 33, '212-731-1675', 'http://www.metmuseum.org/visit/met-breuer', ''),
(15, 1, 'Asia Society and Museum', 'FREE', 'August to July, Friday 6:00pm - 9:00pm', '725 Park Ave', 2, 33, '212-288-6400', 'http://asiasociety.org/new-york', ''),
(16, 1, 'The Paley Center For Media', 'FREE', 'Wednesday 12:00pm - 6:00pm, Thursday 12:00pm - 8:00pm, Friday - Sunday 12:00pm - 6:00pm', '25 West 52 Street', 2, 33, '212-621-6800', 'https://media.paleycenter.org/', ''),
(17, 1, 'New-York Historical Society', 'PAY-WHAT-YOU-WISH', 'Friday 6:00pm - 8:00pm', '170 Central Park West', 2, 33, '212-873-3400', 'http://www.nyhistory.org/', ''),
(18, 2, 'Central Park', 'FREE', 'Daily 6:00am - 1:00am', 'Central Park', 2, 33, '212-310-6600', 'http://www.centralparknyc.org/', ''),
(19, 3, 'Bowne Printers', 'FREE', 'Daily 11:00am - 7:00pm', '211 Water St', 2, 33, '646-315-4478', 'https://southstreetseaportmuseum.org/water-street/bowne-co-stationers', ''),
(20, 3, 'Trinity Church', 'FREE', 'Daily 7:00am - 6:00pm, Guided Tours Available Monday - Friday at 2pm and Sunday after the 11:15am service', '75 Broadway', 2, 33, '212-602-0800', 'https://www.trinitywallstreet.org/', 'Self led tour of church and grounds available on their app. https://www.trinitywallstreet.org/apps'),
(21, 3, 'Battery Park', 'FREE', 'Daily 7:45am - 5:00pm', 'State Street and Battery Place', 2, 33, '212-344-3491', 'http://www.thebattery.org/', ''),
(22, 3, 'St. Paul''s Chapel of Trinity Church Wall Street', 'FREE', 'Daily 10:00am - 6:00pm', '209 Broadway', 2, 33, '212-602-0800', 'https://www.trinitywallstreet.org/about/stpaulschapel', ''),
(23, 3, 'Berlin Wall', 'FREE', 'Daily 24 hours', '393 South End Ave', 2, 33, '', '', 'Pieces of the Berlin Wall stand as a monument to the event.'),
(24, 1, 'Federal Reserve Bank of Chicago Money Museum', 'FREE', 'Monday - Friday 8:30am - 5:00pm', '230 S LaSalle St', 3, 14, '312-322-2400', 'https://www.chicagofed.org/education/money-museum/index', 'Individuals 18+ must show a valid, government-issued photo ID'),
(25, 1, 'Museum Of Contemporary Art Chicago', 'PAY-WHAT-YOU-WISH', 'Tuesday 10:00am - 9:00pmWednesday - Thursday 10:00am - 5:00pmFriday 10:00am - 9:00pmSaturday - Sunday 10:00am - 5:00pm', '220 E Chicago Ave', 3, 14, '312-280-2660', 'https://mcachicago.org/Home', ''),
(26, 1, 'Chicago Children''s Museum', 'FREE', 'Thursday 5:00pm - 8:00pm', '700 E Grand Ave', 3, 14, '312-527-1000', 'http://www.chicagochildrensmuseum.org/', ''),
(27, 1, 'National Museum of Mexican Art', 'FREE', 'Tuesday - Sunday 10:00am - 5:00PM', '1852 W 19th St', 3, 14, '312-738-1503', 'http://nationalmuseumofmexicanart.org/', ''),
(28, 1, 'Smart Museum of Art, The University of Chicago', 'FREE', 'Tuesday - Wednesday 10:00am - 5:00pm Thursday 10:00am - 8:00pmFriday - Sunday 10:00am - 5:00pm', '5550 S Greenwood Ave', 3, 14, '773-702-0200', 'http://smartmuseum.uchicago.edu/', ''),
(29, 1, 'Hyde Park Art Center', 'FREE', 'Monday - Thursday 9:00am 8:00pm Friday & Saturday 9:00am - 5:00pm Sunday 12:00pm - 5:00pm', '5020 S Cornell Ave', 3, 14, '773-324-5520', 'http://www.hydeparkart.org/', ''),
(30, 1, 'National Museum of Puerto Rican Arts & Culture', 'FREE', 'Tuesday - Friday 10:00am - 4:00pmSaturday 10:00am - 1:00pm', '3015 W Division St', 3, 14, '773-486-8345', 'http://nmprac.org/', ''),
(31, 1, 'Oriental Institute Museum', 'FREE', 'Tuesday 10:00am - 5:00pm Wednesday 10:00am - 8:00pm Thursday - Sunday 10:00am - 5:00pm', '1155 E 58th St', 3, 14, '773-702-9520', 'https://oi.uchicago.edu/', ''),
(32, 1, 'DuSable Museum of African-American History', 'FREE', 'Tuesday 10:00am – 5:00pm', '740 E 56th Pl', 3, 14, '1-877-387-22', 'http://www.dusablemuseum.org/', ''),
(33, 1, 'Renaissance Society', 'FREE', 'Tuesday - Friday 10:00am - 5:00pm Saturday - Sunday 12:00pm - 5:00pmClosed Mondays and between exhibitions', '5811 S Ellis Ave', 3, 14, '773-702-8670', 'http://www.renaissancesociety.org', ''),
(34, 3, 'Navy Pier ', 'FREE', 'Hours: 2017 September 5 – October 31 Sunday – Thursday 10 am – 8 pm Friday and Saturday 10 am – 10 pm November 1 – December 31 Monday – Thursday 10 am – 8 pm Friday and Saturday 10am – 10 pm Sunday 10', '840 E Grand Ave', 3, 14, '1-800-595-74', 'https://navypier.com/', 'theaters, events and shops may have their own costs Free Fireworks Twice weekly from Memorial Day - Labor Day '),
(35, 3, 'Clarke House Museum', 'FREE', 'Wednesday & Friday-Saturday at 1:00pm & 3:00pm, April 1st 2017, Wednesday, Friday, & Saturday at 1:00pm & 2:30', '1827 S Indiana Ave', 3, 14, '', 'https://www.cityofchicago.org/city/en/depts/dca/supp_info/clarke_house_museum.html', 'Tours can accommodate 15 people on a first come first serve basis. To guarantee a tour for groups of 5 or more, please contact clarkehousemuseum@cityofchicago.org'),
(36, 3, 'Chicago Cultural Center', 'FREE', 'Monday - Friday 10:00am - 7:00pmSaturday - Sunday 10:00am - 5:00pm', '78 E Washington St', 3, 14, '312-744-3316', 'https://www.cityofchicago.org/city/en/depts/dca/supp_info/chicago_culturalcenter.html', 'Public tours 1:15pm on Wednesday, Thursday, Friday and Saturday (year-round), departing from the Randolph Street Lobby. Up to 20 guests in each tour. All self-guided group tours must check in with security upon arrival.'),
(37, 3, 'Harold Washington Library Center, Chicago Public Library', 'FREE', 'Monday - Thursday 9:00am - 9:00pm Friday - Saturday 9:00am - 5:00pm Sunday 1:00pm - 5:00pm', '400 S State St', 3, 14, '312-747-4300', 'https://www.chipublib.org/locations/34/', ''),
(38, 2, 'Lincoln Park Zoo', 'FREE', '', '2001 N Clark St', 3, 14, '312-742-2000', 'http://www.lpzoo.org/', ''),
(39, 2, 'Garfield Park Conservatory', 'FREE', 'Monday - Tuesday 9:00am - 5:00pm Wednesday 9:00am - 8:00pm, Thursday - Sunday 9:00am - 5:00pm', '300 N Central Park Ave', 3, 14, '312-746-5100', 'https://garfieldconservatory.org/', ''),
(40, 2, 'Millennium Park', 'FREE', 'Daily, Welcome Center open Daily 9:00am - 7:00pm through Sept. 30. Daily hours after Sept. 30: 10:00am - 4:00pm.', '201 E. Randolph St.', 3, 14, '312-742-2963', 'https://www.cityofchicago.org/city/en/depts/dca/supp_info/millennium_park.html', 'Free summer movies'),
(41, 2, 'Lincoln Park Conservatory', 'FREE', 'Greenhouse open 9:00 AM-5:00 PM', '2391 N Stockton Dr', 3, 14, '312-742-7736', 'http://www.chicagoparkdistrict.com/parks/lincoln-park-conservatory/', ''),
(42, 2, 'Maggie Daley Park', 'FREE', 'Daily 9:00am - 5:00pm', '337 E Randolph St', 3, 14, '312-552-3000', 'http://maggiedaleypark.com/', ''),
(43, 1, 'California Science Center', 'FREE', 'Daily 10:00am - 5:00pm', '700 Exposition Park Dr', 1, 5, '323-724-3623', 'https://californiasciencecenter.org/', ''),
(44, 1, 'California African American Museum', 'FREE', 'Tuesday - Saturday 10:00am - 5:00pm Sunday 11:00am - 5:00pm', '600 State Dr', 1, 5, '213-744-2084', 'https://caamuseum.org/', ''),
(45, 1, 'Natural History Museum of Los Angeles County', 'FREE', 'Every 1st Tuesday August-July as well as every Tuesday in September9:30am - 5:00pm', '900 W Exposition Blvd', 1, 5, '213-763-3466', 'https://nhm.org/site/', ''),
(46, 1, 'USC Fisher Museum of Art', 'FREE', 'Varied, see website for more details https://fisher.usc.edu/visit/ Closed on university holidays and during summer months', '823 W Exposition Blvd', 1, 5, '213-740-4561', 'https://fisher.usc.edu/', 'Parking for the day is 12 dollars.'),
(47, 1, 'The Museum of Contemporary Art Los Angeles, MOCA Grand Avenue', 'FREE', 'Thursday 5:00pm - 8:00pm', '250 S Grand Ave', 1, 5, '213-626-6222', 'https://www.moca.org/', ''),
(48, 1, 'The Geffen Contemporary at MOCA', 'FREE', 'Temporarily closed for installation Thursday 5:00pm - 8:00pm', '152 N Central Ave', 1, 5, '213-626-6222', 'https://www.moca.org/', ''),
(49, 1, 'MOCA Pacific Design Center', 'FREE', 'Temporarily closed for installation', '8687 Melrose Ave West Hollywood CA', 1, 5, '213-626-6222', 'https://www.moca.org/', ''),
(50, 1, 'The Broad', 'FREE', 'Tuesday - Wednesday 11:00am – 5:00pm Thursday - Friday 11:00am – 8:00pm Saturday 10:00am – 8:00pm Sunday 10:00am – 6:00pm ', '221 S Grand Ave', 1, 5, '213-232-6200', 'https://www.thebroad.org/', ''),
(51, 1, 'Japanese American National Museum', 'FREE', 'Every Thursday 5:00pm - 8:00pm Every 3rd Thursday of the month 12:00pm - 8:00pm', '100 N Central Ave', 1, 5, '213-625-0414', 'http://www.janm.org/', ''),
(52, 1, 'América Tropical Interpretive Center', 'FREE', 'Tuesday-Sunday 10:00am - 3:00pm Winter Mural viewing hours: 10:00am - 12:00pm', '125 Paseo De La Plaza', 1, 5, '213-628-1274', 'https://theamericatropical.org/', ''),
(53, 1, 'Chinese American Museum', 'PAY-WHAT-YOU-WISH', 'Tuesday – Sunday 10:00am – 3:00pm', '425 N Los Angeles St', 1, 5, '213-485-8567', 'http://camla.org/', ''),
(54, 1, 'LA Plaza De Culturas Y Artes', 'FREE', 'Monday - Thursday 12:00pm - 5:00pmFriday - Sunday 12:00pm - 6:00pm', '501 N Main St', 1, 5, '213-542-6200', 'http://www.lapca.org/', ''),
(55, 1, 'Wells Fargo History Museum', 'FREE', 'Monday - Friday 9:00am - 5:00pm Varied Saturday hours', '333 S Grand Ave', 1, 5, '213-253-7166', 'https://www.wellsfargohistory.com/museums/los-angeles/', 'Tours offered year-round to any group of 10 or more visitors. Tours last 1 to 2 hours, depending on the group’s needs.'),
(56, 1, 'Hammer Museum', 'FREE', 'Tuesday - Friday 11:00am - 8:00pm Saturday - Sunday 11:00am - 5:00pm', '10899 Wilshire Blvd', 1, 5, '310-443-7000', 'https://hammer.ucla.edu/', ''),
(57, 1, 'The Fowler Museum', 'FREE', 'Wednesday 12:00pm – 8:00pm Thursday - Sunday 12:00pm – 5:00pm', '308 Charles E Young Dr E', 1, 5, '310-825-4361', 'https://www.fowler.ucla.edu/', ''),
(58, 1, 'Rhodes Jewish Museum', 'FREE', 'April - Nov 1st 10:00am - 3:00pm Nov 1st - April contact the museum for appointments', '10850 Wilshire Blvd', 1, 5, '310-475-4779', 'http://www.rhodesjewishmuseum.org/', ''),
(59, 1, 'The Getty', 'FREE', 'Tuesday – Friday and Sunday 10:00am – 5:30pm Saturday 10:00am– 9:00pm', '1200 Getty Center Dr', 1, 5, '310-440-7300', 'http://www.getty.edu/visit/center/', ''),
(60, 1, 'Travel Town Museum', 'FREE', 'Monday - Friday 10:00am - 4:00pm Saturday - Sunday  10:00am - 5:00pm ', '5200 Zoo Dr', 1, 5, '323-662-5874', 'http://www.traveltown.org/', ''),
(61, 1, 'Autry Museum of the American West', 'FREE', '2nd Tuesday 10:00am – 4:00pm', '4700 Western Heritage Way', 1, 5, '323-667-2000', 'https://theautry.org/', ''),
(62, 1, 'Los Angeles Museum of the Holocaust', 'FREE', 'Monday - Thursday 10:00am - 5:00pm Friday 10:00am - 2:00pm Saturday - Sunday 10:00am - 5:00pm', '100 The Grove Dr', 1, 5, '323-651-3704', 'http://www.lamoth.org/', 'Self guided tours available but on Sundays, we offer docent-led public tours at 2:00 pm, followed by a Holocaust Survivor talk at 3:00 pm'),
(63, 2, 'Exposition Park Rose Garden', 'FREE', 'Daily 8:30am - Dusk', '701 State Dr', 1, 5, '213-763-0114', 'http://www.laparks.org/park/exposition-rose-garden', ''),
(64, 3, 'Hancock Memorial Museum', 'FREE', 'The Museum is open to the public by appointment. To arrange a visit to the Museum, contact the curator, or call (213), 740-5141', 'University Ave At Childs Way', 1, 5, '213-740-5141', 'https://libraries.usc.edu/locations/special-collections/hancock-memorial-museum', ''),
(65, 3, 'Cathedral of Our Lady of the Angels', 'FREE', 'Monday - Friday 6:00am - 6:00pm, Saturday 9:00am - 6:00pm, Sunday 7:00am - 6:00pm', '555 W Temple St', 1, 5, '213-680-5200', 'http://www.olacathedral.org/', 'Guided Tours: Monday - Friday 1pm'),
(66, 3, 'Avila Adobe', 'FREE', 'Varied Tours Monday - Saturday', '10 Olvera St', 1, 5, '213-680-2525', 'http://www.calleolvera.com/history/adobe/', ''),
(67, 3, 'Griffith Observatory', 'FREE', 'Tuesday - Friday 12:00pm - 10:00pm. Saturday - Sunday 10:00am - 10:00pm', '2800 E Observatory Rd', 1, 5, '213-473-0800', 'http://www.griffithobservatory.org/', ''),
(68, 1, 'Saint Louis Science Center', 'FREE', 'Monday - Saturday 9:30am - 4:30pm Sunday 11:00am - 4:30pm', '5050 Oakland Ave', 5, 26, '314-289-4400', 'https://www.slsc.org/', 'You can use the sky bridge to enter the Planetarium on the other side of the freeway'),
(69, 1, 'Saint Louis Art Museum', 'FREE', 'Tuesday - Thursday 10:00am to 5:00pmFri 10:00am - 9:00pmSat - Sun 10 a.m. to 5 p.m.', '1 Fine Arts Dr', 5, 26, '314-721-0072', 'http://www.slam.org/', ''),
(70, 1, 'Missouri History Museum', 'FREE', 'Monday, Wednesday - Sunday 10:00am - 5:00pm Tuesday 10:00am - 8:00pm', '5700 Lindell Blvd', 5, 26, '314-746-4599', 'http://mohistory.org/', ''),
(71, 1, 'Cahokia Mounds Museum Society', 'FREE', 'Wednesday - Sunday 9:00am - 5:00pm', '30 Ramey St Collinsville IL 62234', 5, 26, '618-346-5160', 'https://cahokiamounds.org/', ''),
(72, 1, 'Contemporary Art Museum St. Louis', 'FREE', 'Wednesday 10:00am – 5:00pm Thursday 10:00am – 8:00pm Friday 10:00am – 8:00pm Saturday 10:00am – 5:00pm Sunday 10:00am – 5:00pm ', '3750 Washington Blvd', 5, 26, '314-535-4660', 'http://camstl.org/', ''),
(73, 1, 'National Great Rivers Museum', 'FREE', 'Daily 9:00am - 5:00pm', 'Lock and Dam Way Alton IL 62002', 5, 26, '618-462-6979', 'http://www.meetingoftherivers.org/', ''),
(74, 1, 'Pulitzer Arts Foundation', 'FREE', 'Wednesday 10:00am - 5:00pm Thursday - Friday 10:00am - 8:00pmSaturday  10:00am - 5:00pm', '3716 Washington Blvd', 5, 26, '314-754-1850', 'https://pulitzerarts.org/', ''),
(75, 1, 'Inside the Economy Museum at the Federal Reserve Bank of St. Louis', 'FREE', 'Monday - Friday9:00am - 3:00pm', '1 Federal Reserve Bank Plaza', 5, 26, '314-444-7309', 'https://www.stlouisfed.org/inside-the-economy-museum', ''),
(76, 1, 'Holocaust Museum & Learning', 'FREE', 'Varied', '12 Millstone Campus Dr', 5, 26, '314-442-3711', 'https://www.jfedstl.org/direct-services/hmlc/', 'Please call 314-442-3711 before visiting to ensure that the Museum is accessible.'),
(77, 1, 'James S. McDonnell Planetarium', 'FREE', 'Monday – Saturday: 9:30am – 4:30pm Sunday: 11:00am – 4:30pm', '5050 Oakland Ave', 5, 26, '314-289-4400', 'https://www.slsc.org/james-s-mcdonnell-planetarium/planetarium-shows/', 'You can use the sky bridge to enter the Science Center on the other side of the freeway'),
(78, 2, 'Saint Louis Zoo', 'FREE', 'Daily 9:00am - 5pm', 'Government Drive', 5, 26, '314-781-0900', 'https://www.stlzoo.org/', ''),
(79, 2, 'Citygarden', 'FREE', 'Daily from Sunrise - 10:00pm', '801 Market St', 5, 26, '314-241-3337', 'http://www.citygardenstl.org/', ''),
(80, 2, 'The Muny - Lichtenstein Plaza', 'FREE', 'Various performance times', 'Summit Dr', 5, 26, '314-361-1900', 'https://muny.org/', 'There are 1,450 FREE seats available at the back of the theater for every preformance. Arrive early in order to ensure the best avaialable seating.See their website for more details. https://muny.org/free-seats/'),
(81, 2, 'Grant''s Farm', 'FREE', 'Varied', '10501 Gravois Rd', 5, 26, '314-843-1700', 'http://www.grantsfarm.com/', ''),
(82, 2, 'World Bird Sanctuary', 'FREE', 'Daily 8:00am - 5:00pm', '125 Bald Eagle Ridge Rd Valley Park MO 63088', 5, 26, '636-225-4390', 'http://www.worldbirdsanctuary.org/', ''),
(83, 2, 'Laumeier Sculpture Park', 'FREE', 'Daily 8:00am to Sunset', '12580 Rott Rd', 5, 26, '314-615-5278', 'http://www.laumeiersculpturepark.org/', 'Free Guided tours are offered the first Sunday of every month, May–October at 2:00pm'),
(84, 2, 'Missouri Botanical Garden', 'FREE', 'Wednesday & Saturday 9:00am -12:00pm', '4344 Shaw Blvd', 5, 26, '314-577-5100', 'http://www.missouribotanicalgarden.org/', ''),
(85, 2, 'The Jewel Box', 'FREE', 'Monday & Tuesday 9:00am - 12:00pm', '1 Wells and McKinley Drives', 5, 26, '314-531-0080', 'https://www.stlouis-mo.gov/government/departments/parks/parks/Jewel-Box.cfm', ''),
(86, 3, 'Cahokia Mounds State Historic Site', 'FREE', 'Daily 9:00am - Dusk', '30 Ramey St Collinsville IL 62234', 5, 26, '618-346-5160', 'https://cahokiamounds.org/', ''),
(87, 3, 'Cathedral Basilica of Saint Louis', 'FREE', 'Daily 7:00am - 5:00pm', '4431 Lindell Blvd', 5, 26, '314-373-8200', 'http://cathedralstl.org/', 'Guided tours are offered Monday through Friday (by appointment), or on Sundays after noon mass'),
(88, 3, 'Ulysses S. Grant National Historic Site', 'FREE', 'Daily 9:00am - 5:00pm', '7400 Grant Rd', 5, 26, '314-842-1867', 'https://www.nps.gov/ulsg/index.htm', 'Tours offered every hour or half hour 9:30 a.m. - 4:00 p.m. You must obtain a free ticket for the tour at the Visitor Center'),
(89, 3, 'Tower Grove House', 'FREE', 'Wednesday & Saturday 10:00am - 12:00pm', '4344 Shaw Blvd.', 5, 26, '314-577-5100', 'http://www.missouribotanicalgarden.org/gardens-gardening/our-garden/gardens-conservatories/victorian', 'Admission included with Botanical Garden admission'),
(90, 3, 'Old Courthouse', 'FREE', 'Daily 8:00am - 4:30pm', '11 N 4th St', 5, 26, '1-877-982-14', 'http://www.gatewayarch.com/', 'Home of the Gateway Arch Museum. Admission to the exhibits is free, however you must purchase tickets to go up into the arch itself'),
(91, 1, 'U.S. Department of the Interior Museum', 'FREE', 'Monday - Friday  8:30am - 4:30am', '1849 C St NW Washington DC 20240', 4, 9, '202-208-3100', 'https://www.doi.gov/interiormuseum', 'Advance reservations are required for building tours given on Tuesdays and Thursdays at 2PM'),
(92, 1, 'United States Holocaust Memorial Museum', 'FREE', 'Daily 10:00am - 5:20pm', '100 Raoul Wallenberg Pl SW Washington DC 20024', 4, 9, '202-488-0400', 'https://www.ushmm.org/', 'Closed on Yom Kippur and Christmas Day'),
(93, 1, 'National Museum of African American History and Culture', 'FREE', 'Daily 10:00am - 5:30pm', '1400 Constitution Ave NW Washington DC 20560', 4, 9, '844-750-3012', 'https://nmaahc.si.edu/', 'It is suggested that you obtain timed passes online for the day you play to arrive well in advance as it can be as much as 3 months until the next tickets are available. If there are walk in tickets left, they are available 1 per person after 1pm daily.'),
(94, 1, 'Smithsonian National Museum of American History', 'FREE', 'Daily 10:00am - 5:30pm', '1300 Constitution Ave NW Washington DC 20560', 4, 9, '202-633-1000', 'http://americanhistory.si.edu/', ''),
(95, 1, 'Smithsonian National Museum of Natural History', 'FREE', 'Daily 10:00am - 5:30pm', '10th St. & Constitution Ave. NW Washington DC 20560', 4, 9, '202-633-1000', 'http://naturalhistory.si.edu/', ''),
(96, 1, 'Smithsonian Castle', 'FREE', 'Daily 8:30am - 5:30pm', '1000 Jefferson Dr SW Washington DC 20560', 4, 9, '202-633-1000', 'https://www.si.edu/', ''),
(97, 1, 'Smithsonian National Air and Space Museum', 'FREE', 'Daily 10:30am - 5:30pm', '600 Independence Ave SW Washington DC 20560', 4, 9, '202-633-2214', 'https://airandspace.si.edu/', ''),
(98, 1, 'National Museum of the American Indian', 'FREE', 'Daily 10:30am - 5:30pm', '4th St SW & Independence Ave SW Washington DC 20560', 4, 9, '202-633-1000', 'http://nmai.si.edu/', ''),
(99, 1, 'National Gallery of Art', 'FREE', 'Monday – Saturday 10:00am – 5:00pm Sunday 11:00am – 6:00pm', '6th & Constitution Ave NW Washington DC 20565', 4, 9, '202-737-4215', 'https://www.nga.gov/content/ngaweb.html', ''),
(100, 1, 'National Gallery of Art - East Building', 'FREE', 'Monday – Saturday 10:00am – 5:00pm Sunday 11:00am – 6:00pm', '150 4th St NW Washington DC 20001', 4, 9, '202-737-4215', 'https://www.nga.gov/content/ngaweb.html', ''),
(101, 1, 'Hirshhorn Museum', 'FREE', 'Daily 10:00am - 5:30pm', 'Independence Ave SW & 7th St SW Washington DC 20560', 4, 9, '202-633-1000', 'https://hirshhorn.si.edu/', ''),
(102, 1, 'Smithsonian National Museum of African Art', 'FREE', 'Daily 10:30am - 5:30pm', '950 Independence Ave SW Washington DC 20560', 4, 9, '202-633-4600', 'https://africa.si.edu/', ''),
(103, 1, 'U.S. Navy Museum', 'FREE', 'Monday - Friday 9:00am - 5:00pmWeekends & Holidays 10:00am - 5:00pm', '736 Sicard St SE Washington DC 20374', 4, 9, '202-433-4882', 'https://www.history.navy.mil/content/history/museums/nmusn.html', 'Visitors must be vetted before coming. See https://www.history.navy.mil/content/history/museums/nmusn/about-us/plan-your-visit.html'),
(104, 3, 'Lincoln Memorial', 'FREE', '24 hours a day', '2 Lincoln Memorial Cir NW Washington DC 20037', 4, 9, '', 'https://www.nps.gov/linc/index.htm', 'Rangers on duty will provide interpretive programs upon request from 9:30 a.m. to 10:00 p.m'),
(105, 3, 'Albert Einstein Memorial', 'FREE', '24 hours a day', '2101 Constitution Ave NW Washington DC 20418', 4, 9, '', 'http://www.nasonline.org/about-nas/visiting-nas/nas-building/the-einstein-memorial.html', ''),
(106, 3, 'The U.S. Capitol Visitor Center', 'FREE', 'Monday - Saturday 8:30am - 4:30pm', 'First St NE Washington DC 20515', 4, 9, '202-226-8000', 'https://www.visitthecapitol.gov/', ''),
(107, 3, 'The White House', 'FREE', 'Tuesday - Thursday 7:30 am - 11:30am, Fridays - Saturday 7:30am - 1:30pm', '1600 Pennsylvania Ave NW Washington DC 20500', 4, 9, '202-456-7041', 'https://www.whitehouse.gov/participate/tours-and-events', 'A visit to the White House requires registration through one''s member of Congress a minimum of 21 days in advance and up to 6 months in advance. Be sure to check the website for any additional information'),
(108, 1, 'White House Visitor Center', 'FREE', 'Daily 7:30am 4:00pm.', '1450 Pennsylvania Ave. NWWashington  DC 20230 ', 4, 9, '202-208-1631', 'https://www.nps.gov/whho/index.htm', ''),
(109, 4, 'Vietnam Veterans Memorial', 'FREE', '24 hours a day', '5 Henry Bacon Dr NW Washington DC 20245', 4, 9, '202-426-6841', 'https://www.nps.gov/vive/index.htm', 'You can locate a name of a loved one before you go to the memorial on their website'),
(110, 4, 'Korean War Veterans Memorial', 'FREE', '24 hours a day', '10 Daniel French Dr SW Washington D.C', 4, 9, '202-426-6841', 'https://www.nps.gov/kowa/index.htm', ''),
(111, 4, 'World War II Memorial', 'FREE', '24 hours a day', '1750 Independence Ave. SW Washington D.C', 4, 9, '202-426-6841', 'https://www.nps.gov/wwii/index.htm', ''),
(112, 4, 'Thomas Jefferson Memorial', 'FREE', '24 hours a day', '701 E Basin Dr SW Washington DC 20242', 4, 9, '202-426-6841', 'https://www.nps.gov/thje/index.htm', ''),
(113, 3, 'Washington Monument', 'FREE', 'CLOSED UNTIL SPRING 2019 The outside of the monument can still be viewed 24 hours a day', '2 15th St NW Washington DC 20024', 4, 9, '202-426-6841', 'https://www.nps.gov/wamo/index.htm', ''),
(114, 4, 'John Paul Jones Memorial', 'FREE', '24 hours a day', '17th St SW Washington DC 20006', 4, 9, '', '', ''),
(115, 4, 'Martin Luther King, Jr. Memorial', 'FREE', '24 hours a day', '1964 Independence Ave SW Washington DC 20024', 4, 9, '202-426-6841', 'https://www.nps.gov/mlkm/index.htm', ''),
(116, 4, 'Franklin Delano Roosevelt Memorial', 'FREE', '24 hours a day', '1850 West Basin Dr SW Washington DC 20242', 4, 9, '202-426-6841', 'https://www.nps.gov/frde/index.htm', ''),
(117, 4, 'National 9/11 Pentagon Memorial', 'FREE', '24 hours a day', '1 N Rotary Rd Arlington VA 22202', 4, 9, '301-740-3388', 'http://pentagonmemorial.org/', ''),
(118, 4, 'The Tomb of the Unknown Soldier', 'FREE', 'April-September, Daily 8:00am - 7:00pm, October-March, Daily 8:00am - 5:00pm ', '1 Memorial Ave Fort Myer VA 22211', 4, 9, '877-907-8585', 'http://www.arlingtoncemetery.mil/Explore/Tomb-of-the-Unknown-Soldier', '(April-September),Changing of the Guard every half hour(October-March),Changing of the Guard on the hour'),
(119, 3, 'Arlington National Cemetery Visitors Center', 'FREE', '(April-September), Daily 8:00am - 7:00pm, (October-March), Daily 8:00am - 5:00pm ', '1 Memorial Ave Fort Myer VA 22211', 4, 9, '877-907-8585', 'http://www.arlingtoncemetery.mil/Explore/Tomb-of-the-Unknown-Soldier', ''),
(120, 3, 'Arlington House Museum', 'FREE', '(April - September), 9:00am - 6:00pm, (October - March), 9:30 am - 4:30pm', '1 Memorial Ave Fort Myer VA 22211', 4, 9, '703-235-1530', 'https://www.nps.gov/arho/index.htm', ''),
(121, 2, 'United States Botanic Garden', 'FREE', 'Daily 10:00am - 5:00pm', '100 Maryland Ave SW Washington DC 20001', 4, 9, '202-225-8333', 'https://www.usbg.gov/', ''),
(122, 2, 'Smithsonian National Zoological Park', 'FREE', 'Daily 8:00am - 7:00pm', '3001 Connecticut Ave NW Washington DC 20008', 4, 9, '202-633-4888', 'https://nationalzoo.si.edu/', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`) VALUES
(1, 'Museum'),
(2, 'Park'),
(3, 'Historical'),
(4, 'Memorial');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `cityID` int(11) NOT NULL,
  `cityName` varchar(45) DEFAULT NULL,
  `stateID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityID`, `cityName`, `stateID`) VALUES
(1, 'Los Angeles', 5),
(2, 'New York City', 33),
(3, 'Chicago', 14),
(4, 'Washington', 9),
(5, 'St Louis', 26);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `reviewID` int(11) NOT NULL,
  `attractionID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `reviewtext` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `stateID` int(11) NOT NULL,
  `stateCode` varchar(2) DEFAULT NULL,
  `stateName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateID`, `stateCode`, `stateName`) VALUES
(1, 'AL', 'Alabama'),
(2, 'AK', 'Alaska'),
(3, 'AZ', 'Arizona'),
(4, 'AR', 'Arkansas'),
(5, 'CA', 'California'),
(6, 'CO', 'Colorado'),
(7, 'CT', 'Connecticut'),
(8, 'DE', 'Delaware'),
(9, 'DC', 'District of Columbia'),
(10, 'FL', 'Florida'),
(11, 'GA', 'Georgia'),
(12, 'HI', 'Hawaii'),
(13, 'ID', 'Idaho'),
(14, 'IL', 'Illinois'),
(15, 'IN', 'Indiana'),
(16, 'IA', 'Iowa'),
(17, 'KS', 'Kansas'),
(18, 'KY', 'Kentucky'),
(19, 'LA', 'Louisiana'),
(20, 'ME', 'Maine'),
(21, 'MD', 'Maryland'),
(22, 'MA', 'Massachusetts'),
(23, 'MI', 'Michigan'),
(24, 'MN', 'Minnesota'),
(25, 'MS', 'Mississippi'),
(26, 'MO', 'Missouri'),
(27, 'MT', 'Montana'),
(28, 'NE', 'Nebraska'),
(29, 'NV', 'Nevada'),
(30, 'NH', 'New Hampshire'),
(31, 'NJ', 'New Jersey'),
(32, 'NM', 'New Mexico'),
(33, 'NY', 'New York'),
(34, 'NC', 'North Carolina'),
(35, 'ND', 'North Dakota'),
(36, 'OH', 'Ohio'),
(37, 'OK', 'Oklahoma'),
(38, 'OR', 'Oregon'),
(39, 'PA', 'Pennsylvania'),
(40, 'PR', 'Puerto Rico'),
(41, 'RI', 'Rhode Island'),
(42, 'SC', 'South Carolina'),
(43, 'SD', 'South Dakota'),
(44, 'TN', 'Tennessee'),
(45, 'TX', 'Texas'),
(46, 'UT', 'Utah'),
(47, 'VT', 'Vermont'),
(48, 'VA', 'Virginia'),
(49, 'WA', 'Washington'),
(50, 'WV', 'West Virginia'),
(51, 'WI', 'Wisconsin'),
(52, 'WY', 'Wyoming');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL,
  `userEmail` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `userFirstName` varchar(45) DEFAULT NULL,
  `userLastName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userEmail`, `password`, `userFirstName`, `userLastName`) VALUES
(2, 'johndoe@test.com', 'testing', 'John', 'Doe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attraction`
--
ALTER TABLE `attraction`
  ADD PRIMARY KEY (`attractionID`), ADD KEY `categoryID_idx` (`categoryID`), ADD KEY `cityID_idx` (`cityID`), ADD KEY `stateID_idx` (`stateID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityID`), ADD KEY `statID_indx` (`stateID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewID`), ADD KEY `attractionID_idx` (`attractionID`), ADD KEY `userID_idx` (`userID`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`stateID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attraction`
--
ALTER TABLE `attraction`
  MODIFY `attractionID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cityID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `stateID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attraction`
--
ALTER TABLE `attraction`
ADD CONSTRAINT `categoryID` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `cityID` FOREIGN KEY (`cityID`) REFERENCES `city` (`cityID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `stateID` FOREIGN KEY (`stateID`) REFERENCES `state` (`stateID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
ADD CONSTRAINT `attractionID` FOREIGN KEY (`attractionID`) REFERENCES `attraction` (`attractionID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
