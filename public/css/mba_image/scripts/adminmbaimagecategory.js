function AdminMBAImageCategory(inob) {
	var _this = this;
	this.addMBAImageCategoryImage = function(inob) {
		mcImageManager.browse({'oninsert':this._addMBAImageCategoryImage_callback});
	}
	this._addMBAImageCategoryImage_callback = function(w) {
		var newf = w.focusedFile.path;
		newf = newf.replace('{0}', 'uploads');
		_this.updateMBAImageCategoryImage({'url':newf});
	}
	this.updateMBAImageCategoryImage = function(inob) {
		$('form[name=form_adminmbaimagecategory] input[name=imageurl]').val(inob.url);
		if(inob.url) {
			$('#adminmbaimagecategory_image_envelope').css({'display':'block'});
			$('.adminmbaimagecategory_image_display').each(function(i,e) {
				_this.changeMBAImageCategoryImageCrop({'which':'#' + $(e).attr('id')});
			});
		} else {
			$('#adminmbaimagecategory_image_envelope').css({'display':'none'});
		}
	}
	this.changeMBAImageCategoryImageCrop = function(inob) {
		var i, h, w, c, whch = $(inob.which);
		i = $('form[name=form_adminmbaimagecategory] input[name=imageurl]').val();
		h = whch.attr('height');
		w = whch.attr('width');
		c = $('form[name=form_adminmbaimagecategory] select[name=' + $(inob.which).attr('cropsource') + ']').val();
		whch.attr('src','/imagelimiter.php?crop=' + c + '&w=' + w + '&h=' + h + '&img=' + i);
	}
}
var adminmbaimagecategory = new AdminMBAImageCategory();
$(function() {
	$('.adminmbaimagecategory_droppable').each(function(i,e){
		e = $(e);
		var eid = '#' + e.attr('id');
		e.droppable({
			'accept':'.adminmbaimagecategory_draggable',
			'activeClass':'ui-state-highlight',
			'greedy':true,
			'tolerance':'pointer'
		});
		e.sortable({
			'connectWith':'.adminmbaimagecategory_droppable',
			'cursor':'move',
			'placeholder':'adminmbaimagecategory_sortable-placeholder',
			'scroll':'true'
		});
	});
	$('.adminmbaimagecategory_associateditem_droppable').each(function(i,e){
		e = $(e);
		var eid = '#' + e.attr('id');
		e.droppable({
			'accept':'.adminmbaimagecategory_associateditem_draggable',
			'activeClass':'ui-state-highlight',
			'greedy':true,
			'tolerance':'pointer'
		});
		e.sortable({
			'connectWith':'.adminmbaimagecategory_associateditem_droppable',
			'cursor':'move',
			'placeholder':'adminmbaimagecategory_associateditem_sortable-placeholder',
			'scroll':'true'
		});
	});
});