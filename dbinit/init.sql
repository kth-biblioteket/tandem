-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Tid vid skapande: 05 mars 2023 kl 14:54
-- Serverversion: 5.6.24-log
-- PHP-version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Databas: `tandemlearn`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` char(2) NOT NULL,
  `a3` char(3) DEFAULT NULL,
  `code` char(3) DEFAULT NULL,
  `car_code` char(3) DEFAULT NULL,
  `dialing_code` int(11) DEFAULT NULL,
  `name_sv` char(128) DEFAULT NULL,
  `name_en` char(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur `tll_frontlines`
--

CREATE TABLE IF NOT EXISTS `tll_frontlines` (
  `id` int(11) NOT NULL,
  `textline` text,
  `visiblefrom` date DEFAULT NULL,
  `visibleto` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur `tll_languages`
--

CREATE TABLE IF NOT EXISTS `tll_languages` (
  `id` char(2) NOT NULL,
  `name_en` char(128) DEFAULT NULL,
  `tll` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur `tll_logincounts`
--

CREATE TABLE IF NOT EXISTS `tll_logincounts` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `loginyear` int(11) NOT NULL,
  `loginmonth` int(11) NOT NULL,
  `loginday` int(11) NOT NULL,
  `logintime` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur `tll_users`
--

CREATE TABLE IF NOT EXISTS `tll_users` (
  `id` char(10) NOT NULL,
  `first_name` char(64) DEFAULT NULL,
  `last_name` char(64) DEFAULT NULL,
  `email` char(128) DEFAULT NULL,
  `birth_date` varchar(12) DEFAULT NULL,
  `cell_phone` char(32) DEFAULT NULL,
  `home_phone` char(32) DEFAULT NULL,
  `gender` smallint(6) DEFAULT NULL,
  `nationality` char(2) DEFAULT NULL,
  `lang_have_1` char(2) DEFAULT NULL,
  `lang_have_2` char(2) DEFAULT NULL,
  `lang_have_3` char(2) DEFAULT NULL,
  `lang_want_1` char(2) DEFAULT NULL,
  `lang_want_2` char(2) DEFAULT NULL,
  `lang_want_3` char(2) DEFAULT NULL,
  `banned` enum('t','f') NOT NULL DEFAULT 'f',
  `manager` enum('t','f') DEFAULT NULL,
  `admin` enum('t','f') DEFAULT NULL,
  `comments` text,
  `admin_comments` text,
  `lastloginyear` int(11) NOT NULL,
  `lastloginmonth` int(11) NOT NULL,
  `interests` text,
  `reg_date` datetime DEFAULT NULL,
  `busy` enum('t','f') DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `campus` char(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `tll_frontlines`
--
ALTER TABLE `tll_frontlines`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `tll_languages`
--
ALTER TABLE `tll_languages`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `tll_logincounts`
--
ALTER TABLE `tll_logincounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loginyearindex` (`loginyear`),
  ADD KEY `loginmonthindex` (`loginmonth`);

--
-- Index för tabell `tll_users`
--
ALTER TABLE `tll_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `tll_frontlines`
--
ALTER TABLE `tll_frontlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `tll_logincounts`
--
ALTER TABLE `tll_logincounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;