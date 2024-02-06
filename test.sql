CREATE TABLE `auth` (
  `admin_name` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



INSERT INTO `auth` (`admin_name`, `admin_password`) VALUES
('Admin007', 'Care@360');



CREATE TABLE `fbt` (
  `food_taste` int(50) NOT NULL,
  `food_quality` int(50) NOT NULL,
  `ambiance` int(50) NOT NULL,
  `service` int(50) NOT NULL,
  `restroom` int(50) NOT NULL,
  `food_timing` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `fbt` (`food_taste`, `food_quality`, `ambiance`, `service`, `restroom`, `food_timing`) VALUES
(4, 4, 3, 2, 2, 2);
COMMIT;

