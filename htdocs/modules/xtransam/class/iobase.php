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
class XtransamIobase extends XoopsObject
{

    function XtransamIobase($id = null)
    {
        $this->initVar('id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('point', XOBJ_DTYPE_OTHER, null, false, 20);
        $this->initVar('path', XOBJ_DTYPE_TXTBOX, null, true, 255);
        $this->initVar('languagefrom', XOBJ_DTYPE_INT, null);
        $this->initVar('languageto', XOBJ_DTYPE_INT, null);
        $this->initVar('done', XOBJ_DTYPE_INT, null);		
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
class XtransamIobaseHandler extends XoopsPersistableObjectHandler
{

	var $db;
	
    function __construct(&$db) 
    {
		$this->db = $db;
        parent::__construct($db, "xtransam_iobase", 'XtransamIobase', "id", "path");
    }
	
	function insert($io)
	{
		if (!is_a($io, 'XtransamIobase'))
			return false;

		if (!$this->exists($io))
			$sql = "INSERT INTO ".$this->db->prefix('xtransam_iobase')." (`point`, `path`, `languagefrom`, `languageto`) VALUES ('".$io->getVar('point')."', '".$io->getVar('path')."', '".$io->getVar('languagefrom')."', '".$io->getVar('languageto')."')";
		else
			$sql = "UPDATE ".$this->db->prefix('xtransam_iobase')." SET `point` = '".$io->getVar('point')."', `path` = '".$io->getVar('path')."', `languagefrom` = '".$io->getVar('languagefrom')."', `languageto` = '".$io->getVar('languageto')."', `total` = '".$io->getVar('total')."', `done` = '".$io->getVar('done')."' where `id` = ".$io->getVar('id');
			
		return $this->db->queryF($sql);
		
	}
	
	function &getObjects($criteria = null, $fields = null, $asObject = true, $id_as_key = true)
    {
        if (is_array($fields) && count($fields) > 0) {
            if (! in_array($this->handler->keyName, $fields)) {
                $fields[] = $this->handler->keyName;
            }
            $select = "`" . implode("`, `", $fields) . "`";
        } else {
            $select = "*";
        }
        $limit = null;
        $start = null;
        $sql = "SELECT {$select} FROM `".$this->db->prefix('xtransam_iobase')."`";
        if (isset($criteria) && is_subclass_of($criteria, "criteriaelement")) {
            $sql .= " " . $criteria->renderWhere();
            if ($sort = $criteria->getSort()) {
                $sql .= " ORDER BY {$sort} " . $criteria->getOrder();
                $orderSet = true;
            }
            $limit = $criteria->getLimit();
            $start = $criteria->getStart();
        }
        if (empty($orderSet)) {
            // $sql .= " ORDER BY `{$this->handler->keyName}` DESC";
        }
        $result = $this->db->query($sql, $limit, $start);
        $ret = array();
        if ($asObject) {
            while ($myrow = $this->db->fetchArray($result)) {
                $object = &$this->create(false);
                $object->assignVars($myrow);
                if ($id_as_key) {
                    $ret[$myrow['id']] = $object;
                } else {
                    $ret[] = $object;
                }
                unset($object);
            }
        } else {
            $object = &$this->create(false);
            while ($myrow = $this->db->fetchArray($result)) {
                $object->assignVars($myrow);
                if ($id_as_key) {
                    $ret[$myrow['id']] = $object->getValues(array_keys($myrow));
                } else {
                    $ret[] = $object->getValues(array_keys($myrow));
                }
            }
            unset($object);
        }
        return $ret;
    }	
	
	function exists($io)
	{
		if (!is_a($io, 'XtransamIobase'))
			return true;

		include_once(XOOPS_ROOT_PATH.'/class/criteria.php');
		$criteria = new CriteriaCompo(new Criteria('`point`', $io->getVar('point')), 'AND');
		$criteria->add(new Criteria('`path`', $io->getVar('path')), 'AND');
		$criteria->add(new Criteria('`languagefrom`', $io->getVar('languagefrom')), 'AND');		
		$criteria->add(new Criteria('`languageto`', $io->getVar('languageto')), 'AND');				
		if ($this->getCount($criteria)>0)
			return true;
		else
			return false;
	}
}
?>