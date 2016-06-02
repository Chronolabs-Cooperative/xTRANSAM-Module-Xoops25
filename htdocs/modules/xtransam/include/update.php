<?php
// $Id: update.php 2 2005-11-02 18:23:29Z skalpa $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
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
// Author: Kazumi Ono (AKA onokazu)                                          //
// URL: http://www.myweb.ne.jp/, http://www.xoops.org/, http://jp.xoops.org/ //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //

function xoops_module_update_xtransam(&$module) {
	global $xoopsDB;
	$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix('xtransam_files')." ADD COLUMN(ioid int(12))");	
	$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix('xtransam_translator')." ADD COLUMN(`sm` ENUM('urlcode','uucode','base64','hex','open') DEFAULT 'urlcode')");	
	$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix('xtransam_translator')." CHANGE COLUMN `hexval_name` `name` MEDIUMTEXT");
	$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix('xtransam_translator')." CHANGE COLUMN `hexval_orginal` `orginal` MEDIUMTEXT");
	$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix('xtransam_translator')." CHANGE COLUMN `hexval_translation` `translation` MEDIUMTEXT");
	$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix('xtransam_languages')." CHANGE COLUMN `provider` `providers` VARCHAR(500)");
	$result = $xoopsDB->queryF("UPDATE ".$xoopsDB->prefix('xtransam_languages')." SET `providers` = '".serialize(array('google', 'mymemory', 'bing'))."'");
    return true;
}

?>