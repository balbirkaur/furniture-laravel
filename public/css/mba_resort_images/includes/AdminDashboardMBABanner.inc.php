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
$itemid = isset($GLOBALS['SITE_SPECIFIC']['FORM']['ITEMID']) ? $GLOBALS['SITE_SPECIFIC']['FORM']['ITEMID'] : -1;
$items = MBABanner::getAllArrayOfObjects();
$sorteditems = MBABanner::getAllArrayOfObjects(array('sorted' => true));
$thisitem = new MBABanner(array('id' => $itemid));
$formid = $SITECLASS->formGetID();
$formhandler = 'AdminDashboardMBABannerFormHandler';
$SITECLASS->formSetHandler(array('formid' => $formid, 'formhandler' => $formhandler, 'staletime' => 30));
$imgsize = array('height' => 90, 'width' => 170);
?>
<link rel="stylesheet" href="<?= $SITECLASS->urlNormalize('css/site_admin.css') ?>" type="text/css" />
<link rel="stylesheet" href="<?= $SITECLASS->urlNormalize('modules/mba_banner/css/adminmbaimage.css') ?>" type="text/css" />
<script type="text/javascript" src="<?= $SITECLASS->urlNormalize('scripts/SiteAdmin.js') ?>"></script>
<script type="text/javascript" src="<?= $SITECLASS->urlNormalize('scripts/TinyMCE/plugins/imagemanager/js/mcimagemanager.js') ?>"></script>
<script type="text/javascript" src="<?= $SITECLASS->urlNormalize('modules/mba_banner/scripts/adminmbabanner.js') ?>"></script>
<section>
	<div class="admin_envelope">
		<header>
			Image Management
		</header>
		<?= $error ?>

		<div class="tabs_enclosure clearfix">
			<div id="tab_1" class="tab<?= ($display != 'sort' ? ' tab_hilite' : '') ?>" roas_which="general">
				General information
			</div>
			<div id="tab_2" class="tab<?= ($display == 'sort' ? ' tab_hilite' : '') ?>" roas_which="sort">
				Default display order
			</div>
		</div>

		<div id="general_formpart_enclosure" <?= $display == 'general' ? '' : ' class="hidden"' ?>>
			<form name="form_adminmbaimage" action="<?= $SITECLASS->urlNormalize('admin/dashboard') ?>" method="post">
				<input type="hidden" name="formid" value="<?= $formid; ?>" />
				<input type="hidden" name="incoming" value="AdminMBABanner" />
				<input type="hidden" name="action" value="Update" />
				<input type="hidden" name="display" value="general" />
				<input type="hidden" name="dashboard[page]" value="banner_management" />
				<input type="hidden" name="dashboard[name]" value="banner_management" />
				<div class="item">
					Select an item to edit or create a new one:
					<select name="itemid" onchange="document.form_adminmbaimage.action.value='Select';document.form_adminmbaimage.submit();">
						<option value="-1">Create new item</option>
						<? foreach($items as $i) { ?>
						<option value="<?= $i->ID; ?>" <?= $i->ID == $thisitem->ID ? 'selected ' : '' ?>><?= $i->Title; ?></option>
						<? } ?>
					</select>
				</div>
				<div class="item">
					<input type="checkbox" name="activeflag" value="true" <?= $thisitem->ActiveFlag ? 'checked="checked" ' : '' ?> />
					Item is active
					<?
					$tit = 'Active Flag';
					$msg = 'This entry must be marked active to be used. Inactive entries will be ignored.';
					?>
					<img class="site_help_message pointer" message="<?= $msg ?>" title="<?= $tit ?>" />
				</div>
				<div class="item">
					<label>
						Title
						<?
						$tit = 'Title';
						$msg = 'This is the system and displayed title for this entry';
						?>
						<img class="site_help_message pointer" message="<?= $msg ?>" title="<?= $tit ?>" />
					</label>
					<input type="text" name="title" value="<?= $thisitem->Title ?>" />
				</div>

				<? /*	<div class="item">
					<label>
						Description
						<?
						$tit = 'Description';
						$msg = 'This description is generally intended to provide specific explanation as to what this tax is for, but this may be displayed depending on the layout design.';
						?>
				<img class="site_help_message pointer" message="<?= $msg ?>" title="<?= $tit ?>" />
				</label>
				<textarea name="description"><?= $thisitem->Description ?></textarea>
		</div>
		*/ ?>
		<div class="item">
			<label>
				HTML content
				<?
						$tit = 'HTML Content';
						$msg = 'This is the HTML content display for this entry.';
						?>
				<img class="site_help_message pointer" message="<?= $msg ?>" title="<?= $tit ?>" />
			</label>
			<textarea id="tmce_htmlcontent" name="description"><?= $thisitem->Description ?></textarea>
		</div>

		<div class="item">
			<label>
				Image
				<?
						$tit = 'Item Image';
						$msg = 'This is the image that will be used for item listings. This image will be scaled to ' . $imgsize['width'] . 'px X  ' . $imgsize['height'] . 'px with cropping as necessary. The images displayed below may not be actual size, but they are the same proportions as the final display.';
						?>
				<img class="site_help_message pointer" message="<?= $msg ?>" title="<?= $tit ?>" />
				<a href="javascript:" onclick="adminmbaimage.addMBABannerImage();">[add/edit item image]</a>
			</label>
			<input type="text" name="imageurl" value="<?= $thisitem->ImageURL ?>" onchange="adminmbaimage.updateMBABannerImage({'url':this.value});" />
			<div id="adminmbaimage_image_envelope" class="clearfix<?= $thisitem->ImageURL ? '' : ' hidden' ?>">
				<div class="clearfix">
					<div style="float:left;margin-right:20px;">
						Cropped version<br />
						<img id="adminmbaimage_image_display" class="adminmbaimage_image_display" full="#adminmbaimage_image_display_full" cropsource="imagecrop" height="<?= $imgsize['height'] ?>" width="<?= $imgsize['width'] ?>" src="<?= $thisitem->ImageURL ? $IMAGELIMITER->getCachedImageFileURL('h=' . $imgsize['height'] . '&w=' . $imgsize['width'] . '&crop=' . $thisitem->ImageCrop . '&img=' . $thisitem->ImageURL) : '' ?>" />
					</div>
					<div style="float:left">
						Full image<br />
						<img id="adminmbaimage_image_display_full" height="<?= $imgsize['height'] ?>" src="<?= $thisitem->ImageURL ? $IMAGELIMITER->getCachedImageFileURL('h=' . $imgsize['height'] . '&img=' . $thisitem->ImageURL) : '' ?>" />
					</div>
				</div>
				<label>
					Cropping
				</label>
				<select name="imagecrop" onchange="adminmbaimage.changeMBABannerImageCrop({'which':'#adminmbaimage_image_display'});">
					<option value="middle" <?= $thisitem->ImageCrop == 'middle' ? ' selected="selected"' : '' ?>>middle</option>
					<option value="top" <?= $thisitem->ImageCrop == 'top' ? ' selected="selected"' : '' ?>>top</option>
					<option value="bottom" <?= $thisitem->ImageCrop == 'bottom' ? ' selected="selected"' : '' ?>>bottom</option>
					<option value="left" <?= $thisitem->ImageCrop == 'left' ? ' selected="selected"' : '' ?>>left</option>
					<option value="right" <?= $thisitem->ImageCrop == 'right' ? ' selected="selected"' : '' ?>>right</option>
				</select>
			</div>
		</div>
		<div class="item">
			<input type="reset" value="Reset" />
			<input type="submit" value="Submit" />
			<? if($thisitem->ID > 0) { ?>
			<input type="submit" value="Delete" onclick="if(!confirm('Are you sure you want to delete this entry? This action cannot be undone.'))return false;document.form_adminmbaimage.action.value='Delete';document.form_adminmbaimage.submit();" />
			<? } ?>
		</div>
		</form>
	</div>

	<div id="sort_formpart_enclosure" <?= $display == 'sort' ? '' : ' class="hidden"' ?>>
		<form name="form_adminmbaimage_sort" action="<?= $SITECLASS->urlNormalize('admin/dashboard') ?>" method="post">
			<input type="hidden" name="formid" value="<?= $formid; ?>" />
			<input type="hidden" name="incoming" value="AdminMBABanner" />
			<input type="hidden" name="action" value="Sort" />
			<input type="hidden" name="display" value="sort" />
			<input type="hidden" name="dashboard[page]" value="banner_management" />
			<input type="hidden" name="dashboard[name]" value="banner_management" />
			<div class="item">
				Display order will be taken left to right and top to bottom.
			</div>
			<div class="item">
				<input type="submit" value="Save display order" />
			</div>
			<div id="adminmbaimage_droppable_box" class="adminmbaimage_droppable clearfix">
				<? foreach($sorteditems as $i) { ?>
				<div id="mbaimage<?= $i->ID ?>" class="adminmbaimage_draggable<?= $i->ActiveFlag ? ' active' : ' inactive' ?>">
					<input type="hidden" name="sortorder[]" value="<?= $i->ID ?>" />
					<label>
						<?= $i->Title ?> <a href="javascript:" onclick="document.form_adminmbaimage.itemid.value=<?= $i->ID ?>;document.form_adminmbaimage.action.value='Select';document.form_adminmbaimage.submit();">[edit item]</a>
					</label>
					<? if($i->ImageURL) { ?>
					<img id="adminmbaimage_image_display" class="adminmbaimage_image_display" src="<?= $IMAGELIMITER->getCachedImageFileURL('h=' . $imgsize['height'] . '&w=' . $imgsize['width'] . '&crop=' . $i->ImageCrop . '&img=' . $i->ImageURL) ?>" />
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