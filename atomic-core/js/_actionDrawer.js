function actionsWidth(){
	$side = $('.atoms-side');
	$body = $('body');
	$action = $('.ad_js-actionDrawer');
	sideWidth = $($side).outerWidth();
	bodyWidth = $('body').outerWidth();
	$action.css('width', bodyWidth - sideWidth - 1);	
}

actionsWidth();
$( window ).resize(function() {
  actionsWidth();
});



var actionOpen = [
  { elements: $(".ad_js-actionDrawer"), properties: { right:"auto"}, options: { duration: 300} },
  
];

var actionClose = [
  { elements: $(".ad_js-actionDrawer"), properties: { right:"-100%"}, options: { duration: 300} }, 
];


$(".ad_js-actionOpen").on('click', function(event) {
  event.preventDefault();
  $.Velocity.RunSequence(actionOpen);
});

$(".ad_js-actionClose").on('click', function(event) {
  event.preventDefault();
  $.Velocity.RunSequence(actionClose);
});


/*ajax calls*/
/*$('.ad_actionBtn').click(function(e){
    e.preventDefault();	
		$('#js_actionDrawer__content').load($(this).prop("href")); 
 
});*/



/*$('.ad_actionBtn').click(function(event) {
   event.preventDefault();
 
   $.ajax(this.href, {
      success: function(data) {      
         $('#js_actionDrawer__content').html($(data));
      },
      error: function() {
         alert('did not worked!');
      }
   });
});*/


$('.ad_actionBtn').click(function(event) {
   event.preventDefault();
 
   $.ajax(this.href, {
      success: function(data) {      
         $('#js_actionDrawer__content').html($(data));





var data = {};
$(document).ready(function() {
  $('.form1').on('click', function() {
      resetErrors();
      var url = '/atomic-docs/atomic-core/partial-mngr/create-category.php';
      $.each($('input, select'), function(i, v) {
          if (v.type !== 'submit') {
              data[v.name] = v.value;
          }
      }); //end each




      $.ajax({
          dataType: 'json',
          type: 'POST',
          url: url,
          data: data,
          success: function(resp) {
              if (resp === true) {
                    //successful validation
                      $('#form1').submit();
                    return false;
              } else {



                  $.each(resp, function(i, v) {
          console.log(i + " => " + v); // view in console for error messages
                      var msg = '<label class="error" for="'+i+'">'+v+'</label>';
                      $('.test').addClass('inputTxtError').after(msg);
                  });
                  var keys = Object.keys(resp);
                  $('input[name="'+keys[0]+'"]').focus();
              }




              return false;
          },
          error: function() {
              console.log('there was a problem checking the fields');
          }
      });
      return false;
  });
});
function resetErrors() {
    $('form input, form select').removeClass('inputTxtError');
    $('label.error').remove();
}





var data = {};
$(document).ready(function() {
  $('.form2').on('click', function() {
      resetErrors();
      var url = '/atomic-docs/atomic-core/partial-mngr/create-category.php';
      $.each($('#form2 input, #form2 select'), function(i, v) {
          if (v.type !== 'submit') {
              data[v.name] = v.value;
          }
      }); //end each
      $.ajax({
          dataType: 'json',
          type: 'POST',
          url: url,
          data: data,
          success: function(resp) {
              if (resp === true) {
                    //successful validation
                      $('#form2').submit();
                    return false;
              } else {
                  $.each(resp, function(i, v) {
          console.log(i + " => " + v); // view in console for error messages
                      var msg = '<label class="error" for="'+i+'">'+v+'</label>';
                      $('.test2').addClass('inputTxtError').after(msg);
                  });
                  var keys = Object.keys(resp);
                  $('input[name="'+keys[0]+'"]').focus();
              }
              return false;
          },
          error: function() {
              console.log('there was a problem checking the fields');
          }
      });
      return false;
  });
});
function resetErrors() {
    $('form input, form select').removeClass('inputTxtError');
    $('label.error').remove();
}







      },
      error: function() {
         alert('did not worked!');
      }
   });
});
    





























