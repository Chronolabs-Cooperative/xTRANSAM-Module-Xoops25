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

include_once(dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR.'mainfile.php');
include_once(dirname(dirname(dirname(dirname(__FILE__)))).DS.'include'.DS.'cp_header.php');

if (!defined('_CHARSET'))
	define("_CHARSET","UTF-8");
if (!defined('_CHARSET_ISO'))
	define("_CHARSET_ISO","ISO-8859-1");
	
$GLOBALS['myts'] = MyTextSanitizer::getInstance();

$module_handler = xoops_gethandler('module');
$config_handler = xoops_gethandler('config');
$GLOBALS['xtransamModule'] = $module_handler->getByDirname('xtransam');
$GLOBALS['xtransamModuleConfig'] = $config_handler->getConfigList($GLOBALS['xtransamModule']->getVar('mid')); 

set_time_limit($GLOBALS['xtransamModuleConfig']['php_execute_for']);

xoops_load('pagenav');	
xoops_load('xoopslists');
xoops_load('xoopsformloader');

include_once $GLOBALS['xoops']->path('class'.DS.'xoopsmailer.php');
include_once $GLOBALS['xoops']->path('class'.DS.'xoopstree.php');
include_once $GLOBALS['xoops']->path('modules'.DS.'xtransam'.DS.'include'.DS.'functions.php');
include_once $GLOBALS['xoops']->path('modules'.DS.'xtransam'.DS.'include'.DS.'forms.php');

if ( file_exists($GLOBALS['xoops']->path('/Frameworks/moduleclasses/moduleadmin/moduleadmin.php'))){
        include_once $GLOBALS['xoops']->path('/Frameworks/moduleclasses/moduleadmin/moduleadmin.php');
        //return true;
    }else{
        echo xoops_error("Error: You don't use the Frameworks \"admin module\". Please install this Frameworks");
        //return false;
    }
$pathImageIcon = XOOPS_URL .'/'. $GLOBALS['xtransamModule']->getInfo('icons16');
$pathImageAdmin = XOOPS_URL .'/'. $GLOBALS['xtransamModule']->getInfo('icons32');

$myts =& MyTextSanitizer::getInstance();

if ($xoopsUser) {
    $moduleperm_handler =& xoops_gethandler('groupperm');
    if (!$moduleperm_handler->checkRight('module_admin', $GLOBALS['xtransamModule']->getVar( 'mid' ), $xoopsUser->getGroups())) {
        redirect_header(XOOPS_URL, 1, _NOPERM);
        exit();
    }
} else {
    redirect_header(XOOPS_URL . "/user.php", 1, _NOPERM);
    exit();
}

if (!isset($xoopsTpl) || !is_object($xoopsTpl)) {
	include_once(XOOPS_ROOT_PATH."/class/template.php");
	$xoopsTpl = new XoopsTpl();
}

$xoopsTpl->assign('pathImageIcon', $pathImageIcon);
//xoops_cp_header();

$traslactionsHandler =& xoops_getModuleHandler('iobase', 'xtransam');

if (isset($_GET)) {
    foreach ($_GET as $k => $v) {
	    ${$k} = $v;
    }
}

if (isset($_POST)) {
    foreach ($_POST as $k => $v) {
	    ${$k} = $v;
    }
}

?>