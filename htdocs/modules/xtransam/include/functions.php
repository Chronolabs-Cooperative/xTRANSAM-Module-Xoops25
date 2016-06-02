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

if (!function_exists("xtransam_adminMenu")) {
  function xtransam_adminMenu ($currentoption = 0)  {
	  /* Nice buttons styles */
		global $xoopsConfig;
		$module_handler =& xoops_gethandler('module');
		$xModule = $module_handler->getByDirname('xtransam');
	    $dirname='xtransam';
	    echo "
    	<style type='text/css'>
		#form {float:left; width:100%; background: #e7e7e7 url('" . XOOPS_URL . "/modules/$dirname/images/bg.gif') repeat-x left bottom; font-size:93%; line-height:normal; border-bottom: 1px solid black; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;}
		    	#buttontop { float:left; width:100%; background: #e7e7e7; font-size:93%; line-height:normal; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; margin: 0; }
    	#buttonbar { float:left; width:100%; background: #e7e7e7 url('" . XOOPS_URL . "/modules/$dirname/images/bg.gif') repeat-x left bottom; font-size:93%; line-height:normal; border-left: 1px solid black; border-right: 1px solid black; margin-bottom: 0px; border-bottom: 1px solid black; }
    	#buttonbar ul { margin:0; margin-top: 15px; padding:10px 10px 0; list-style:none; }
		  #buttonbar li { display:inline; margin:0; padding:0; }
		  #buttonbar a { float:left; background:url('" . XOOPS_URL . "/modules/$dirname/images/left_both.gif') no-repeat left top; margin:0; padding:0 0 0 9px;  text-decoration:none; }
		  #buttonbar a span { float:left; display:block; background:url('" . XOOPS_URL . "/modules/$dirname/images/right_both.gif') no-repeat right top; padding:5px 15px 4px 6px; font-weight:bold; color:#765; }
		  /* Commented Backslash Hack hides rule from IE5-Mac \*/
		  #buttonbar a span {float:none;}
		  /* End IE5-Mac hack */
		  #buttonbar a:hover span { color:#333; }
		  #buttonbar #current a { background-position:0 -150px; border-width:0; }
		  #buttonbar #current a span { background-position:100% -150px; padding-bottom:5px; color:#333; }
		  #buttonbar a:hover { background-position:0% -150px; }
		  #buttonbar a:hover span { background-position:100% -150px; }
		  </style>";
	
	   // global $xoopsDB, $xoModule, $xoopsConfig, $xoModuleConfig;
	
	   $myts = &MyTextSanitizer::getInstance();
	
	   $tblColors = Array();
		// $adminmenu=array();
	   if (file_exists(XOOPS_ROOT_PATH . '/modules/' . $xModule->getVar('dirname') . '/language/' . $xoopsConfig['language'] . '/modinfo.php')) {
		   include_once XOOPS_ROOT_PATH . '/modules/xtransam/language/' . $xoopsConfig['language'] . '/modinfo.php';
	   } else {
		   include_once XOOPS_ROOT_PATH . '/modules/xtransam/english/modinfo.php';
	   }
       
	   echo "<table width=\"100%\" border='0'><tr><td>";
	   echo "<div id='buttontop'>";
	   echo "<table style=\"width: 100%; padding: 0; \" cellspacing=\"0\"><tr>";
	   echo "<td style=\"width: 45%; font-size: 10px; text-align: left; color: #2F5376; padding: 0 6px; line-height: 18px;\"><a class=\"nobutton\" href=\"".XOOPS_URL."/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=" . $xModule->getVar('mid') . "\">" . _PREFERENCES . "</a></td>";
	   echo "<td style='font-size: 10px; text-align: right; color: #2F5376; padding: 0 6px; line-height: 18px;'><b>" . $myts->displayTarea($xModule->name()) ."</td>";
	   echo "</tr></table>";
	   echo "</div>";
	   echo "<div id='buttonbar'>";
	   echo "<ul>";
	    $adminmenu = array();
		include XOOPS_ROOT_PATH . '/modules/xtransam/admin/menu.php';
	 	foreach ($adminmenu as $key => $value) {
		   $tblColors[$key] = '';
		   $tblColors[$currentoption] = 'current';
	     echo "<li id='" . $tblColors[$key] . "'><a href=\"" . XOOPS_URL . "/modules/".$xModule->getVar('dirname')."/".$value['link']."\"><span>" . $value['title'] . "</span></a></li>";
		 }
		 
	   echo "</ul></div>";
	   echo "</td></tr>";
	   echo "<tr'><td><div id='form'>";
    
  }
  
  function footer_xtransam_adminMenu()
  {
		echo "</div></td></tr>";
  		echo "</table>";
  }
}

if (!function_exists("xtransam_convert_encode")) {
	function xtransam_convert_encode($data, $store_method = "urlcode") {
		switch ($store_method) {
		default:
			return urlencode($data);
		case "base64":
			return base64_encode($data);	
		case "uucode":
			return convert_uuencode($data);
		case "open":
			return $data;
		case "hex":
			return bin2hex($data);
		}
	}
}

if (!function_exists("xtransam_convert_decode")) {
	function xtransam_convert_decode($data, $store_method = "urlcode") {
		switch ($store_method) {
		default:
			return urldecode($data);
		case "base64":
			return base64_decode($data);	
		case "uucode":
			return convert_uudecode($data);
		case "open":
			return $data;
		case "hex":
			return xtransam_hex2bin($data);
		}
	}
}

if (!function_exists("xtransam_hex2bin")) {
	function xtransam_hex2bin($hex)
	{
		if (!is_string($hex)) return null;
		$r='';
		for ($a=0; $a<strlen($hex); $a+=2) { $r.=chr(hexdec($hex{$a}.$hex{($a+1)})); }
		return $r;
	}
}

if (!function_exists("makeWritable")) {
	function makeWritable( $path, $create = true )
	    {
	        $mode = intval('0777', 8);
	        if ( !file_exists( $path ) ) {
	            if (!$create) {
	                return false;
	            } else {
	                mkdir($path, $mode);
	            }
	        }
	        if ( !is_writable($path) ) {
	            chmod( $path, $mode );
	        }
	        clearstatcache();
	        if ( is_writable( $path ) ) {
	            $info = stat( $path );
	            if ( $info['mode'] & 0002 ) {
	                return 'w';
	            } elseif ( $info['mode'] & 0020 ) {
	                return 'g';
	            }
	            return 'u';
	        }
	        return false;
	    }  
}

if (!function_exists("xtransam_obj2array")) {
	function xtransam_obj2array($objects) {
		$ret = array();
		foreach((array)$objects as $key => $value) {
			if (is_a($value, 'stdClass')) {
				$ret[$key] = xtransam_obj2array($value);
			} elseif (is_array($value)) {
				$ret[$key] = xtransam_obj2array($value);
			} else {
				$ret[$key] = $value;
			}
		}
		return $ret;
	}
}

if (!function_exists('xtransam_callAPI')) {
	function xtransam_callAPI($url, $params, $method = 'GET') {
		if ($ch = curl_init()) {
			switch($method) {
				default:
				case 'GET':
					$url .= '?'.http_build_query($params);
					trigger_error('API GET Action: '.$url, E_NOTICE);
					break;
				case 'POST':
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
					trigger_error('API POST Action: '.$url. ' - Parameters:'.http_build_query($params), E_NOTICE);
			}
			curl_setopt($ch, CURLOPT_URL, $url);
			//curl_setopt($ch, CURLOPT_HEADER, 1);
			curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_USERAGENT, ucfirst($GLOBALS['xoopsModule']->getVar('dirname')) . ' ' . $GLOBALS['xoopsModule']->getVar('version')/100 . ' (PHP Version ' . PHP_VERSION.')');
			$data = curl_exec($ch);
			curl_close($ch);
			return $data;
		}
		return false;
	}
}
?>