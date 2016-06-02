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

if (!defined('XOOPS_ROOT_PATH')) {
	exit();
}
/**
 * Class for policies
 * @author Simon Roberts <onokazu@xoops.org>
 * @copyright copyright (c) 2009-2003 XOOPS.org
 * @package kernel
 */
class XtransamLanguages extends XoopsObject
{

    function XtransamLanguages($id = null)
    {
        $this->initVar('lang_id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('providers', XOBJ_DTYPE_ARRAY, null, false, 255);
        $this->initVar('name', XOBJ_DTYPE_TXTBOX, null, true, 255);
        $this->initVar('code', XOBJ_DTYPE_TXTBOX, null, true, 6);
        $this->initVar('foldername', XOBJ_DTYPE_TXTBOX, null, false, 255);

    }

}


/**
* XOOPS policies handler class.
* This class is responsible for providing data access mechanisms to the data source
* of XOOPS user class objects.
*
* @author  Simon Roberts <simon@chronolabs.org.au>
* @package kernel
*/
class XtransamLanguagesHandler extends XoopsPersistableObjectHandler
{
    function __construct(&$db) 
    {
        parent::__construct($db, "xtransam_languages", 'XtransamLanguages', "lang_id", "name");
    }
	
	function name($id)
	{
		if ($this->getCount(new Criteria('lang_id', $id))>0)
		{
			$objs = $this->getObjects(new Criteria('lang_id', $id), false, false );
			return $objs[0]['name'];
		} else {
			return false;
		}
	}

	function provider($id)
	{
		if ($this->getCount(new Criteria('lang_id', $id))>0)
		{
			$objs = $this->getObjects(new Criteria('lang_id', $id), false, false );
			if (in_array($GLOBALS['xoopsModuleConfig']['provider'], $objs[0]['providers'])) {
				return $GLOBALS['xoopsModuleConfig']['provider'];
			}
			switch ($GLOBALS['xoopsModuleConfig']['provider']) {
				case 'google':
					return 'bing';
					break;
				case 'mymemory':
					return 'google';
					break;
				case 'bing':
					return 'google';
					break;
			}
		} else {
			return array($GLOBALS['xoopsModuleConfig']['provider']);
		}
	}
	
	function folder($id)
	{
		if ($this->getCount(new Criteria('lang_id', $id))>0)
		{
			$objs = $this->getObjects(new Criteria('lang_id', $id), false, false );
			if (empty($objs[0]['foldername']))
				return strtolower($objs[0]['name']);
			else
				return strtolower($objs[0]['foldername']);
				
		} else {
			return false;
		}
	}
	
	function code($id)
	{
		if ($this->getCount(new Criteria('lang_id', $id))>0)
		{
			$objs = $this->getObjects(new Criteria('lang_id', $id), false, false);
			return $objs[0]['code'];
		} else {
			return false;
		}
	}

	function validlanguage($name)
	{
		include_once(XOOPS_ROOT_PATH.'/class/criteria.php');
		$criteria = new CriteriaCompo(new Criteria('`name`', $name, 'LIKE'), 'OR');
		$criteria->add(new Criteria('`foldername`', $name, 'LIKE'), 'OR');
		if ($this->getCount($criteria)>0)
		{
			$objs = $this->getObjects($criteria);
			return $objs[0]->getVar('lang_id');
		} else {
			return false;
		} 	
	}
}
?>