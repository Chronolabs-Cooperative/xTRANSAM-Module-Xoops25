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

/**
* XOOPS translation provider master class.
* This class is responsible for providing data access mechanisms to the data source
* of Translation API not based in user class objects.
*
* @author  Simon Roberts <simon@chronolabs.coop>
* @package xtransam
*/
class XtransamProviderHandler  extends XoopsPersistableObjectHandler {
	
	var $db = '';
	var $provider = '';
	
	function __construct(&$db) {
		if (is_object($db))
			$this->db = $db;
		else
			$this->db = $GLOBALS['xoopsDB'];
		if (isset($GLOBALS['provider']))
			$this->provider = $this->createInstance($GLOBALS['provider']);
		else
			$this->provider = $this->createInstance($GLOBALS['xoopsModuleConfig']['provider']);
	}
	
	function createInstance($provider = '') {
		if (empty($provider))
			$provider = $GLOBALS['xoopsModuleConfig']['provider'];
		include_once $GLOBALS['xoops']->path('modules'.DS.'xtransam'.DS.'providers'.DS.$provider.'.php');
		$class = 'Xtransam'.ucfirst($provider).'Provider';
		if (class_exists($class))
			return new $class($this->db);
		return false;
	}
	
	function json_decode($data) {
		if (!function_exists('json_decode')) {
			if (!class_exists('Services_JSON'))
				include_once $GLOBALS['xoops']->path('modules'.DS.'xtransam'.DS.'include'.DS.'JSON.php');
			$json = new Services_JSON();
			return xtransam_obj2array($json->decode($data));
		} else {
			return xtransam_obj2array(json_decode($data));
		}
	}
	
	function _unescapeUTF8EscapeSeq($str) {
		return preg_replace_callback("/\\\u([0-9a-f]{4})/i", create_function('$matches', 'return html_entity_decode(\'&#x\'.$matches[1].\';\', ENT_NOQUOTES, \'UTF-8\');'), $str);
	}

	function clean($var)
	{
		$var = htmlspecialchars_decode($var);
		return $var;
	}	
}