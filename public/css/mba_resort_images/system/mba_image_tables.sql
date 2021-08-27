-- --------------------------------------------------------

--
-- Table structure for table `d_mba_image_category_definition`
--

CREATE TABLE IF NOT EXISTS `d_mba_image_category_definition` (
  `TableID` int(11) NOT NULL AUTO_INCREMENT,
  `ParentID` int(11) NOT NULL DEFAULT '0' COMMENT 'Corresponds to d_mba_image_category_definition.TableID',
  `Title` varchar(255) DEFAULT NULL,
  `Description` varchar(4095) DEFAULT NULL,
  `ImageURL` varchar(255) DEFAULT NULL,
  `ImageCrop` enum('middle','top','bottom','left','right') NOT NULL DEFAULT 'middle',
  `SortOrder` int(11) NOT NULL DEFAULT '0' COMMENT	'Default sort order',
  `ActiveFlag` tinyint(1) NOT NULL DEFAULT '0',
  `TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`TableID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `d_mba_image_definition`
--

CREATE TABLE IF NOT EXISTS `d_mba_image_definition` (
  `TableID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) DEFAULT NULL,
  `Description` varchar(4095) DEFAULT NULL,
  `HTMLContent` text,
  `ImageURL` varchar(255) DEFAULT NULL,
  `ImageCrop` enum('middle','top','bottom','left','right') NOT NULL DEFAULT 'middle',
  `SortOrder` int(11) NOT NULL DEFAULT '0' COMMENT	'Default sort order',
  `ActiveFlag` tinyint(1) NOT NULL DEFAULT '0',
  `TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`TableID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_mba_image_to_category`
--

CREATE TABLE IF NOT EXISTS `m_mba_image_to_category` (
  `ItemID` int(11) NOT NULL DEFAULT '0' COMMENT 'Corresponds to d_mba_image_definition.TableID',
  `CategoryID` int(11) NOT NULL DEFAULT '0' COMMENT 'Corresponds to d_mba_image_category_definition.TableID',
  `SortOrder` int(11) NOT NULL DEFAULT '0' COMMENT	'Determines the order of display',
  UNIQUE KEY `ItemID` (`ItemID`,`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

