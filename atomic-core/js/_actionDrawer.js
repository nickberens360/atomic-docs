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
      },
      error: function() {
         //alert('did not worked!');
      }
   });
});
    






// magic.js
$(document).ready(function() {

    // process the form
    $('form').submit(function(event) {

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'name'              : $('input[name=name]').val(),
            'email'             : $('input[name=email]').val(),
            'superheroAlias'    : $('input[name=superheroAlias]').val()
        };

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : '/atomic-docs/atomic-core/layouts/_ajax-layouts.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode          : true
        })
            // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                console.log(data); 

                // here we will handle errors and validation messages
                if ( ! data.success) {
            
                    // handle errors for name ---------------
                    if (data.errors.name) {
                        $('#name-group').addClass('has-error'); // add the error class to show red input
                        $('#name-group').append('<div class="help-block">' + data.errors.name + '</div>'); // add the actual error message under our input
                    }

                    // handle errors for email ---------------
                    if (data.errors.email) {
                        $('#email-group').addClass('has-error'); // add the error class to show red input
                        $('#email-group').append('<div class="help-block">' + data.errors.email + '</div>'); // add the actual error message under our input
                    }

                    // handle errors for superhero alias ---------------
                    if (data.errors.superheroAlias) {
                        $('#superhero-group').addClass('has-error'); // add the error class to show red input
                        $('#superhero-group').append('<div class="help-block">' + data.errors.superheroAlias + '</div>'); // add the actual error message under our input
                    }

                } else {

                    // ALL GOOD! just show the success message!
                    $('form').append('<div class="alert alert-success">' + data.message + '</div>');

                    // usually after form submission, you'll want to redirect
                    // window.location = '/thank-you'; // redirect a user to another page
                    alert('success'); // for now we'll just alert the user

                }
            });



        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});




















