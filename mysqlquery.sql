CREATE DATABASE IF NOT EXISTS `foodshala` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `foodshala`;

CREATE TABLE `tblcustomer` (
  `fld_cust_id` int(10) NOT NULL AUTO_INCREMENT key,
  `fld_name` varchar(30) NOT NULL,
  `fld_email` varchar(30) NOT NULL,
  `fld_mobile` bigint(10) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tblcustomer` (`fld_cust_id`, `fld_name`, `fld_email`, `fld_mobile`, `password`) VALUES
(1, 'gajender', 'customer1@gmail.com', 7503515382, 'customer1'),
(2, 'sanjay', 'customer2@gmail.com', 7503515386, 'customer2'),
(3, 'saana', 'customer3@gmail.com', 7503515383, 'customer3');

CREATE TABLE `tblvendor` (
  `fldvendor_id` int(10) NOT NULL auto_increment key,
  `fld_name` varchar(30) NOT NULL,
  `fld_email` varchar(50) NOT NULL,
  `fld_password` varchar(50) NOT NULL,
  `fld_mob` bigint(10) NOT NULL,
  `fld_address` varchar(50) NOT NULL,
  `fld_logo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tblvendor` (`fldvendor_id`, `fld_name`, `fld_email`, `fld_password`, `fld_mob`, `fld_address`, `fld_logo`) VALUES
(22, 'Hotel Radison', 'vendor1@gmail.com', 'vendor1', 7503515386, 'near wipro main building,noida', '46388969.jpg'),
(23, 'Hotel Piccaso', 'vendor2@gmail.com', 'vendor2', 7503515385,  'C-33, SWARN PARK, MUNDKA', '46388969.jpg');

CREATE TABLE `tblorder` (
  `fld_order_id` int(10) NOT NULL auto_increment key,
  `fld_customer_id` bigint(10) NOT NULL,
  `fldvendor_id` bigint(10) DEFAULT NULL,
  `fld_food_id` bigint(10) DEFAULT NULL,
  `fld_email_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tbfood` (
  `food_id` int(11) NOT NULL auto_increment key,
  `fldvendor_id` int(11) NOT NULL,
  `foodname` varchar(100) NOT NULL,
  `cost` bigint(15) NOT NULL,
  `cuisines` varchar(50) NOT NULL,
  `paymentmode` varchar(50) NOT NULL,
  `type` varchar(15) NOT NULL,
  `fldimage` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tbfood` (`food_id`, `fldvendor_id`, `foodname`, `cost`, `cuisines`, `paymentmode`,`type`, `fldimage`) VALUES
(2, 22, 'malai Kofta', 50, 'vegetable,veg', 'COD', 'veg','1469258122-malai-kofta.jpg'),
(3, 22, 'shahi panner', 20, 'vegetable', 'COD', 'veg','Shahi-Paneer-Recipe.jpg'),
(4, 22, 'chola kulcha', 100, 'lunch', 'COD', 'veg','maxresdefault.jpg'),
(5, 23, 'Pizza', 100, 'Medium Size, fast food', 'COD', 'veg','phut_0.jpg'),
(6, 23, 'Pizza Full', 300, 'Fast food,full size', 'COD','non-veg', 'phut_0.jpg'),
(7, 23, 'burger ', 50, 'Fast food', 'COD', 'veg','photo-1534790566855-4cb788d389ec.jpg');

INSERT INTO `tblorder` (`fld_order_id`, `fld_customer_id`, `fldvendor_id`, `fld_food_id`, `fld_email_id`) VALUES
(1, 1, 21, 1, 'customer3@gmail.com'),
(2, 2, 22, 3, 'customer3@gmail.com');
select * from foodshala.tblorder;

