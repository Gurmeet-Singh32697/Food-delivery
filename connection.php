<?php
$hostname="localhost";
$user_name="root";
$password="0000";
$db="foodshala";
$con=mysqli_connect($hostname,$user_name,$password,$db);
$sql=mysqli_query($con,"
CREATE TABLE IF NOT EXISTS  `tblcustomer` (
  `fld_cust_id` int(10) NOT NULL AUTO_INCREMENT key,
  `fld_name` varchar(30) NOT NULL,
  `fld_email` varchar(30) NOT NULL,
  `fld_mobile` bigint(10) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8");
$sql2=mysqli_query($con,"
CREATE TABLE IF NOT EXISTS  `tblvendor` (
  `fldvendor_id` int(10) NOT NULL AUTO_INCREMENT key,
  `fld_name` varchar(30) NOT NULL,
  `fld_email` varchar(50) NOT NULL,
  `fld_password` varchar(50) NOT NULL,
  `fld_mob` bigint(10) NOT NULL,
  `fld_address` varchar(50) NOT NULL,
  `fld_logo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1");


?>