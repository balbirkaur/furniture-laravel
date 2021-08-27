<?

/**
**
** NOTE: THIS CLASS IS INTENDED AS A TEMPLATE ONLY AND SHOULD NOT BE USED AS IS.
**
**/

class MBABanner extends SiteBase {
	
	// Public class methods
	/**
	 * Retrieves an array of MBABanner objects.
	 * $in = a name/value pair array consisting of
	 *	'activeonly' = if set to true will retrieve only those marked as active, if set to false will retrieve only
	 *	those not marked as active, and if not set at all will retrieve all
	 *	'categoryid' = if set will retrieve only those items that are linked via the mapping table to that category
	 *	'limit' = the limit value of a MySQL LIMIT clause, if not set then no LIMIT clause is included
	 *	'start' = the start value for a MySQL LIMIT clause, if 'limit' is not set to a valid value this will be ignored,
	 *	and if this value is not set it is ignored.
	 *	'sorted' = if set to true then will do initial sorting by the default sort and then, if categoryid is specificied, by
	 *	the category sorting
	 *
	 *	Returns an array of objects.
	 */
	public static function getAllArrayOfObjects($in = array()) {
		extract($in);
		$join = false;
		$orderby = '';
		$sqlappend = '';
		$sqlargs = array();
		$sqlargsindex = 0;
		if(isset($activeonly)) {
			$sqlappend .= ($sqlappend ? ' AND' : '') . ' t1.`ActiveFlag`=!' . $sqlargsindex++ . '!';
			$sqlargs[] = $activeonly ? 1 : 0;
		}
		
		if(isset($sorted) && $sorted) {
			$orderby .= ($orderby ? ',' : " ORDER BY ") . "t1.`SortOrder`";
		}

		$sqlappend = ($sqlappend ? ' WHERE' . $sqlappend : '') . $orderby;
		if(isset($limit) && filter_var($limit, FILTER_VALIDATE_INT)) {
			$sqlappend .= ' LIMIT ' . (isset($start) && filter_var($start, FILTER_VALIDATE_INT) ? $start . ',' : '') . $limit;
		}
		$return = array();
		$DB = DB::getReadOnlyAccess();
		$sql = "SELECT t1.`TableID` FROM `d_mba_banner_definition` AS t1" . $sqlappend;
		$resp = $DB->query($sql, $sqlargs);
		while($r = $resp->fetch_object()) {
			$return[] = new MBABanner(array('id' => $r->TableID));
		}
		return $return;
	}
	/**
	 * Retrieves the count of MBABanner objects meeting the set criteria.
	 * $in = a name/value pair array consisting of
	 *	'activeonly' = if set to true will count only those marked as active, if set to false will count only
	 *	those not marked as active, and if not set at all will count all
	 *	'categoryid' = if set will retrieve only those items that are linked via the mapping table to that category
	 *
	 *	Returns an array of objects.
	 */
	public static function getCountOfObjects($in = array()) {
		extract($in);
		$join = false;
		$sqlappend = '';
		$sqlargs = array();
		$sqlargsindex = 0;
		if(isset($activeonly)) {
			$sqlappend .= ($sqlappend ? ' AND' : '') . ' t1.`ActiveFlag`=!' . $sqlargsindex++ . '!';
			$sqlargs[] = $activeonly ? 1 : 0;
		}
		
		$sqlappend = $sqlappend ? ' WHERE' . $sqlappend : $sqlappend;
		$return = array();
		$DB = DB::getReadOnlyAccess();
		$sql = "SELECT COUNT(t1.`TableID`) AS Count FROM `d_mba_banner_definition` AS t1" . $sqlappend;
		return $DB->query($sql, $sqlargs)->fetch_object()->Count;
	}
	// End public class methods
	
	// Public class data
	// End public class data
	
	// Private class methods
	// End private class methods
	
	// Private instance data
	private $tableid;
	// End private instance data
	
	// Protected instance data
	protected $title;
	protected $description;
	protected $htmlcontent;
	protected $imageurl;
	protected $imagecrop;
	protected $sortorder;
	protected $activeflag;
	protected $timestamp;
	// Error messaging
	protected $errormessage;

	
	// Private instance methods
	private function setDataToDefaults() {
		$this->tableid = -1;
		$this->title = null;
		$this->description = null;
		$this->htmlcontent = null;
		$this->imageurl = null;
		$this->imagecrop = null;
		$this->sortorder = 0;
		$this->activeflag = null;
		$this->timestamp = '';
		$this->errormessage = '';
		
	}
	
	private function setData($r) {
		$this->tableid = $r->TableID;
		$this->title = $r->Title;
		$this->description = $r->Description;
		$this->htmlcontent = $r->HTMLContent;
		$this->imageurl = $r->ImageURL;
		$this->imagecrop = $r->ImageCrop;
		$this->sortorder = $r->SortOrder;
		$this->activeflag = $r->ActiveFlag;
		$this->timestamp = $r->TimeStamp;
	}
	// End private instance methods
	

	
	// Public instance methods
	/**
	 * $in = name/value array consisting of
	 *	'id' = the database table id for this MBABanner
	 *	'activeonly' = if set to any 'true' value then a match must be active, if present and set to any
	 *								 'false' value then a match must be set to inactive.
	 */
	public function __construct($in = array()) {
		$this->setDataToDefaults();
		extract($in);
		$id = isset($id) && Math::checkIntegerValue($id) ? $id : -1;
		$sqlappend = isset($activeonly) ? (' AND `ActiveFlag`=' . ($activeonly ? '1' : '0')) : '';
		$DB = DB::getReadOnlyAccess();
		$sql = "SELECT * FROM `d_mba_banner_definition` WHERE `TableID`=!0!" . $sqlappend;
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
			case 'Description':
				return $this->description;
			case 'HTMLContent':
				return $this->htmlcontent;
			case 'ImageURL':
				return is_file(SITE_DOCUMENT_ROOT . $this->imageurl) ? $this->imageurl : null;
			case 'ImageCrop':
				return $this->imagecrop;
			case 'SortOrder':
				return $this->sortorder;
			case 'ActiveFlag':
				return $this->activeflag;
			case 'TimeStamp':
				return $this->timestamp;
			case 'ErrorMessage':
				return $this->errormessage;
			
			default:
				return false;
		}
	}
	
	public function __set($k, $v) {
		switch($k) {
			case 'Title':
				$this->title = $v ? $v : null;
				break;
			case 'Description':
				$this->description = $v ? $v : null;
				break;
			case 'HTMLContent':
				$this->htmlcontent = $v ? $v : null;
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
	
	public function save() {
		$params = array(
			$this->title,
			$this->description,
			$this->htmlcontent,
			$this->imageurl,
			$this->imagecrop,
			$this->sortorder,
			$this->activeflag,
			$this->tableid
		);
		$pi = 0;
		$setclause = 'SET '
			. "`Title`='!" . $pi++ . "!'"
			. ",`Description`='!" . $pi++ . "!'"
			. ",`HTMLContent`='!" . $pi++ . "!'"
			. ",`ImageURL`='!" . $pi++ . "!'"
			. ",`ImageCrop`='!" . $pi++ . "!'"
			. ",`SortOrder`=!" . $pi++ . "!"
			. ",`ActiveFlag`=!" . $pi++ . "!";
		if($this->tableid == -1) {
			$insert = true;
			$sqlprepend = 'INSERT INTO `d_mba_banner_definition`';
			$sqlappend = '';
		} else {
			$insert = false;
			$sqlprepend = 'UPDATE `d_mba_banner_definition`';
			$sqlappend = 'WHERE `TableID`=!' . (sizeof($params) - 1) .'!';
		}
		$sql = $sqlprepend . ' ' . $setclause . ' ' . $sqlappend;
		$DB = DB::getReadWriteAccess();
		$DB->query($sql, $params);
	//	print_R($DB->ErrorArray);
	
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
		$sql = "DELETE FROM `d_mba_banner_definition` WHERE `TableID`=!0!";
		$DB->query($sql, array($this->tableid));
		if(!$DB->errno) {
		
			$this->setDataToDefaults();
			$this->errormessage = '';
			return true;
		} else {
			$thiserrormessage = $DB->error;
			return false;
		}
	}
	// End public instance methods
}