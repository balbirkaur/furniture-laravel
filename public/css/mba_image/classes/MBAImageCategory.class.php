<?


class MBAImageCategory extends SiteBase {
	
	// Public class methods
	/**
	 * Retrieves an array of MBAImage objects.
	 * $in = a name/value pair array consisting of
	 *	'activeonly' = if set to true will retrieve only those marked as active, if set to false will retrieve only
	 *	those not marked as active, and if not set at all will retrieve all
	 *	'parentid' = if set to an integer value will return only those categories that have the identified parent,
	 *	and if not set will be ignored.
	 *	'start' = the start argument for the SQL LIMIT clause. If neither 'start' or 'limit' are set then the LIMIT
	 *	clause will not be used.
	 *	'limit' = the limit argument for the SQL LIMIT clause. If neither 'start' or 'limit' are set then the LIMIT
	 *	clause will not be used.
	 *	'sorted' = if set to true then will do initial sorting by the default sort
	 *
	 *	Returns an array of objects.
	 */
	public static function getAllArrayOfObjects($in = array()) {
		extract($in);
		$orderby = '';
		$sqlappend = '';
		$sqlargs = array();
		$sqlargsindex = 0;
		if(isset($parentid) && filter_var($parentid, FILTER_VALIDATE_INT)) {
			$sqlappend .= ($sqlappend ? ' AND' : '') . " `ParentID`=!" . $sqlargsindex++ . "!";
			$sqlargs[] = $parentid;
		}
		if(isset($activeonly)) {
			$sqlappend .= ($sqlappend ? ' AND' : '') . " `ActiveFlag`=!" . $sqlargsindex++ . "!";
			$sqlargs[] = $activeonly ? 1 : 0;
		}
		if(isset($sorted) && $sorted) {
			$orderby .= ($orderby ? ',' : " ORDER BY ") . "`SortOrder`";
		}
		$sqlappend = $sqlappend ? ' WHERE' . $sqlappend : '';
		$limitclause = '';
		$limitstart = isset($start) && !(filter_var($start, FILTER_VALIDATE_INT) === false) ? true : false;
		$limitlimit = isset($limit) && !(filter_var($limit, FILTER_VALIDATE_INT) === false) ? true : false;
		if($limitstart && $limitlimit) {
			$limitclause = ' LIMIT ' . $start . ',' . $limit;
		} else if($limitlimit) {
			$limitclause = ' LIMIT ' . $limit;
		}
		$return = array();
		$DB = DB::getReadOnlyAccess();
		$sql = "SELECT `TableID` FROM `d_mba_image_category_definition`" . $sqlappend . $orderby . $limitclause;
		$resp = $DB->query($sql, $sqlargs);
		while($r = $resp->fetch_object()) {
			$return[] = new MBAImageCategory(array('id' => $r->TableID));
		}
		return $return;
	}
	/**
	 * Retrieves the count of MBAImageCategory objects meeting the set criteria.
	 * $in = a name/value pair array consisting of
	 *	'parentid' = if set to an integer value will count only those categories that have the identified parent,
	 *	and if not set will be ignored.
	 *	'activeonly' = if set to true will count only those marked as active, if set to false will count only
	 *	those not marked as active, and if not set at all will count all
	 *
	 *	Returns the count.
	 */
	public static function getCountOfObjects($in = array()) {
		extract($in);
		$sqlappend = '';
		$sqlargs = array();
		$sqlargsindex = 0;
		if(isset($parentid) && filter_var($parentid, FILTER_VALIDATE_INT)) {
			$sqlappend .= ($sqlappend ? ' AND' : '') . " `ParentID`=!" . $sqlargsindex++ . "!";
			$sqlargs[] = $parentid;
		}
		if(isset($activeonly)) {
			$sqlappend .= ($sqlappend ? ' AND' : '') . " `ActiveFlag`=!" . $sqlargsindex++ . "!";
			$sqlargs[] = $activeonly ? 1 : 0;
		}
		$sqlappend = $sqlappend ? ' WHERE' . $sqlappend : '';
		$DB = DB::getReadOnlyAccess();
		$sql = "SELECT COUNT(*) AS Count FROM `d_mba_image_category_definition`" . $sqlappend;
		return $DB->query($sql)->fetch_object()->Count;
	}
	
	/*
	 * Returns an array of listing objects consisting of 'ID', 'Title', and 'ActiveFlag'.
	 */
	public static function getAllListingArrayOfObjects($in = array()) {
		$DB = DB::getReadOnlyAccess();
		$return = array();
		$sql = "SELECT `TableID` AS ID,`Title` AS Title,`ActiveFlag` AS ActiveFlag FROM `d_mba_image_category_definition`";
		$resp = $DB->query($sql);
		while($r = $resp->fetch_object()) {
			$return[] = $r;
		}
		return $return;
	}
	// End public class methods
	
	// Public class data
	// End public class data
	
	// Private class methods
	// End protected class methods
	
	// Private instance data
	private $tableid;
	// End protected instance data
	
	// Protected instance data
	protected $title;
	protected $parentid;
	protected $description;
	protected $imageurl;
	protected $imagecrop;
	protected $sortorder;
	protected $activeflag;
	// Error messaging
	protected $errormessage;
	// Name spaced title - provides forwardslashed separated chain from parent to this category.
	protected $namespacedtitle;
	protected $namespaceseparator = ' // ';
	// End protected instance data
	
	// Private instance methods
	// End protected instance methods
	
	// Protected instance methods
	/*	Returns the namespace for this category in the form of parent [separator] parent [separator]
	*/
	protected function getNameSpace() {
		$DB = DB::getReadOnlyAccess();
		$return = '';
		$parentid = $this->parentid;
		while($parentid > 0) {
			$sql = "SELECT `ParentID`,`Title` FROM `d_mba_image_category_definition` WHERE `TableID`=!0!";
			$resp = $DB->query($sql, array($parentid));
			if($resp->num_rows == 1) {
				$r = $resp->fetch_object();
				$parentid = $r->ParentID;
				$return = $r->Title . $this->namespaceseparator . $return;
			} else {
				// Make sure we escape in case of a bad parentid
				$parentid = 0;
			}
		}
		return $return;
	}
	
	protected function setDataToDefaults() {
		$this->tableid = -1;
		$this->title = null;
		$this->parentid = 0;
		$this->description = null;
		$this->imageurl = null;
		$this->imagecrop = 'middle';
		$this->sortorder = 0;
		$this->activeflag = 0;
		$this->errormessage = '';
		$this->namespacedtitle = false;
	}
	
	protected function setData($r) {
		$this->tableid = $r->TableID;
		$this->title = $r->Title;
		$this->parentid = $r->ParentID;
		$this->description = $r->Description;
		$this->imageurl = $r->ImageURL;
		$this->imagecrop = $r->ImageCrop;
		$this->sortorder = $r->SortOrder;
		$this->activeflag = $r->ActiveFlag;
	}
	// End protected instance methods
	
	// Public instance methods
	/**
	 * $in = name/value array consisting of
	 *	'id' = the database table id for this MBAImageCategory
	 *	'activeonly' = if set to any 'true' value then a match must be active, if present and set to any
	 *								 'false' value then a match must be set to inactive.
	 */
	public function __construct($in = array()) {
		$this->setDataToDefaults();
		extract($in);
		$id = isset($id) && Math::checkIntegerValue($id) ? $id : -1;
		$sqlappend = isset($activeonly) ? (' AND `ActiveFlag`=' . ($activeonly ? '1' : '0')) : '';
		$DB = DB::getReadOnlyAccess();
		$sql = "SELECT * FROM `d_mba_image_category_definition` WHERE `TableID`=!0!" . $sqlappend;
		$resp = $DB->query($sql, array($id));
		if($resp->num_rows == 1) {
			$this->setData($resp->fetch_object());
		}
	}
	
	public function __get($k) {
		switch($k) {
			case 'ID':
				return $this->tableid;
			case 'Title':
				return $this->title;
			case 'ParentID':
				return $this->parentid;
			case 'Description':
				return $this->description;
			case 'ImageURL':
				return $this->imageurl;
			case 'ImageCrop':
				return $this->imagecrop;
			case 'SortOrder':
				return $this->sortorder;
			case 'ActiveFlag':
				return $this->activeflag;
			case 'ErrorMessage':
				return $this->errormessage;
			case 'NameSpacedTitle':
				if(!$this->namespacedtitle) {
					$this->namespacedtitle = $this->getNameSpace() . $this->title;
				}
				return $this->namespacedtitle;
			default:
				return false;
		}
	}
	
	public function __set($k, $v) {
		switch($k) {
			case 'Title':
				$this->title = $v ? $v : null;
				$this->namespacedtitle = false;
				break;
			case 'ParentID':
				$this->parentid = $v && filter_var($v, FILTER_VALIDATE_INT) ? $v : 0;
				$this->namespacedtitle = false;
				break;
			case 'Description':
				$this->description = $v ? $v : null;
				break;
			case 'ImageURL':
				$this->imageurl = $v ? $v : null;
				break;
			case 'ImageCrop':
				$this->imagecrop = $v ? $v : null;
				break;
			case 'SortOrder':
				$this->sortorder = filter_var($v, FILTER_VALIDATE_INT) ? $v : 0;
				break;
			case 'ActiveFlag':
				$this->activeflag = $v ? 1 : 0;
				break;
		}
	}
	
	public function getBreadCrumbTrail($in = array()) {
		extract($in);
		$SITECLASS = &$GLOBALS['SITE_SPECIFIC']['SITECLASS'];
		$separator = isset($separator) ? $separator : ' / ';
		$basepage = isset($basepage) ? $basepage : '';
		$DB = DB::getReadOnlyAccess();
		$return = '';
		$parentid = $this->parentid;
		while($parentid > 0) {
			$sql = "SELECT `ParentID` FROM `d_mba_image_category_definition` WHERE `TableID`=!0!";
			$resp = $DB->query($sql, array($parentid));
			if($resp->num_rows == 1) {
				$r = $resp->fetch_object();
				$pc = new MBAImageCategory(array('id' => $parentid));
				$return = '<a href="' . $basepage . $pc->getNameSpaceURL() . '">' . $pc->Title . '</a>' . ($return ? $separator : '') . $return;
				$parentid = $r->ParentID;
			} else {
				// Make sure we escape in case of a bad parentid
				$parentid = 0;
			}
		}
		return $return;
	}
	
	public function getNameSpaceURL() {
		$SITECLASS = &$GLOBALS['SITE_SPECIFIC']['SITECLASS'];
		$DB = DB::getReadOnlyAccess();
		$return = '/' . $this->tableid . '/' . $this->title;
		$parentid = $this->parentid;
		while($parentid > 0) {
			$sql = "SELECT `ParentID`,`Title` FROM `d_mba_image_category_definition` WHERE `TableID`=!0!";
			$resp = $DB->query($sql, array($parentid));
			if($resp->num_rows == 1) {
				$r = $resp->fetch_object();
				$return = '/' . $parentid . '/' . $r->Title . $return;
				$parentid = $r->ParentID;
			} else {
				// Make sure we escape in case of a bad parentid
				$parentid = 0;
			}
		}
		return $SITECLASS->urlPretty($return);
	}

	/*
	 * Returns the descendent chain from child to parent if this product category is found to be a descendent of
	 * any of the input categories or false otherwise.
	 *
	 * $in = name/value pair array consisting of
	 *	'parentids' => an array of MBAImageCategory ID's to test against - will return positive upon finding this
	 *	category is a descendent of any in the array.
	 *
	 */
	public function isDescendantOf($in) {
		extract($in);
		$DB = DB::getReadOnlyAccess();
		$namechain = $this->title;
		$parentids = isset($parentids) && is_array($parentids) ? $parentids : array();
		$sql = "SELECT t1.`Title`,t1.`ParentID`,t2.`Title` AS ParentTitle FROM `d_mba_image_category_definition` AS t1 JOIN `d_mba_image_category_definition` AS t2 ON t2.`TableID`=t1.`ParentID` WHERE t1.`TableID`=!0!";
		$resp = $DB->query($sql, array($this->tableid));
		if($resp->num_rows > 0) {
			while(true) {
				$r = $resp->fetch_object();
				$namechain .= ' => ' . $r->ParentTitle;
				$tempid = $r->ParentID;												
				if($tempid == 0) { 
					return false;
				} else if(in_array($tempid, $parentids)) {
					return $namechain;
				}
				$sql = "SELECT t1.`Title`,t1.`ParentID`,t2.`Title` AS `ParentTitle` FROM `d_mba_image_category_definition` AS t1 JOIN `d_mba_image_category_definition` AS t2 ON t2.`TableID`=t1.`ParentID` WHERE t1.`TableID`=!0!";
				$resp = $DB->query($sql, array($tempid));
				if($resp->num_rows == 0) {
					return false;
				}
			}
		} else {
			return false;
		}
	}
	
	public function save() {
		$params = array(
			$this->title,
			$this->parentid,
			$this->description,
			$this->imageurl,
			$this->imagecrop,
			$this->sortorder,
			$this->activeflag,
			$this->tableid
			);
		$pi = 0;
		$setclause = 'SET '
			. "`Title`='!" . $pi++ . "!'"
			. ",`ParentID`=!" . $pi++ . "!"
			. ",`Description`='!" . $pi++ . "!'"
			. ",`ImageURL`='!" . $pi++ . "!'"
			. ",`ImageCrop`='!" . $pi++ . "!'"
			. ",`SortOrder`=!" . $pi++ . "!"
			. ",`ActiveFlag`=!" . $pi++ . "!";
		if($this->tableid == -1) {
			$insert = true;
			$sqlprepend = 'INSERT INTO `d_mba_image_category_definition`';
			$sqlappend = '';
		} else {
			$insert = false;
			$sqlprepend = 'UPDATE `d_mba_image_category_definition`';
			$sqlappend = ' WHERE `TableID`=!' . (sizeof($params) - 1) .'!';
		}
		$sql = $sqlprepend . ' ' . $setclause . ' ' . $sqlappend;
		$DB = DB::getReadWriteAccess();
		$DB->query($sql, $params);
		if(!$DB->errno) {
			if($insert)
			{
				$this->tableid = $DB->insert_id;
			}
			$this->errormessage = '';
			return true;
		} else {
			$this->errormessage = $DB->error;
			return false;
		}
	}
	
	public function delete() {
		$DB = DB::getReadWriteAccess();
		// If any other categories have this one as a parent simply return an error message.
		$sql = "SELECT COUNT(*) AS Count FROM `d_mba_image_category_definition` WHERE `ParentID`=!0!";
		$resp = $DB->query($sql, array($this->tableid));
		if($resp->fetch_object()->Count > 0) {
			$this->errormessage = 'You cannot delete this category because there is one or more categories currently using this as a parent category. Please remove the child categories from this category and then retry.';
			return false;
		}
		// If any products are associated with this category simply return an error message.
		$sql = "SELECT COUNT(*) AS Count FROM `m_mba_image_to_category` WHERE `CategoryID`=!0!";
		$resp = $DB->query($sql, array($this->tableid));
		if($resp->fetch_object()->Count > 0) {
			$this->errormessage = 'You cannot delete this category because there are products currently associated with it. Please remove the products from this category first and then retry.';
			return false;
		}
		$sql = "DELETE FROM `d_mba_image_category_definition` WHERE `TableID`=!0!";
		$DB->query($sql, array($this->tableid));
		if(!$DB->errno) {
			// Remove from the mapping tables
			$sql = "DELETE FROM `m_mba_image_to_category` WHERE `CategoryID`=!0!";
			$DB->query($sql, array($this->tableid));
			$this->setDataToDefaults();
			$this->errormessage = '';
			return true;
		} else {
			$thiserrormessage = $DB->error;
			return false;
		}
	}
	
	public function setAssociatedItemSortOrder($in = array()) {
		extract($in);
		if(!isset($ids) || !is_array($ids)) {
			$this->errormessage = 'Invalid input.';
			return false;
		}
		if($this->tableid < 1) {
			$this->errormessage = 'Cannot save associated item sort order before this object has been saved.';
			return false;
		}
		$DB = DB::getReadWriteAccess();
		$sql = "UPDATE `m_mba_image_to_category` SET `SortOrder`=!0! WHERE `CategoryID`=" . $this->tableid ." AND `ItemID`=!1!";
		$index = 0;
		foreach($ids as $id) {
			if(!filter_var($id, FILTER_VALIDATE_INT)) continue;
			$DB->query($sql, array($index, $id));
			$index++;
		}
	}
	// End public instance methods
}