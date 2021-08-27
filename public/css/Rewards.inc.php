<?
if(!defined('PROGRAMRUNNING')) {
	// Just crap out; for some reason we're not in the program environment.
	die();
}
$PAGE = &$GLOBALS['SITE_SPECIFIC']['PAGE'];
$SITECLASS = &$GLOBALS['SITE_SPECIFIC']['SITECLASS'];
$USER = &$GLOBALS['SITE_SPECIFIC']['USER'];
if(!isset($GLOBALS['SITE_SPECIFIC']['EditableElements'])) {
	$GLOBALS['SITE_SPECIFIC']['EditableElements'] = array();
}
$default_columnright_dynamiccontent = sizeof($GLOBALS['SITE_SPECIFIC']['EditableElements']);
$edel = array();
$edel['id'] = 'default_columnright_dynamiccontent';
$edel['editwindow_style'] = 'background:white;top:100px;width:822px;';
$edel['editwindow_textarea_style'] = 'height:350px;width:822px;';
$edel['tmce_body_class'] = 'tmce_default_columnright_dynamiccontent';
$edel['tmce_content_css'] = $SITECLASS->urlNormalize('css/reset.css') . ',' . $SITECLASS->urlNormalize('modules/mba/css/site.css');
$GLOBALS['SITE_SPECIFIC']['EditableElements'][$default_columnright_dynamiccontent] = $edel;
$default_columnleft_dynamiccontent = sizeof($GLOBALS['SITE_SPECIFIC']['EditableElements']);
$edel = array();
$edel['id'] = 'default_columnleft_dynamiccontent';
$edel['editwindow_style'] = 'background:white;top:100px;width:400px;';
$edel['editwindow_textarea_style'] = 'height:350px;width:280px;';
$edel['tmce_body_class'] = 'tmce_default_columnleft_dynamiccontent';
$edel['tmce_content_css'] = $SITECLASS->urlNormalize('css/reset.css') . ',' . $SITECLASS->urlNormalize('modules/mba/css/site.css');
$GLOBALS['SITE_SPECIFIC']['EditableElements'][$default_columnleft_dynamiccontent] = $edel;

$default_columnmid_dynamiccontent = sizeof($GLOBALS['SITE_SPECIFIC']['EditableElements']);
$edel = array();
$edel['id'] = 'default_columnmid_dynamiccontent';
$edel['editwindow_style'] = 'background:white;top:100px;width:400px;';
$edel['editwindow_textarea_style'] = 'height:350px;width:280px;';
$edel['tmce_body_class'] = 'default_columnmid_dynamiccontent';
$edel['tmce_content_css'] = $SITECLASS->urlNormalize('css/reset.css') . ',' . $SITECLASS->urlNormalize('modules/mba/css/site.css');
$GLOBALS['SITE_SPECIFIC']['EditableElements'][$default_columnmid_dynamiccontent] = $edel;
?>
<!-- begin page content -->
<!-- INNER-BANNER -->
<div class="inner-banner style-6">
	<img class="center-image-3" src="<?= $SITECLASS->urlNormalize('modules/mba/images/rewards-header1.jpg') ?>" alt="">
	<!--<div class="page-title">
		<div class="vertical-align">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h1>Suite Rewards</h1>
					</div>
				</div>
			</div>
		</div>
	</div>-->
</div>
<div class="detail-wrapper grey">
	<div class="container ">
		<div class="row ">
			<div class="col-12">
				<h1> Our Mission</h1>
			</div>
		</div>
	</div>
</div>
<div class="detail-wrapper">
	<div class="container">
		<div class="row padd-30-30">
			<div class="col-xl-12 col-sm-11 col-sm-offset-1">
				<div class="detail-content top_desc">

					<div class="<?= $SITECLASS->permissionsCheck(array('EDITPAGES'), $USER->AccessPermissions) ? 'cms_edit_div ' : '' ?>clearfix" id="default_columnmid_dynamiccontent" roas_editable_element="<?= $default_columnmid_dynamiccontent ?>">
						<?
						$content = $PAGE->getDynamicContent(array('name' => 'default_columnmid_dynamiccontent'));
						print $content;
					?>
					</div>
				</div>
				<div class="detail-content">
					<div class="trapezoid">
						<h3>Your Gateway Matters:</h3>
					</div>
					<div class="<?= $SITECLASS->permissionsCheck(array('EDITPAGES'), $USER->AccessPermissions) ? 'cms_edit_div ' : '' ?>clearfix" id="default_columnleft_dynamiccontent" roas_editable_element="<?= $default_columnleft_dynamiccontent ?>">
						<?
						$content = $PAGE->getDynamicContent(array('name' => 'default_columnleft_dynamiccontent'));
						print $content;
					?>
					</div>

				</div>
				<div class="detail-content">
					<div class="trapezoid">
						<h3>What Now:</h3>
					</div>
					<div class="<?= $SITECLASS->permissionsCheck(array('EDITPAGES'), $USER->AccessPermissions) ? 'cms_edit_div ' : '' ?>clearfix" id="default_columnright_dynamiccontent" roas_editable_element="<?= $default_columnright_dynamiccontent ?>">
						<?
						$content = $PAGE->getDynamicContent(array('name' => 'default_columnright_dynamiccontent'));
						print $content;
					?>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- end page content -->