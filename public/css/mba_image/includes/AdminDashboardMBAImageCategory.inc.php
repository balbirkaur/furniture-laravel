<?
if(!defined('PROGRAMRUNNING')) {
	// Just crap out; for some reason we're not in the program environment.
	die();
}
$PAGE = &$GLOBALS['SITE_SPECIFIC']['PAGE'];
$SITECLASS = &$GLOBALS['SITE_SPECIFIC']['SITECLASS'];
$USER = &$GLOBALS['SITE_SPECIFIC']['USER'];
$IMAGELIMITER = &$GLOBALS['SITE_SPECIFIC']['IMAGELIMITER'];
if(!$SITECLASS->permissionsCheck('EDITPAGES',$USER->AccessPermissions)) {
	ob_end_clean();
	header('Location: /');
	die();
}
if(isset($_SESSION['SITE_SPECIFIC']['FORM'])) {
	$GLOBALS['SITE_SPECIFIC']['FORM'] = $_SESSION['SITE_SPECIFIC']['FORM'];
	unset($_SESSION['SITE_SPECIFIC']['FORM']);
} else {
	$GLOBALS['SITE_SPECIFIC']['FORM'] = array();
}
$display = isset($GLOBALS['SITE_SPECIFIC']['FORM']['DISPLAY']) ? $GLOBALS['SITE_SPECIFIC']['FORM']['DISPLAY'] : 'general';
$error = isset($GLOBALS['SITE_SPECIFIC']['FORM']['ERROR']) ? $GLOBALS['SITE_SPECIFIC']['FORM']['ERROR'] : false;
$categoryid = isset($GLOBALS['SITE_SPECIFIC']['FORM']['CATEGORYID']) ? $GLOBALS['SITE_SPECIFIC']['FORM']['CATEGORYID'] : -1;
$categories = MBAImageCategory::getAllArrayOfObjects();
$cats = array();
foreach($categories as $c) {
	$cats[$c->NameSpacedTitle] = $c;
}
ksort($cats);
$categories = $cats;
$sortedcategories = MBAImageCategory::getAllArrayOfObjects(array('sorted' => true));
$thiscategory = new MBAImageCategory(array('id' => $categoryid));
$associateditems = MBAImage::getAllArrayOfObjects(array('categoryid' => $thiscategory->ID));
$formid = $SITECLASS->formGetID();
$formhandler = 'AdminDashboardMBAImageCategoryFormHandler';
$SITECLASS->formSetHandler(array('formid' => $formid, 'formhandler' => $formhandler, 'staletime' => 30));
$itemformid = $SITECLASS->formGetID();
$formhandler = 'AdminDashboardMBAImageFormHandler';
$SITECLASS->formSetHandler(array('formid' => $itemformid, 'formhandler' => $formhandler, 'staletime' => 30));
?>
<link rel="stylesheet" href="<?=$SITECLASS->urlNormalize('css/site_admin.css') ?>" type="text/css" />
<link rel="stylesheet" href="<?=$SITECLASS->urlNormalize('modules/mba_image/css/adminmbaimagecategory.css') ?>" type="text/css" />
<script type="text/javascript" src="<?=$SITECLASS->urlNormalize('scripts/SiteAdmin.js') ?>"></script>
<script type="text/javascript" src="<?=$SITECLASS->urlNormalize('scripts/TinyMCE/plugins/imagemanager/js/mcimagemanager.js') ?>"></script>
<script type="text/javascript" src="<?=$SITECLASS->urlNormalize('modules/mba_image/scripts/adminmbaimagecategory.js') ?>"></script>
<section>
	<div class="admin_envelope">
		<header>
			Image Category Management
		</header>
		<?=$error ?>

		<div class="tabs_enclosure clearfix">
			<div id="tab_1" class="tab<?=($display == 'general' ? ' tab_hilite' : '') ?>" roas_which="general">
				General information
			</div>
			<div id="tab_2" class="tab<?=($display == 'associatedsort' ? ' tab_hilite' : '') ?>" roas_which="associatedsort">
				Associated item display order
			</div>
			<div id="tab_2" class="tab<?=($display == 'sort' ? ' tab_hilite' : '') ?>" roas_which="sort">
				Category display order
			</div>
		</div>

		<div id="general_formpart_enclosure"<?=$display == 'general' ? '' : ' class="hidden"' ?>>
			<form name="form_adminmbaimagecategory" action="<?=$SITECLASS->urlNormalize('admin/dashboard') ?>" method="post">
				<input type="hidden" name="formid" value="<?=$formid; ?>" />
				<input type="hidden" name="incoming" value="AdminMBAImageCategory" />
				<input type="hidden" name="action" value="Update" />
				<input type="hidden" name="dashboard[page]" value="image_categories" />
				<input type="hidden" name="dashboard[name]" value="image_categories" />
				<div class="item">
					Select a category to edit or create a new one:
					<select name="categoryid" onchange="document.form_adminmbaimagecategory.action.value='Select';document.form_adminmbaimagecategory.submit();">
						<option value="-1">Create new category</option>
						<? foreach($categories as $c) { ?>
							<option value="<?=$c->ID; ?>" <?=$c->ID == $thiscategory->ID ? 'selected ' : '' ?>><?=$c->NameSpacedTitle; ?></option>
						<? } ?>
					</select>
				</div>
				<div class="item">
					<input type="checkbox" name="activeflag" value="true" <?=$thiscategory->ActiveFlag ? 'checked="checked" ' : '' ?>/>
					Category is active
					<?
					$tit = 'Active Flag';
					$msg = 'Category must be marked active to be used. Inactive entries will be ignored.';
					?>
					<img class="site_help_message pointer" message="<?=$msg ?>" title="<?=$tit ?>" />
				</div>
				<div class="item">
					<label>
						Title
						<?
						$tit = 'Title';
						$msg = 'This is the system and displayed title for this category';
						?>
						<img class="site_help_message pointer" message="<?=$msg ?>" title="<?=$tit ?>" />
					</label>
					<input type="text" name="title" value="<?=$thiscategory->Title ?>" />
				</div>
				<div class="item">
					<label>
						Description
						<?
						$tit = 'Description';
						$msg = 'This description is generally intended to provide specific explanation as to what this tax is for, but this may be displayed depending on the layout design.';
						?>
						<img class="site_help_message pointer" message="<?=$msg ?>" title="<?=$tit ?>" />
					</label>
					<textarea name="description"><?=$thiscategory->Description ?></textarea>
				</div>
				<div class="item">
					<label>
						Parent category
						<?
						$tit = 'Parent category';
						$msg = 'Selecting a parent will make this category a subcategory of the selected parent. The system attempts to verify that there are no circular references so that you cannot select a child category of the current one as the parent. Additionally this category and this category\'s immediate children, if any, will not be displayed in the dropdown box.';
						?>
						<img class="site_help_message pointer" message="<?=$msg ?>" title="<?=$tit ?>" />
					</label>
					<select name="parentid">
						<option value="0">None</option>
						<? foreach($categories as $c) { ?>
							<? if($thiscategory->ID == $c->ID || $thiscategory->ID == $c->ParentID) continue; ?>
							<option value="<?=$c->ID; ?>" <?=$c->ID == $thiscategory->ParentID ? 'selected ' : '' ?>><?=$c->NameSpacedTitle ?></option>
						<? } ?>
					</select>
				</div>
				<div class="item">
					<label>
						Image
						<?
						$tit = 'Category Image';
						$msg = 'This is the image that will be used for item category listings. This image will be scaled to 110px X 110px with cropping as necessary.';
						?>
						<img class="site_help_message pointer" message="<?=$msg ?>" title="<?=$tit ?>" />
						<a href="javascript:" onclick="adminmbaimagecategory.addMBAImageCategoryImage();">[add/edit item image]</a>
					</label>
					<input type="text" name="imageurl" value="<?=$thiscategory->ImageURL ?>" onchange="adminmbaimagecategory.updateMBAImageCategoryImage({'url':this.value});" />
					<div id="adminmbaimagecategory_image_envelope" class="clearfix<?=$thiscategory->ImageURL ? '' : ' hidden' ?>">
						<img id="adminmbaimagecategory_image_display" class="adminmbaimagecategory_image_display" cropsource="imagecrop" height="110" width="110" src="<?=$thiscategory->ImageURL ? $IMAGELIMITER->getCachedImageFileURL('h=110&w=110&crop=' . $thiscategory->ImageCrop . '&img=' . $thiscategory->ImageURL) : '' ?>" />
						<label>
							Cropping
						</label>
						<select name="imagecrop" onchange="adminmbaimagecategory.changeMBAImageCategoryImageCrop({'which':'#adminmbaimagecategory_image_display'});">
							<option value="middle"<?=$thiscategory->ImageCrop == 'middle' ? ' selected="selected"' : '' ?>>middle</option>
							<option value="top"<?=$thiscategory->ImageCrop == 'top' ? ' selected="selected"' : '' ?>>top</option>
							<option value="bottom"<?=$thiscategory->ImageCrop == 'bottom' ? ' selected="selected"' : '' ?>>bottom</option>
							<option value="left"<?=$thiscategory->ImageCrop == 'left' ? ' selected="selected"' : '' ?>>left</option>
							<option value="right"<?=$thiscategory->ImageCrop == 'right' ? ' selected="selected"' : '' ?>>right</option>
						</select>
					</div>
				</div>
				<div class="item">
					<input type="reset" value="Reset" />
					<input type="submit" value="Submit" />
					<? if($thiscategory->ID > 0) { ?>
						<input type="submit" value="Delete" onclick="if(!confirm('Are you sure you want to delete this category? This action cannot be undone.'))return false;document.form_adminmbaimagecategory.action.value='Delete';document.form_adminmbaimagecategory.submit();" />
					<? } ?>
				</div>
			</form>
		</div>
		
		<div id="associatedsort_formpart_enclosure"<?=$display == 'associatedsort' ? '' : ' class="hidden"' ?>>
			<form name="form_adminmbaimage" action="<?=$SITECLASS->urlNormalize('admin/dashboard') ?>" method="post">
				<input type="hidden" name="formid" value="<?=$itemformid; ?>" />
				<input type="hidden" name="incoming" value="AdminMBAImage" />
				<input type="hidden" name="action" value="Select" />
				<input type="hidden" name="display" value="general" />
				<input type="hidden" name="itemid" value="" />
				<input type="hidden" name="dashboard[page]" value="image_management" />
				<input type="hidden" name="dashboard[name]" value="image_management" />
			</form>
			<form name="form_adminmbaimagecategory_associatedsort" action="<?=$SITECLASS->urlNormalize('admin/dashboard') ?>" method="post">
				<input type="hidden" name="formid" value="<?=$formid; ?>" />
				<input type="hidden" name="incoming" value="AdminMBAImageCategory" />
				<input type="hidden" name="action" value="AssociatedSort" />
				<input type="hidden" name="display" value="associatedsort" />
				<input type="hidden" name="categoryid" value="<?=$categoryid ?>" />
				<input type="hidden" name="dashboard[page]" value="image_categories" />
				<input type="hidden" name="dashboard[name]" value="image_categories" />
				<div class="item">
					Display order will be taken left to right and top to bottom.
				</div>
				<div class="item">
					<input type="submit" value="Save display order" />
				</div>
				<div class="adminmbaimagecategory_associateditem_droppable clearfix">
				<? foreach($associateditems as $c) { ?>
					<div class="adminmbaimagecategory_associateditem_draggable<?=$c->ActiveFlag ? ' active' : ' inactive' ?>">
						<input type="hidden" name="sortorder[]" value="<?=$c->ID ?>" />
						<label>
							<?=$c->Title ?> <a href="javascript:" onclick="document.form_adminmbaimage.itemid.value=<?=$c->ID ?>;document.form_adminmbaimage.submit();">[edit item]</a>
						</label>
						<? if($c->ImageURL) { ?>
							<img class="adminmbaimage_associateditem_image_display" src="<?=$IMAGELIMITER->getCachedImageFileURL('h=100&w=216&crop=' . $c->ImageCrop . '&img=' . $c->ImageURL) ?>" />
						<? } ?>
					</div>
				<? } ?>
				</div>
				<div class="item">
					<input type="submit" value="Save display order" />
				</div>
			</form>
		</div>

		<div id="sort_formpart_enclosure"<?=$display == 'sort' ? '' : ' class="hidden"' ?>>
			<form name="form_adminmbaimagecategory_sort" action="<?=$SITECLASS->urlNormalize('admin/dashboard') ?>" method="post">
				<input type="hidden" name="formid" value="<?=$formid; ?>" />
				<input type="hidden" name="incoming" value="AdminMBAImageCategory" />
				<input type="hidden" name="action" value="Sort" />
				<input type="hidden" name="display" value="sort" />
				<input type="hidden" name="dashboard[page]" value="image_categories" />
				<input type="hidden" name="dashboard[name]" value="image_categories" />
				<div class="item">
					Display order will be taken left to right and top to bottom.
				</div>
				<div class="item">
					<input type="submit" value="Save display order" />
				</div>
				<div class="adminmbaimagecategory_droppable clearfix">
				<? foreach($sortedcategories as $c) { ?>
					<div class="adminmbaimagecategory_draggable<?=$c->ActiveFlag ? ' active' : ' inactive' ?>">
						<input type="hidden" name="sortorder[]" value="<?=$c->ID ?>" />
						<label>
							<?=$c->Title ?> <a href="javascript:" onclick="document.form_adminmbaimagecategory.categoryid.value=<?=$c->ID ?>;document.form_adminmbaimagecategory.action.value='Select';document.form_adminmbaimagecategory.submit();">[edit item]</a>
						</label>
						<? if($c->ImageURL) { ?>
							<img class="adminmbaimage_image_display" src="<?=$IMAGELIMITER->getCachedImageFileURL('h=100&w=216&crop=' . $c->ImageCrop . '&img=' . $c->ImageURL) ?>" />
						<? } ?>
					</div>
				<? } ?>
				</div>
				<div class="item">
					<input type="submit" value="Save display order" />
				</div>
			</form>
		</div>
	</div>
</section>
