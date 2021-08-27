<?
class AdminDashboardMBABannerFormHandler {
	
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
			$form_itemid = isset($form_itemid) && filter_var($form_itemid, FILTER_VALIDATE_INT) ? $form_itemid : -1;
			$GLOBALS['SITE_SPECIFIC']['FORM']['ITEMID'] = $form_itemid;
			$GLOBALS['SITE_SPECIFIC']['FORM']['DISPLAY'] = isset($form_display) && $form_display ? $form_display : 'general';
			$posted = isset($form_incoming) && $form_incoming == 'AdminMBABanner' && isset($form_action) ? true : false;
			if($posted) {
				switch($form_action) {
					case 'Update':
						$i = new MBABanner(array('id' => $form_itemid));
						$i->Title = isset($form_title) ? $form_title : null;
						$i->Description = isset($form_description) ? $form_description : null;
						$i->HTMLContent = isset($form_htmlcontent) ? $form_htmlcontent : null;
						$i->ImageURL = isset($form_imageurl) ? $form_imageurl : null;
						$i->ImageCrop = isset($form_imagecrop) ? $form_imagecrop : null;
						$i->ActiveFlag = isset($form_activeflag) && $form_activeflag == 'true' ? 1 : 0;
						if($i->save()) {
							
							$GLOBALS['SITE_SPECIFIC']['FORM']['ERROR'] = '<div class="form_response_message text_success">Your item entry has been successfully updated.</div>';
							$GLOBALS['SITE_SPECIFIC']['FORM']['ITEMID'] = $i->ID;
						} else { 
							$GLOBALS['SITE_SPECIFIC']['FORM']['ERROR'] = '<div class="form_response_message text_error">' . $i->ErrorMessage . '</div>';	
						}
						break;
					case 'Sort':
						if(isset($form_sortorder) && is_array($form_sortorder)) {
							$index = 0;
							foreach($form_sortorder as $so) {
								$i = new MBABanner(array('id' => $so));
								if($i->ID < 1) continue;
								$i->SortOrder = $index++;
								$i->save();
							}
						}
						break;
					case 'Delete':
						$i = new MBABanner(array('id' => $form_itemid));
						if($i->delete()) {
							$GLOBALS['SITE_SPECIFIC']['FORM']['ERROR'] = '<div class="form_response_message text_success">Your item entry has been deleted.</div>';
							$GLOBALS['SITE_SPECIFIC']['FORM']['ITEMID'] = -1;
						} else {
							$GLOBALS['SITE_SPECIFIC']['FORM']['ERROR'] = '<div class="form_response_message text_error">' . $i->ErrorMessage . '</div>';	
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