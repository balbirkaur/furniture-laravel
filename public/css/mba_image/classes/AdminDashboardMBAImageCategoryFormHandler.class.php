<?
class AdminDashboardMBAImageCategoryFormHandler {
	
		public function formHandler($in = array()) {
			$SITECLASS = &$GLOBALS['SITE_SPECIFIC']['SITECLASS'];
			$USER = &$GLOBALS['SITE_SPECIFIC']['USER'];
			$PAGE = &$GLOBALS['SITE_SPECIFIC']['PAGE'];
			if(!$SITECLASS->permissionsCheck('EDITPAGES',$USER->AccessPermissions)) {
				ob_end_clean();
				header('Location: ' . $SITECLASS->urlNormalize(''));
				die();
			}
			if(!isset($GLOBALS['SITE_SPECIFIC']['FORM'])) {
				$GLOBALS['SITE_SPECIFIC']['FORM'] = array();
			}
			extract($_REQUEST, EXTR_PREFIX_ALL, 'form');
			$form_categoryid = isset($form_categoryid) && filter_var($form_categoryid, FILTER_VALIDATE_INT) ? $form_categoryid : -1;
			$GLOBALS['SITE_SPECIFIC']['FORM']['CATEGORYID'] = $form_categoryid;
			$GLOBALS['SITE_SPECIFIC']['FORM']['DISPLAY'] = isset($form_display) && $form_display ? $form_display : 'general';
			$posted = isset($form_incoming) && $form_incoming == 'AdminMBAImageCategory' && isset($form_action) ? true : false;
			if($posted) {
				switch($form_action) {
					case 'Update':
						$pc = new MBAImageCategory(array('id' => $form_categoryid));
						$pc->Title = isset($form_title) ? $form_title : null;
						$pc->ParentID = isset($form_parentid) ? $form_parentid : null;
						$pcp = new MBAImageCategory(array('id' => (isset($form_parentid) ? $form_parentid : -1)));
						$pcpcheck = $pcp->isDescendantOf(array('parentids' => array($form_categoryid)));
						if($pcpcheck) {
							$GLOBALS['SITE_SPECIFIC']['FORM']['ERROR'] = '<span class="text_error">You have an error in your parent category selection. Your selected parent category is currently a descendent of this category. This is a circular reference and is not allowed. Here is the offending category chain (listed as child => parent):<br />' . $pcpcheck . '</span>';
							break;
						}
						$pc->Description = isset($form_description) ? $form_description : null;
						$pc->ImageURL = isset($form_imageurl) ? $form_imageurl : null;
						$pc->ImageCrop = isset($form_imagecrop) ? $form_imagecrop : null;
						$pc->ActiveFlag = isset($form_activeflag) && $form_activeflag == 'true' ? 1 : 0;
						if($pc->save()) {
							$GLOBALS['SITE_SPECIFIC']['FORM']['ERROR'] = '<div class="form_response_message text_success">Your category entry has been successfully updated.</div>';
							$GLOBALS['SITE_SPECIFIC']['FORM']['CATEGORYID'] = $pc->ID;
						} else { 
							$GLOBALS['SITE_SPECIFIC']['FORM']['ERROR'] = '<div class="form_response_message text_error">' . $pc->ErrorMessage . '</div>';	
						}
						break;
					case 'Sort':
						if(isset($form_sortorder) && is_array($form_sortorder)) {
							$index = 0;
							foreach($form_sortorder as $so) {
								$pc = new MBAImageCategory(array('id' => $so));
								if($pc->ID < 1) continue;
								$pc->SortOrder = $index++;
								$pc->save();
							}
						}
						break;
					case 'AssociatedSort':
						$form_sortorder = isset($form_sortorder) && is_array($form_sortorder) ? $form_sortorder : array($form_sortorder);
						$pc = new MBAImageCategory(array('id' => $form_categoryid));
						$pc->setAssociatedItemSortOrder(array('ids' => $form_sortorder));
						break;
					case 'Delete':
						$pc = new MBAImageCategory(array('id' => $form_categoryid));
						if($pc->delete()) {
							$GLOBALS['SITE_SPECIFIC']['FORM']['ERROR'] = '<div class="form_response_message text_success">Your category entry has been deleted.</div>';
							$GLOBALS['SITE_SPECIFIC']['FORM']['CATEGORYID'] = -1;
						} else {
							$GLOBALS['SITE_SPECIFIC']['FORM']['ERROR'] = '<div class="form_response_message text_error">' . $pc->ErrorMessage . '</div>';	
						}
						break;
					case 'Select':
						break;
					default:
						$GLOBALS['SITE_SPECIFIC']['FORM']['ERROR'] = '<div class="form_response_message text_error">Invalid form submission request.</div>';
						break;
				}
			} else {
				$GLOBALS['SITE_SPECIFIC']['FORM']['ERROR'] = '<div class="form_response_message text_error">Invalid form submission.</div>';
			}
		}
		
}
