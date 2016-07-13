/**
 * Created by michael on 6/30/16.
 */

/*$('.atomic-editable').click(function() {

	var notesContent = $(this).text();

	var $this = $(this)

	$( '<form class="atomic-form"><textarea class="formGroup textChange"></textarea><div class="atomic-form-footer"><button type="submit" class="atomic-btns atomic-btn1">Save</button><span type="reset" class="js-close-editor atomic-btns atomic-btn2">Cancel</span></div></form>' ).insertAfter( $this );

	$('.textChange').text(notesContent);

	$(this).css('display','none');

});*/

$('.atomic-editable-input').click(function() {

	var notesContent = $(this).text();

	var $this = $(this)

	$( '<form class="atomic-form"><input class="formGroup atomic-form-input textChange" /><div class="atomic-form-footer"><button type="submit" class="atomic-btns atomic-btn1">Save</button><span type="reset" class="js-close-editor atomic-btns atomic-btn2">Cancel</span></div></form>' ).insertAfter( $this );

	$('.textChange').val(notesContent);

	$(this).css('display','none');

});

var updateWait = null;

$(function(){

	$('body').on('keyup', '.content-editable', function(e){
		var $this = $(this);
		var data = {
			component: $this.data('component'),
			category: $this.data('category'),
			updateType: $this.data('update-type'),
			key: $this.data('key'),
			oldValue: $this.data('value'),
			newValue: $this.text().trim()
		};

		clearTimeout(updateWait);
		updateWait = null;

		updateWait = setTimeout(function(){
			console.log('update');
			updateComponent(data)
		}, 1000);

	});

});