-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2021 at 01:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing_mrkt_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_data`
--

CREATE TABLE `client_data` (
  `client_a_d_id` int(11) NOT NULL,
  `client_a_d_name` varchar(255) NOT NULL,
  `client_a_d_location` varchar(255) NOT NULL,
  `client_a_d_website` varchar(255) NOT NULL,
  `client_a_d_email` varchar(255) NOT NULL,
  `client_a_d_password` varchar(255) NOT NULL,
  `client_a_d_show_pa` varchar(255) NOT NULL,
  `client_a_d_delete` varchar(255) NOT NULL,
  `client_a_d_block` varchar(255) NOT NULL,
  `client_a_d_singl_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_data`
--

INSERT INTO `client_data` (`client_a_d_id`, `client_a_d_name`, `client_a_d_location`, `client_a_d_website`, `client_a_d_email`, `client_a_d_password`, `client_a_d_show_pa`, `client_a_d_delete`, `client_a_d_block`, `client_a_d_singl_id`) VALUES
(5, 'Wise Work', 'USA', 'https://wisework.co.uk/', 'work@gmail.com', '439ed537979d8e831561964dbbbd7413', '0', '0', '0', '778669');

-- --------------------------------------------------------

--
-- Table structure for table `client_final_ids`
--

CREATE TABLE `client_final_ids` (
  `client_final_auto` int(11) NOT NULL,
  `client_final_c_id` varchar(255) NOT NULL,
  `client_final_c_key` varchar(255) NOT NULL,
  `client_final_c_name` varchar(255) NOT NULL,
  `client_final_pid` varchar(255) NOT NULL,
  `client_final_c_pid_key` varchar(255) NOT NULL,
  `client_final_id_data` text NOT NULL,
  `client_final_date` varchar(255) NOT NULL,
  `client_final_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client_proj_detail`
--

CREATE TABLE `client_proj_detail` (
  `client_p_d_id` int(11) NOT NULL,
  `client_p_d_clint_id` varchar(255) NOT NULL,
  `client_p_d_auto_id` varchar(255) NOT NULL,
  `client_p_d_clint_name` varchar(255) NOT NULL,
  `client_p_d_pid` varchar(255) NOT NULL,
  `client_p_d_count_name` varchar(255) NOT NULL,
  `client_p_d_count_code` varchar(255) NOT NULL,
  `client_p_d_loi` varchar(255) NOT NULL,
  `client_p_d_ir` varchar(255) NOT NULL,
  `client_p_d_quota` varchar(255) NOT NULL,
  `client_p_d_cpi` varchar(255) NOT NULL,
  `client_p_d_link` varchar(255) NOT NULL,
  `client_p_d_date` varchar(255) NOT NULL,
  `client_p_d_time` varchar(255) NOT NULL,
  `client_p_d_status` varchar(255) NOT NULL COMMENT '1=Launch,2=Wait for Launch,3=Pause,4=Close',
  `client_p_d_uid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_proj_detail`
--

INSERT INTO `client_proj_detail` (`client_p_d_id`, `client_p_d_clint_id`, `client_p_d_auto_id`, `client_p_d_clint_name`, `client_p_d_pid`, `client_p_d_count_name`, `client_p_d_count_code`, `client_p_d_loi`, `client_p_d_ir`, `client_p_d_quota`, `client_p_d_cpi`, `client_p_d_link`, `client_p_d_date`, `client_p_d_time`, `client_p_d_status`, `client_p_d_uid`) VALUES
(10, '5', '778669', 'Wise Work', 'POI544521|WPS3384', 'USA', '01', '10', '5', '6', '10', 'https://wisework.co.uk/?UID=', '02/20/2020', '11:19 AM', '1', 'UID'),
(11, '5', '778669', 'Wise Work', 'SC56245|WPS8396', 'USA', '01', '10', '50', '500', '2', 'https://www.wisesample.com/UID=', '02/21/2020', '03:00 PM', '1', 'UID');

-- --------------------------------------------------------

--
-- Table structure for table `country_name`
--

CREATE TABLE `country_name` (
  `count_n_id` int(11) NOT NULL,
  `count_n_name` varchar(255) NOT NULL,
  `count_n_code` varchar(255) NOT NULL,
  `count_n_auto` varchar(255) NOT NULL,
  `count_n_date` varchar(255) NOT NULL,
  `count_n_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_name`
--

INSERT INTO `country_name` (`count_n_id`, `count_n_name`, `count_n_code`, `count_n_auto`, `count_n_date`, `count_n_time`) VALUES
(3, 'USA', '01', '384279', '02/15/2020', '07:34 PM'),
(4, 'India', '91', '846279', '02/16/2020', '11:46 AM'),
(5, 'CA', '01', '731916', '02/16/2020', '11:49 AM');

-- --------------------------------------------------------

--
-- Table structure for table `employe_project`
--

CREATE TABLE `employe_project` (
  `employe_p_id` int(11) NOT NULL,
  `employe_p_singl_id` varchar(255) NOT NULL,
  `employe_p_clint_link` varchar(255) NOT NULL,
  `employe_p_user_link` varchar(255) NOT NULL,
  `employe_p_name` varchar(255) NOT NULL,
  `employe_p_code` varchar(255) NOT NULL,
  `employe_p_date` varchar(255) NOT NULL,
  `employe_p_time` varchar(255) NOT NULL,
  `employe_p_uid` varchar(255) NOT NULL,
  `employe_p_pid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forgot_pass`
--

CREATE TABLE `forgot_pass` (
  `forgot_pass_id` int(11) NOT NULL,
  `forgot_pass_type` varchar(255) NOT NULL,
  `forgot_pass_link` text NOT NULL,
  `forgot_pass_use` varchar(50) NOT NULL,
  `forgot_pass_time` varchar(255) NOT NULL,
  `forgot_pass_date` varchar(255) NOT NULL,
  `forgot_pass_singl_id` varchar(255) NOT NULL,
  `forgot_pass_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `log_ad_id` int(11) NOT NULL,
  `login_name` varchar(255) NOT NULL,
  `login_email` varchar(255) NOT NULL,
  `login_password` varchar(255) NOT NULL,
  `login_show_pass` varchar(255) NOT NULL,
  `login_block` varchar(255) NOT NULL,
  `login_type` varchar(255) NOT NULL,
  `login_date` varchar(255) NOT NULL,
  `login_time` varchar(255) NOT NULL,
  `login_forget_count` varchar(255) NOT NULL,
  `login_single_id` text NOT NULL,
  `login_already_use` varchar(50) NOT NULL,
  `login_user_code` varchar(255) NOT NULL,
  `login_delete` varchar(25) NOT NULL,
  `login_try_three` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`log_ad_id`, `login_name`, `login_email`, `login_password`, `login_show_pass`, `login_block`, `login_type`, `login_date`, `login_time`, `login_forget_count`, `login_single_id`, `login_already_use`, `login_user_code`, `login_delete`, `login_try_three`) VALUES
(5, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '0', 'Admin', '02/15/2020', '07:34 PM', '0', '08f240633ce5e4e707f0c2eea9e4b400', '0', 'admin', '0', ''),
(7, 'Rohit', 'rohit@gmail.com', '2d235ace000a3ad85f590e321c89bb99', 'rohit', '0', 'Vender', '02/20/2020', '09:42 AM', '0', '1a9dc80064b687a1c9f0f9c3e4be0023', '0', 'ROT', '0', ''),
(8, 'falana', 'falana@co.in', '81dc9bdb52d04dc20036dbd8313ed055', '1234', '0', 'Vender', '02/21/2020', '02:57 PM', '0', '3baccb108a10b900f35d0283025547fe', '0', 'FL', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `project_status`
--

CREATE TABLE `project_status` (
  `id` int(11) NOT NULL,
  `p_status_s_ip` varchar(255) NOT NULL,
  `p_status_end_ip` varchar(255) NOT NULL,
  `p_status_s_date` varchar(255) NOT NULL,
  `p_status_s_time` varchar(255) NOT NULL,
  `p_status_e_time` varchar(255) NOT NULL,
  `p_status_v_id` varchar(255) NOT NULL,
  `p_status_final_st` varchar(255) NOT NULL COMMENT '1=ThankYou,2Termnt,3=Overquta',
  `p_status_pid` varchar(255) NOT NULL,
  `p_status_uid` varchar(255) NOT NULL,
  `p_status_clint_id` varchar(255) NOT NULL,
  `p_status_security_id` varchar(255) NOT NULL,
  `p_status_own_id` varchar(255) NOT NULL,
  `p_status_v_pid` varchar(255) NOT NULL,
  `p_status_c_pid` varchar(255) NOT NULL,
  `p_status_url_use` varchar(255) NOT NULL COMMENT '1=Start,0=Finish,2=Finish nut time issue'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_status`
--

INSERT INTO `project_status` (`id`, `p_status_s_ip`, `p_status_end_ip`, `p_status_s_date`, `p_status_s_time`, `p_status_e_time`, `p_status_v_id`, `p_status_final_st`, `p_status_pid`, `p_status_uid`, `p_status_clint_id`, `p_status_security_id`, `p_status_own_id`, `p_status_v_pid`, `p_status_c_pid`, `p_status_url_use`) VALUES
(6, '42.111.33.254', '14.102.8.242', '02/20/2020', '11:37:01', '14:37:06', '', '1', '', 'testing001', '778669', '849hi6t4', 'WPS3384', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `three_link`
--

CREATE TABLE `three_link` (
  `id` int(11) NOT NULL,
  `three_clint_name` varchar(255) NOT NULL,
  `three_clint_id` varchar(255) NOT NULL,
  `three_clint_auto` varchar(255) NOT NULL,
  `three_clint_pid` varchar(255) NOT NULL,
  `three_own_id` varchar(255) NOT NULL,
  `three_sectr_id` varchar(255) NOT NULL,
  `three_status` varchar(150) NOT NULL COMMENT '1=Launch,2=Wait for Launch,3=Pause,4=Close',
  `three_date` varchar(150) NOT NULL,
  `three_time` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `three_link`
--

INSERT INTO `three_link` (`id`, `three_clint_name`, `three_clint_id`, `three_clint_auto`, `three_clint_pid`, `three_own_id`, `three_sectr_id`, `three_status`, `three_date`, `three_time`) VALUES
(9, 'Wise Work', '5', '778669', 'SC56245', 'WPS8396', '9WC2S34S6855P6', '1', '02/21/2020', '14:55:39'),
(8, 'Wise Work', '5', '778669', 'POI544521', 'WPS3384', '533I2W45P84S1OP4', '1', '02/20/2020', '10:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `vander_alt_project`
--

CREATE TABLE `vander_alt_project` (
  `vander_a_p_id` int(11) NOT NULL,
  `vander_a_p_clint_name` varchar(255) NOT NULL,
  `vander_a_p_clint_key` varchar(255) NOT NULL,
  `vander_a_p_clint_auto` varchar(255) NOT NULL,
  `vander_a_p_v_pid_name` varchar(255) NOT NULL,
  `vander_a_p_v_pid_key` varchar(255) NOT NULL,
  `vander_a_p_quota` varchar(255) NOT NULL,
  `vander_a_p_loi` varchar(100) NOT NULL,
  `vander_a_p_date` varchar(255) NOT NULL,
  `vander_a_p_time` varchar(255) NOT NULL,
  `vander_a_p_status` varchar(255) NOT NULL COMMENT '1=Launch,2=Wait for Launch,3=Pause',
  `vander_a_p_cpi` varchar(255) NOT NULL,
  `vander_a_p_ownpid` varchar(255) NOT NULL,
  `vander_a_p_cl_link` text NOT NULL,
  `vander_a_p_vd_sid` varchar(255) NOT NULL,
  `vander_a_p_vd_pid` varchar(255) NOT NULL,
  `vander_a_p_full_link` text NOT NULL,
  `vander_a_p_vd_name` varchar(255) NOT NULL,
  `vander_a_p_vd_email` varchar(255) NOT NULL,
  `vander_a_p_v_id` varchar(255) NOT NULL,
  `vander_a_p_v_auto` varchar(255) NOT NULL,
  `vander_a_p_thank` text NOT NULL,
  `vander_a_p_termint` text NOT NULL,
  `vander_a_p_overquta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vander_alt_project`
--

INSERT INTO `vander_alt_project` (`vander_a_p_id`, `vander_a_p_clint_name`, `vander_a_p_clint_key`, `vander_a_p_clint_auto`, `vander_a_p_v_pid_name`, `vander_a_p_v_pid_key`, `vander_a_p_quota`, `vander_a_p_loi`, `vander_a_p_date`, `vander_a_p_time`, `vander_a_p_status`, `vander_a_p_cpi`, `vander_a_p_ownpid`, `vander_a_p_cl_link`, `vander_a_p_vd_sid`, `vander_a_p_vd_pid`, `vander_a_p_full_link`, `vander_a_p_vd_name`, `vander_a_p_vd_email`, `vander_a_p_v_id`, `vander_a_p_v_auto`, `vander_a_p_thank`, `vander_a_p_termint`, `vander_a_p_overquta`) VALUES
(17, 'Wise Work', '5', '778669', 'POI544521', '10', '5', '5', '02/20/2020', '11:26 AM', '1', '3', 'WPS3384', 'https://wisework.co.uk/?UID=', '849hi6t4', '', 'http://worldpublicresearch.com/testing_website/vendor/?849hi6t4/?WPS3384/&UID=YOUR_USER_ID', 'Rohit', 'rohit@gmail.com', '', '', 'https://www.w3schools.com/php/phptryit.asp?filename=tryphp_loop_for?th', 'https://www.w3schools.com/php/phptryit.asp?filename=tryphp_loop_for?te', 'https://www.w3schools.com/php/phptryit.asp?filename=tryphp_loop_for?qt'),
(18, 'Wise Work', '5', '778669', 'SC56245', '11', '5', '12', '02/21/2020', '03:02 PM', '1', '2', 'WPS8396', 'https://www.wisesample.com/UID=', '8fana56@', '', 'http://worldpublicresearch.com/testing_website/vendor/?8fana56@/?WPS8396/&UID=YOUR_USER_ID', 'falana', 'falana@co.in', '', '', 'http://worldpublicresearch.com/?thank', 'http://worldpublicresearch.com/?termint', 'http://worldpublicresearch.com/?overatuta');

-- --------------------------------------------------------

--
-- Table structure for table `vender_data`
--

CREATE TABLE `vender_data` (
  `vender_data_id` int(11) NOT NULL,
  `vender_data_name` varchar(255) NOT NULL,
  `vender_data_singl_id` varchar(255) NOT NULL,
  `vender_data_website` varchar(255) NOT NULL,
  `vender_data_email` varchar(255) NOT NULL,
  `vender_data_date` varchar(255) NOT NULL,
  `vender_data_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_data`
--
ALTER TABLE `client_data`
  ADD PRIMARY KEY (`client_a_d_id`);

--
-- Indexes for table `client_final_ids`
--
ALTER TABLE `client_final_ids`
  ADD PRIMARY KEY (`client_final_auto`);

--
-- Indexes for table `client_proj_detail`
--
ALTER TABLE `client_proj_detail`
  ADD PRIMARY KEY (`client_p_d_id`);

--
-- Indexes for table `country_name`
--
ALTER TABLE `country_name`
  ADD PRIMARY KEY (`count_n_id`);

--
-- Indexes for table `employe_project`
--
ALTER TABLE `employe_project`
  ADD PRIMARY KEY (`employe_p_id`);

--
-- Indexes for table `forgot_pass`
--
ALTER TABLE `forgot_pass`
  ADD PRIMARY KEY (`forgot_pass_id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`log_ad_id`);

--
-- Indexes for table `project_status`
--
ALTER TABLE `project_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `three_link`
--
ALTER TABLE `three_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vander_alt_project`
--
ALTER TABLE `vander_alt_project`
  ADD PRIMARY KEY (`vander_a_p_id`);

--
-- Indexes for table `vender_data`
--
ALTER TABLE `vender_data`
  ADD PRIMARY KEY (`vender_data_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_data`
--
ALTER TABLE `client_data`
  MODIFY `client_a_d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client_final_ids`
--
ALTER TABLE `client_final_ids`
  MODIFY `client_final_auto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_proj_detail`
--
ALTER TABLE `client_proj_detail`
  MODIFY `client_p_d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `country_name`
--
ALTER TABLE `country_name`
  MODIFY `count_n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employe_project`
--
ALTER TABLE `employe_project`
  MODIFY `employe_p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forgot_pass`
--
ALTER TABLE `forgot_pass`
  MODIFY `forgot_pass_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `log_ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_status`
--
ALTER TABLE `project_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `three_link`
--
ALTER TABLE `three_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vander_alt_project`
--
ALTER TABLE `vander_alt_project`
  MODIFY `vander_a_p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vender_data`
--
ALTER TABLE `vender_data`
  MODIFY `vender_data_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
