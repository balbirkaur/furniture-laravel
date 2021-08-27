function AdminMBABanner(inob) {
	var _this = this;
	this.addMBABannerImage = function (inob) {
		mcImageManager.browse({
			'oninsert': this._addMBABannerImage_callback
		});
	}
	this._addMBABannerImage_callback = function (w) {
		var newf = w.focusedFile.path;
		newf = newf.replace('{0}', 'uploads');
		_this.updateMBABannerImage({
			'url': newf
		});
	}
	this.updateMBABannerImage = function (inob) {
		$('form[name=form_adminmbaimage] input[name=imageurl]').val(inob.url);
		if (inob.url) {
			$('#adminmbaimage_image_envelope').css({
				'display': 'block'
			});
			$('.adminmbaimage_image_display').each(function (i, e) {
				_this.changeMBABannerImageCrop({
					'which': '#' + $(e).attr('id')
				});
			});
		} else {
			$('#adminmbaimage_image_envelope').css({
				'display': 'none'
			});
		}
	}
	this.changeMBABannerImageCrop = function (inob) {
		var i, h, w, c, whch = $(inob.which);
		i = $('form[name=form_adminmbaimage] input[name=imageurl]').val();
		h = whch.attr('height');
		w = whch.attr('width');
		c = $('form[name=form_adminmbaimage] select[name=' + $(inob.which).attr('cropsource') + ']').val();
		whch.attr('src', '/imagelimiter.php?crop=' + c + '&w=' + w + '&h=' + h + '&img=' + i);
		whch = $(whch.attr('full'));
		h = whch.attr('height');
		whch.attr('src', '/imagelimiter.php?h=' + h + '&img=' + i);
	}
}
var adminmbaimage;
$(function () {
	adminmbaimage = new AdminMBABanner();
	$('#tmce_htmlcontent').tinymce({
		'script_url': '/scripts/TinyMCE/tiny_mce_gzip.php',
		'doctype': '<!doctype html>',
		'remove_script_host': true,
		'relative_urls': false,
		'body_class': '',
		'theme': 'advanced',
		'plugins': 'safari,spellchecker,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager',
		'theme_advanced_buttons1': 'newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect',
		'theme_advanced_buttons2': 'cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,code,|,insertdate,inserttime,preview',
		'theme_advanced_buttons3': 'tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl',
		'theme_advanced_buttons4': 'insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,forecolor,backcolor',
		'theme_advanced_toolbar_location': 'external',
		'theme_advanced_toolbar_align': 'left',
		'theme_advanced_statusbar_location': 'bottom',
		'theme_advanced_resizing': true,
		'theme_advanced_resize_horizontal': false,
		'extended_valid_elements': 'script[type|src],object[width|height|classid|codebase],param[name|value],embed[src|type|width|height|flashvars|wmode]',
		'theme_advanced_font_sizes': '8pt,10pt,12pt,14pt,16pt,18pt,20pt,22pt,24pt,26pt,28pt,30pt,32pt,36pt,40pt',
		'content_css': '/css/reset.css,/css/site.css'
	});
	$('.adminmbaimage_droppable').each(function (i, e) {
		e = $(e);
		var eid = '#' + e.attr('id');
		e.droppable({
			'accept': '.adminmbaimage_draggable',
			'activeClass': 'ui-state-highlight',
			'greedy': true,
			'tolerance': 'pointer'
		});
		e.sortable({
			'connectWith': '.adminmbaimage_droppable',
			'cursor': 'move',
			'placeholder': 'adminmbaimage_sortable-placeholder',
			'scroll': 'true'
		});
	});
});