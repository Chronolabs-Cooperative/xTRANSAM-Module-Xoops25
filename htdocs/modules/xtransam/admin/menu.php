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
$module_handler =& xoops_gethandler('module');
$GLOBALS['xtransamModule'] =& XoopsModule::getByDirname('xtransam');
$moduleInfo =& $module_handler->get($GLOBALS['xtransamModule']->getVar('mid'));
//$GLOBALS['xtransamImageAdmin'] = XOOPS_URL .'/'. $moduleInfo->getInfo('icons32');
$GLOBALS['xtransamImageAdmin'] = $moduleInfo->getInfo('icons32');

$adminmenu = array();

$i = 1;
$adminmenu[$i]["title"] = _MI_XTRANSAM_ADMENU1;
$adminmenu[$i]["link"] = 'admin/index.php';
$adminmenu[$i]["icon"] = '../../'.$GLOBALS['xtransamImageAdmin'].'/home.png';
$i++;
$adminmenu[$i]["title"] = _MI_XTRANSAM_ADMENU2;
$adminmenu[$i]["link"] = 'admin/index.php?op=wizard';
$adminmenu[$i]["icon"] = '../../'.$GLOBALS['xtransamImageAdmin'].'/wizard.png';
$i++;
$adminmenu[$i]["title"] = _MI_XTRANSAM_ADMENU3;
$adminmenu[$i]["link"] = 'admin/index.php?op=bbs';
$adminmenu[$i]["icon"] = '../../'.$GLOBALS['xtransamImageAdmin'].'/translations.png';
$i++;
$adminmenu[$i]["title"] = _MI_XTRANSAM_ADMENU4;
$adminmenu[$i]["link"] = 'admin/index.php?op=languages';
$adminmenu[$i]["icon"] = '../../'.$GLOBALS['xtransamImageAdmin'].'/languages.png';
$i++;
$adminmenu[$i]["title"] = _MI_XTRANSAM_ADMENU5;
$adminmenu[$i]["link"] = 'admin/about.php';
$adminmenu[$i]["icon"] = '../../'.$GLOBALS['xtransamImageAdmin'].'/about.png';

?>