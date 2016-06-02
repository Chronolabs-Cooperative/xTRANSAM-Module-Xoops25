CREATE TABLE `xtransam_files` (
	`id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,         
	`ioid` INT(12) UNSIGNED DEFAULT '0',                   
	`filename` VARCHAR(255) DEFAULT NULL,                  
	`path` VARCHAR(255) DEFAULT NULL,                      
	`imported` TINYINT(2) DEFAULT '0',                     
	PRIMARY KEY (`id`)                                     
) ENGINE=INNODB CHARSET=utf8; 

CREATE TABLE `xtransam_iobase` (
	`id` int(12) unsigned NOT NULL AUTO_INCREMENT,
	`point` enum('core','module') DEFAULT 'module',
	`path` varchar(255) DEFAULT NULL,
	`languagefrom` smallint(6) DEFAULT '0',
	`languageto` smallint(6) DEFAULT '0',
	`total` int(12) DEFAULT '0',
	`done` int(12) DEFAULT '0',
	PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `xtransam_languages` (
	`lang_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
	`providers` VARCHAR(500) DEFAULT 'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}',
	`name` varchar(255) DEFAULT NULL,
	`code` varchar(6) DEFAULT NULL,
	`foldername` varchar(255) DEFAULT NULL,
	PRIMARY KEY (`lang_id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Albanian','sq',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Arabic','ar',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Bulgarian','bg',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Catalan','ca',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Chinese (Simplified)','zh-CN','schinese');
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Chinese (Traditional)','zh-TW','tchinese');
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Chinese (Simplified)','zh-CN','schinese_utf8');
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Chinese (Traditional)','zh-TW','tchinese_utf8');
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Croatian','hr',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Czech','cs',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Danish','da',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Dutch','nl',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','English','en',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Estonian','et',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Filipino','tl',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Finnish','fi',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','French','fr',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Galician','gl',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','German','de',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Greek','el',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Hebrew','iw',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Hindi','hi',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Hungarian','hu',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Indonesian','id',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Italian','it',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Japanese','ja',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Korean','ko',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Latvian','lv',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Lithuanian','lt',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Maltese','mt',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Norwegian','no',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Polish','pl',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Portuguese','pt',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Romanian','ro',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Russian','ru',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Serbian','sr',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Slovak','sk',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Slovenian','sl',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Spanish','es',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Swedish','sv',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Thai','th',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Turkish','tr',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Ukrainian','uk',NULL);
insert  into `xtransam_languages` (`lang_id`,`providers`,`name`,`code`,`foldername`) values (0,'a:3:{i:0;s:6:"google";i:1;s:8:"mymemory";i:2;s:4:"bing";}','Vietnamese','vi',NULL);

CREATE TABLE `xtransam_translator` (
	`id` INT(30) UNSIGNED NOT NULL AUTO_INCREMENT,       
	`ioid` INT(12) UNSIGNED DEFAULT '0',                 
	`fromid` SMALLINT(6) DEFAULT '0',                    
	`toid` SMALLINT(6) DEFAULT '0',                      
	`fileid` INT(12) DEFAULT '0',                        
	`linetype` ENUM('define') DEFAULT 'define',          
	`name` MEDIUMTEXT,                            
	`orginal` MEDIUMTEXT,                         
	`translation` MEDIUMTEXT,                     
	`replacestr` MEDIUMTEXT,                             
	`out` ENUM('1','0') DEFAULT '0',                     
	`line` INT(12) DEFAULT '0',      
	`auto` TINYINT(2) DEFAULT '0',
	`sm` ENUM('urlcode','uucode','base64','hex','open') DEFAULT 'urlcode',
	PRIMARY KEY (`id`)                                   
) ENGINE=INNODB DEFAULT CHARSET=utf8;     