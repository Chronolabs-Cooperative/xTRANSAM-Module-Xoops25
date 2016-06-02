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
include 'admin_header.php';

error_reporting(E_ALL);
global $xoopsDB, $xoopsModuleConfig;

$op = isset($_REQUEST['op'])?$_REQUEST['op']:'dashboard';  

switch ($op){
case "deletebuffer":
	$sql[0] = "DELETE FROM ".$xoopsDB->prefix('xtransam_files')." WHERE ioid = $id";
	$sql[1] = "DELETE FROM ".$xoopsDB->prefix('xtransam_translator')." WHERE ioid = $id";
	$sql[2] = "DELETE FROM ".$xoopsDB->prefix('xtransam_iobase')." WHERE id = $id";	
	
	foreach($sql as $fquestion)
		$xoopsDB->queryF($fquestion);
		
	redirect_header("index.php", 4, _AM_XTRANSAM_IODELETED);
	break;
case "save-languages":
	$lang_handler = xoops_getmodulehandler('languages', 'xtransam');	
	foreach($id as $key => $value)
	{
		switch($value){
		case "new":
			$lang = $lang_handler->create();			
			break;
		default:
			$lang = $lang_handler->get($value);
		}
		
		if (!empty($name[$key])&&!empty($code[$key])) {
			$lang->setVar('name', $name[$key]);
			$lang->setVar('code', $code[$key]);
			$lang->setVar('foldername', $folder[$key]);			
			$lang->setVar('providers', $providers[$key]);
			@$lang_handler->insert($lang);
		}	
	}
	redirect_header("index.php?op=languages",2,_AM_XTRANSAM_LANGSAVEOK);
	break;
case "languages":
	xoops_cp_header();
	$indexAdmin = new ModuleAdmin();  
    echo $indexAdmin->addNavigation('index.php?op=languages');    
	languagesForm_display();
	include "admin_footer.php";
	
	break;
case "export":
	global $xoopsUser;
	
	$io_handler = xoops_getmodulehandler('iobase', 'xtransam');
	$io = $io_handler->get($id);
	$trans_handler = xoops_getmodulehandler('translator', 'xtransam');
	$lang_handler = xoops_getmodulehandler('languages', 'xtransam');	
	$files_handler = xoops_getmodulehandler('files', 'xtransam');		
	$criteria = new CriteriaCompo(new Criteria('ioid', $io->getVar('id')));
	$files = $files_handler->getObjects($criteria);
	
	$from_folder = $lang_handler->folder($io->getvar('languagefrom'));
	$to_folder = $lang_handler->folder($io->getvar('languageto'));

	// Changed by Chronolabs - Removed Code by Timgo - ansi conversion - 08/11/2011
	//include($GLOBALS['xoops']->path('modules'.DS.'xtransam'.DS.'include'.DS.'charset_utf-8.php'));
		
	foreach($files as $file) {
		$path = array();
		foreach(explode('\\', $file->getVar('path')) as $nodea)
			foreach(explode('/', $nodea) as $nodeb)
				$path[] = $nodeb;	
		foreach($path as $key => $value) {
			if (strtolower($value) == strtolower($from_folder)) {
				$path[$key] = $to_folder;
			}
			$pdir = DS.$path[$key];
			mkdir($pdir, 0777);
		}
		$wpath = implode(DS, $path);
		if($wpath!=$file->getVar('path')){
			$bfile = file($file->getVar('path').$file->getVar('filename'));
			$criteria = new CriteriaCompo(new Criteria('ioid', $io->getVar('id')));
			$criteria->add(new Criteria('fileid', $file->getVar('id')));
			$trans = $trans_handler->getObjects($criteria);
			foreach($trans as $tran) {
				$search = xtransam_convert_decode($tran->getVar('replacestr'), $tran->getVar('sm'));
				$name = xtransam_convert_decode($tran->getVar('name'), $tran->getVar('sm'));
				$translation = xtransam_convert_decode($tran->getVar('translation'), $tran->getVar('sm'));
				// Changed by Chronolabs - Removed Code by Timgo - ansi conversion - 08/11/2011
				// foreach($GLOBALS['charset_utf8'] as $search => $replace)
			    // $translation = str_replace($search, $replace, $translation);
			    $replace = 'define("'.$name.'", "'.$translation.'");'."\n";
				$bfile[$tran->getVar('line')] = $replace;	
			}
			// Changed by Chronolabs back to Footer
            $bfile[] = "<?php\n\n// Translation done by XTransam & ".$GLOBALS['xoopsUser']->getVar('uname')." (".$GLOBALS['xoopsUser']->getVar('email').")\n// XTransam ".($GLOBALS['xtransamModule']->getVar('version')/100)." is written by Chronolabs Co-op & The XOOPS Project - File Dumped on ".date('Y-m-d H:i')."\n\n?>";
			@makeWritable($wpath, true);
			if (file_exists($wpath.$file->getVar('filename')))
				unlink($wpath.$file->getVar('filename'));
			$file = @fopen($wpath.$file->getVar('filename'), 'w');
			$buffer = implode("", $bfile);
			fwrite($file, $buffer, strlen($buffer));
			fclose($file);
		}
		// Changed by Chronolabs to be recursive
		if (file_exists($indexFile = XOOPS_ROOT_PATH."modules".DS."xtransam".DS."language".DS."index.html"))
	   		copy($indexFile, $wpath.DS."index.html");
	}
	redirect_header("index.php?op=bbs",2,_AM_XTRANSAM_EXPORTCOMPLETE);
	break;
case "save":
	$trans_handler = xoops_getmodulehandler('translator', 'xtransam');
	foreach($trans as $key => $value) {
		$tran = $trans_handler->get($key);
		$tran->setVar('translation', xtransam_convert_encode($value, $tran->getVar('sm')));
		$trans_handler->insert($tran);
	}
	redirect_header("index.php?op=manage&id=$id&fileid=$fileid",2,_AM_XTRANSAM_SAVECOMPLETE);
	break;
case "manage":
	
	xoops_cp_header();
	$indexAdmin = new ModuleAdmin();    

    echo $indexAdmin->addNavigation('index.php?op=manage');
    //echo $indexAdmin->renderIndex();
	managerForm_display($id, $fileid);
	
    include "admin_footer.php";
	break;
	
case "analysis":
	$io_handler = xoops_getmodulehandler('iobase', 'xtransam');
	$files_handler = xoops_getmodulehandler('files', 'xtransam');
	$io = $io_handler->get($id);
	@$files_handler->analysepath($io);
	redirect_header("index.php?op=bbs",2,_AM_XTRANSAM_ANLYSISCOMPLETE);
	break;

case "import":
	$io_handler = xoops_getmodulehandler('iobase', 'xtransam');
	$files_handler = xoops_getmodulehandler('files', 'xtransam');
	$io = $io_handler->get($id);
	@$files_handler->importfiles($io);
	redirect_header("index.php?op=bbs",2,_AM_XTRANSAM_IMPORTCOMPLETE);
	break;
	
case "translate":
	xoops_cp_header();
	echo sprintf(_AM_XTRANSAM_TRANSLATION_IN_PROCESS, $GLOBALS['xtransamModuleConfig']['php_execute_for'], isset($restart)?$restart:1);
	include "admin_footer.php";
	$io_handler = xoops_getmodulehandler('iobase', 'xtransam');
	$io = $io_handler->get($id);
	$trans_handler = xoops_getmodulehandler('translator', 'xtransam');
	$lang_handler = xoops_getmodulehandler('languages', 'xtransam');	
	$criteria = new CriteriaCompo(new Criteria('ioid', $io->getVar('id')));
	if ($trans_handler->getCount($criteria)>0) {
		$trans = $trans_handler->getObjects($criteria);
		$start = time();
		foreach($trans as $tran) {
			if ($tran->isempty()){
				$from = $lang_handler->code($io->getVar('languagefrom'));
				$to = $lang_handler->code($io->getVar('languageto'));
				$GLOBALS['provider'] = $lang_handler->provider($tran->getVar('toid'));
				if (strlen($GLOBALS['provider'])>0) {
					$provider_handler = xoops_getmodulehandler('provider', 'xtransam');	
					$translation = $provider_handler->provider->translate($from,$to, xtransam_convert_decode($tran->getVar('orginal'), $tran->getVar('sm')));
					$tran->setVar('translation', xtransam_convert_encode($translation, $tran->getVar('sm')));
					if (strlen($translation)>0)
						$tran->setVar('auto', 1);
					else
						$tran->setVar('auto', 0);

					$trans_handler->insert($tran);
				}
				if ($start+$GLOBALS['xtransamModuleConfig']['php_execute_for']-3<time())
				{	
					$restart++;
					redirect_header("index.php?op=translate&id=$id&restart=$restart");
					exit(0);			
				}
			}
		}
	}
	redirect_header("index.php?op=bbs",2,_AM_XTRANSAM_TRANSLATIONCOMPLETE);
	break;
	
case "bbs":

	xoops_cp_header();
	$indexAdmin = new ModuleAdmin();    

    echo $indexAdmin->addNavigation('index.php?op=bbs');
    //echo $indexAdmin->renderIndex();
	translationForm_display(false);
	include "admin_footer.php";

	break;
	
case "wizard":
    xoops_cp_header();
    $indexAdmin = new ModuleAdmin();
	echo $indexAdmin->addNavigation('index.php?op=wizard');
    //echo $indexAdmin->renderIndex();
    wizardForm_display($step);
	translationForm_display(true);
    include "admin_footer.php";
	break;    
case "dashboard":
default:
	
    xoops_cp_header();
    
    $trans_handler = xoops_getmodulehandler('translator', 'xtransam');
	$lang_handler = xoops_getmodulehandler('languages', 'xtransam');	
	$files_handler = xoops_getmodulehandler('files', 'xtransam');
	$iobase_handler = xoops_getmodulehandler('iobase', 'xtransam');		

 	$indexAdmin = new ModuleAdmin();	
	
    $indexAdmin->addInfoBox(_AM_XTRANSAM_ADMIN_NUMTRASL);
    $indexAdmin->addInfoBoxLine(_AM_XTRANSAM_ADMIN_NUMTRASL, "<label>"._AM_XTRANSAM_THEREARE_NUMFILES."</label>", $files_handler->getCount(NULL), 'Green');
    $indexAdmin->addInfoBoxLine(_AM_XTRANSAM_ADMIN_NUMTRASL, "<label>"._AM_XTRANSAM_THEREARE_NUMLINES."</label>", $trans_handler->getCount(NULL), 'Green');
    $indexAdmin->addInfoBoxLine(_AM_XTRANSAM_ADMIN_NUMTRASL, "<label>"._AM_XTRANSAM_THEREARE_NUMPROJECTS."</label>", $iobase_handler->getCount(NULL), 'Green');
    $indexAdmin->addInfoBoxLine(_AM_XTRANSAM_ADMIN_NUMTRASL, "<label>"._AM_XTRANSAM_THEREARE_NUMLANG."</label>", $lang_handler->getCount(NULL), 'Green');

	xoops_load('xoopscache');
	if (!class_exists('XoopsCache')) {
		// XOOPS 2.4 Compliance
		xoops_load('cache');
		if (!class_exists('XoopsCache')) {
			include_once XOOPS_ROOT_PATH.DS.'class'.DS.'cache'.DS.'xoopscache.php';
		}
	}
	
	if ($googlecodes = XoopsCache::read('xtransam_google_pause')) {
		$indexAdmin->addInfoBoxLine(_AM_XTRANSAM_ADMIN_NUMTRASL, "<label>"._AM_XTRANSAM_THEREARE_GOOGLEAVAILABLE."</label>", _YES, 'Green');
		$indexAdmin->addInfoBoxLine(_AM_XTRANSAM_ADMIN_NUMTRASL, "<label>".sprintf(_AM_XTRANSAM_THEREARE_GOOGLEERROR, $googlecodes['code'], $googlecodes['message'])."</label>", '', 'Green');
	} else {
		$indexAdmin->addInfoBoxLine(_AM_XTRANSAM_ADMIN_NUMTRASL, "<label>"._AM_XTRANSAM_THEREARE_GOOGLEAVAILABLE."</label>", _NO, 'Green');
	}
	
    echo $indexAdmin->addNavigation("index.php") ;
    echo $indexAdmin->renderIndex();	
		
	include "admin_footer.php";
	
	break;		
}
?>