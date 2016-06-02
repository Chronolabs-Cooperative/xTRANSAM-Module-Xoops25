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

if (!defined('XOOPS_ROOT_PATH')) {
	exit();
}

include_once $GLOBALS['xoops']->path('modules'.DS.'xtransam'.DS.'include'.DS.'functions.php');
include_once $GLOBALS['xoops']->path('modules'.DS.'xtransam'.DS.'include'.DS.'provider.php');

/**
* XOOPS translation provider class.
* This class is responsible for providing data access mechanisms to the data source
* of Translation API not based in user class objects.
*
* @author  Simon Roberts <simon@chronolabs.coop>
* @package xtransam
*/
class XtransamBingProvider extends XtransamProviderHandler
{

	var $url = "http://api.bing.net/json.aspx";
	var $db = '';
	
    function __construct(&$db) 
    { 
    	$this->db = $db;
    }
	
	function translate($fromcode, $tocode, $value)
	{
		
		$response = xtransam_obj2array(parent::json_decode($this->send_curl($this->url, $value, $fromcode, $tocode, XOOPS_URL)));
		if (isset($response['SearchResponse']['Translation']['Results'][0]['TranslatedTerm'])) {
			return parent::_unescapeUTF8EscapeSeq(parent::clean($response['SearchResponse']['Translation']['Results'][0]['TranslatedTerm']));
		} else { 
			return false;
		}
	}
	
	function send_curl($url, $text, $from, $to, $referer = null)
	{
		$response = xtransam_callAPI($url, array('AppId'=>$GLOBALS['xoopsModuleConfig']['bing_api_key'], 'Query'=>$text, 'Sources'=>'Translation', 'Version'=>'2.2', 'Translation.SourceLanguage'=>$from, 'Translation.TargetLanguage'=>$to), 'GET');
		return $response;
	}
	
}
?>