/**
 * Created by michael on 6/23/16.
 */
var AJAX_URL = 'atomic-core/inc/ajax';

(function ($) {

	$('body').on('submit', '#form-create-file', function (event) {
		event.preventDefault();
		createComponent($(this));
		// stop the form from submitting the normal way and refreshing the page
	});

	$('body').on('submit', '#form-update-file', function (e) {
		var $this = $(this);
		updateComponent($this);
	});

	$('body').on('click', '.js-show-form', function () {
		openForm($(this).data('form'), $(this));
	});

})(jQuery);

function openForm(formName, formObj) {
	var data = {
		form: formName,
		category: formObj.data('category')
	}

	if (formObj.data('component')) {
		data.component = formObj.data('component');
	}

	$.ajax({
		type: 'get',
		url: AJAX_URL + '/_open-form.php',
		data: data,
		success: function (e) {
			$('#js_actionDrawer__content').html(e);
			$('.aa_js-actionDrawer').animate({
				'right': '0px'
			});
		}
	});
}

/**
 * Create a component
 * @param formObj
 */
function createComponent(formObj) {
	reDirect = formObj.find('input[name=compDir]').val();

	var formData = {
		'category': formObj.find('input[name=compDir]').val(),
		'component': $('input[name=fileCreateName]').val(),
		'description': formObj.find('textarea[name=compNotes]').val(),
		'backgroundColor': formObj.find('input[name=bgColor]').val(),
		'form': 'component-create'
	};

	$.ajax({
		type: 'GET',
		url: AJAX_URL + '/_component.php',
		data: formData,
		encode: true,
		success: function (d) {
			console.log('success');
			console.log(d);
			var data = $.parseJSON(d);

			flash(data);
			if (data.success) {
				window.location = 'atomic-core/' + reDirect + '.php';
			}
		},
		error: function (data) {
			console.log('error');
		},
		complete: function(data) {
			console.log(data);
		}
	});
}

function updateComponent(data, callback) {
	data.form = 'component-update';
	console.log(data);
	$.ajax({
		type: 'GET', // define the type of HTTP verb we want to use (POST for our form)
		url: AJAX_URL + '/_component.php', // the url where we want to POST
		data: data, // our data object
		encode: true,
		success: function (e) {
			console.log(e);

			var d = $.parseJSON(e);

			flash(d);

			if( d.success ){
				if( typeof callback === 'function'){
					callback(d, data)
				}
			}

		},
		error: function (data) {
			console.log(data);
		}
	});
}

function fadeOutFlashWrapper(t) {
	if (typeof t === 'undefined') {
		t = 400;
	}
	$('.flashWrapper').fadeOut(t, function () {
		$(this).remove();
	});
}

function flash(obj, length, fadeLength) {
	if ($('.flashWrapper').length > 0) {
		$('.flashWrapper').remove();
	}

	$('<div />', {
		class: 'flashWrapper'
	}).appendTo('body');

	var messages = '';

	if (typeof obj === 'string') {
		messages += '<div class="flashMessage pointer success" title="Click to dismiss">' + obj + '</div>';
	}
	else if (typeof obj === 'object' && Array.isArray(obj)) {

		for (var i = 0; i < obj.length; i++) {
			if (typeof (obj[i].class) === 'undefined' && typeof obj[i].status !== 'undefined') {
				obj[i].class = obj[i].status ? 'success' : 'error';
			}
			if ((typeof obj[i].message !== 'undefined' && typeof obj[i].ignore === 'undefined') || (typeof obj[i].ignore !== 'undefined' && !obj[i].ignore)) {
				messages += '<div class="flashMessage pointer ' + obj[i].class + '" title="Click to dismiss">' + obj[i].message + '</div>';
			}
		}

	}
	else {
		if (typeof (obj.class) === 'undefined' && typeof obj.status !== 'undefined') {
			obj.class = obj.status ? 'success' : 'error';
		}
		messages = '<div class="flashMessage pointer ' + obj.class + '" title="Click to dismiss">' + obj.message + '</div>';
	}

	$('.flashWrapper').append(messages);

	if (typeof length !== 'undefined') {
		if (!isNaN(length) && length > 0) {
			if (typeof fadeLength === 'undefined') {
				fadeLength = 500;
			}
			setTimeout(function () {
				fadeOutFlashWrapper();
			}, length);
		}
	}
	$('.flashMessage').click(function () {
		fadeOutFlashWrapper();
	});

}

function closeFlash(t) {
	if (typeof t === 'undefined') {
		t = 500;
	}
	if ($('.flashWrapper').length > 0) {
		$('.flashWrapper').fadeOut(t, function () {
			$(this).remove();
		});
	}

}