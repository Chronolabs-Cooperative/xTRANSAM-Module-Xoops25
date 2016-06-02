<?php
// $Autho: wishcraft $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2009 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
//  --  Author: Simon Roberts (simon@chronolabs.org.au)                   -- //
//  ------------------------------------------------------------------------ //

	define('_MI_XTRANSAM_XTRANSAM_NAME','Language Translator');
	define('_MI_XTRANSAM_XTRANSAM_DESC','Language Translator is used to translate language file in xoops.<br><em>Written in memory of John Milner (Microsoft Australia)</em>');	
	
	define('_MI_XTRANSAM_ADMENU1','Dashboard');
	define('_MI_XTRANSAM_ADMENU2','Translation Wizard');
	define('_MI_XTRANSAM_ADMENU3','Do Translation');	
	define('_MI_XTRANSAM_ADMENU4','Language Matrix');	
	define('_MI_XTRANSAM_ADMENU5','About XTransam');
	
	// preferences
	define('_MI_XTRANSAM_STORE_METHOD','Storage Method');
	define('_MI_XTRANSAM_STORE_METHOD_DESC','This is the Method used with Database to store the language');	
	define('_MI_XTRANSAM_STORE_METHOD_URLENCODE','URL Code Store Method');
	define('_MI_XTRANSAM_STORE_METHOD_UUCODE','UU Code Store Method');
	define('_MI_XTRANSAM_STORE_METHOD_BASE64','Base64 Code Store Method');
	define('_MI_XTRANSAM_STORE_METHOD_HEX','Hexadecimal Store Method');
	define('_MI_XTRANSAM_STORE_METHOD_OPEN','Open Store Method');
	define('_MI_XTRANSAM_PROVIDER','Translation Provider to Use');
	define('_MI_XTRANSAM_PROVIDER_DESC','This is a translation provider option where you can select the API and method to use');
	define('_MI_XTRANSAM_PROVIDER_REST_GOOGLE','REST Google API Access');
	define('_MI_XTRANSAM_PROVIDER_OAUTH2_GOOGLE','OAuth 2.0 Google API Access');
	define('_MI_XTRANSAM_PROVIDER_REST_MYMEMORY','MyMemory Translation API');
	define('_MI_XTRANSAM_GOOGLE_APIKEY','Your API Key for Google API\'s');
	define('_MI_XTRANSAM_GOOGLE_APIKEY_DESC','This is your API Key for Google API you can get one from <a href="https://code.google.com/apis/console/?api=translate&pli=1#welcome" target="_blank">google api signup</a>');
	define('_MI_XTRANSAM_GOOGLE_CHAR_SECONDS','Your Characters per user per second on Google Language Translator API');
	define('_MI_XTRANSAM_GOOGLE_CHAR_SECONDS_DESC','This is the number of characters your \'Per-User Limit\' is set to: <a href="https://code.google.com/apis/console/?api=translate&pli=1" target="_blank">google quota information</a>');
	define('_MI_XTRANSAM_GOOGLE_CHAR_DAY','Your Characters Courtesy Limit per day on Google Language Translator API');
	define('_MI_XTRANSAM_GOOGLE_CHAR_DAY_DESC','This is the number of characters your \'Courtesy Limit\' is set to: <a href="https://code.google.com/apis/console/?api=translate&pli=1" target="_blank">google quota information</a>');
	define('_MI_XTRANSAM_PHP_EXECUTE_FOR','Number of seconds a PHP Script in this module will execute for!');
	define('_MI_XTRANSAM_PHP_EXECUTE_FOR_DESC','This is the total number of seconds a PHP Script in this module will be executed for!');
	define('_MI_XTRANSAM_WAIT_IN_CASE','Seconds to wait for limit slot to open');
	define('_MI_XTRANSAM_WAIT_IN_CASE_DESC','This is the number of seconds the translation routine will wait for to see if a slot will open for more translating.');
	define('_MI_XTRANSAM_MICROTIME_SECONDS_DIFF','Seconds Difference for slot balancing');
	define('_MI_XTRANSAM_MICROTIME_SECONDS_DIFF_DESC','This is the number of seconds difference for a historical cache item with limits to be compair to for removal and opening of a translation slot on second by second limits');
	define('_MI_XTRANSAM_MICROTIME_DAY_DIFF','Seconds in a day Difference for slot balancing');
	define('_MI_XTRANSAM_MICROTIME_DAY_DIFF_DESC','This is the number of seconds difference for a historical cache item with limits to be compair to for removal and opening of a translation slot on daily limits');
	
	// Version 1.18
	// Preferences
	define('_MI_XTRANSAM_PROVIDER_REST_BING','Microsoft Bing API');
	define('_MI_XTRANSAM_BING_APIKEY','Your Application ID for Microsoft Bing\'s API');
	define('_MI_XTRANSAM_BING_APIKEY_DESC','This is your Application ID for Bing API you can get one from <a href="https://ssl.bing.com/webmaster/Developers/Home?FORM=R5FD2" target="_blank">Application ID Signup</a>');
?>