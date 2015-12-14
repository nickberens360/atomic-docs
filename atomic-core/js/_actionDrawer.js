//action drawer.js

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


$('body').on('click', '.ad_js-actionOpen', function(events){
   $('.ad_errorBox').remove();
});

$('body').on('click', '.ad_js-errorBox__close', function(events){
   $('.ad_errorBox').fadeOut(200);
});





$('.ad_actionBtn').click(function(event) {
   event.preventDefault();
   $.ajax(this.href, {
      success: function(data) {      
         $('#js_actionDrawer__content').html($(data));
         
         
         


         
         
         
         
        
          
          
          
          
          
          $('#form-create-category').submit(function(event) {
            reDirect = $('input[name=dirName]').val();
             // remove the error text
            // get the form data
            // there are many ways to get this data using jQuery (you can use the class or id also)
            var formData = {
              'dirName' 				: $('input[name=dirName]').val()
            };
            // process the form
            $.ajax({
              type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
              url 		: 'atomic-core/partial-mngr/create-category.php', // the url where we want to POST
              data 		: formData, // our data object
              dataType 	: 'json', // what type of data do we expect back from the server
              encode 		: true
            })
              // using the done promise callback
              .done(function(data) {
                // log data to the console so we can see
                console.log(data); 
                // here we will handle errors and validation messages
                if ( ! data.success) {
                  // handle errors for name ---------------

                  
                  
                  if (data.errors.exists) {
                    $('.ad_errorBox__message').html("");
                    $('.ad_actionDrawer').prepend('<div class="ad_errorBox"><p class="ad_errorBox__message"><i class="fa fa-times ad_js-errorBox__close"></i> ' + data.errors.exists + '</p></div>').find('.ad_errorBox').hide().fadeIn(200); 
                  }
                  
                  
                  if (data.errors.name) {
                    $('.ad_errorBox__message').html("");
                    $('.ad_actionDrawer').prepend('<div class="ad_errorBox"><p class="ad_errorBox__message"><i class="fa fa-times ad_js-errorBox__close"></i> ' + data.errors.name + '</p></div>').find('.ad_errorBox').hide().fadeIn(200); 
                  }
                  
                  
                } else {
                  
                  //redirect here
                   window.location = 'atomic-core/'+reDirect+'.php';
                  // usually after form submission, you'll want to redirect
                }
              })
              // using the fail promise callback
              .fail(function(data) {
                // show any errors
                // best to remove for production
                console.log(data);
              });
            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();
          });


          
          
       
          
          
          
          
          
          
          
          
          
          
          
          $('#form-delete-category').submit(function(event) {
             // remove the error text
            // get the form data
            // there are many ways to get this data using jQuery (you can use the class or id also)
            var formData = {
              'dirName' 				: $('input[name=inputNameDelete]').val()
            };
            // process the form
            $.ajax({
              type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
              url 		: 'atomic-core/partial-mngr/delete-category.php', // the url where we want to POST
              data 		: formData, // our data object
              dataType 	: 'json', // what type of data do we expect back from the server
              encode 		: true
            })
              // using the done promise callback
              .done(function(data) {
                // log data to the console so we can see
                console.log(data); 
                // here we will handle errors and validation messages
                if ( ! data.success) {
                  // handle errors for name ---------------

                  
                  
                  if (data.errors.exists) {
                    $('.ad_errorBox__message').html("");
                    $('.ad_actionDrawer').prepend('<div class="ad_errorBox"><p class="ad_errorBox__message"><i class="fa fa-times ad_js-errorBox__close"></i> ' + data.errors.exists + '</p></div>').find('.ad_errorBox').hide().fadeIn(200); 
                  }
                  
                  
                  if (data.errors.name) {
                    $('.ad_errorBox__message').html("");
                    $('.ad_actionDrawer').prepend('<div class="ad_errorBox"><p class="ad_errorBox__message"><i class="fa fa-times ad_js-errorBox__close"></i> ' + data.errors.name + '</p></div>').find('.ad_errorBox').hide().fadeIn(200); 
                  }
                  
                  
                  
                  
                } else {
                  //redirect here
                   window.location = 'atomic-core/index.php';
                  // usually after form submission, you'll want to redirect
                }
              })
              // using the fail promise callback
              .fail(function(data) {
                // show any errors
                // best to remove for production
                console.log(data);
              });
            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();
          });
          
      
      
    
    
    
    
          $('#form-create-file').submit(function(event) {
            reDirect = $('input[name=compDir]').val();
             // remove the error text
            // get the form data
            // there are many ways to get this data using jQuery (you can use the class or id also)
            var formData = {
              'compDir'       : $('input[name=compDir]').val(),
              'fileCreateName'  : $('input[name=fileCreateName]').val()
            };
            // process the form
            $.ajax({
              type    : 'POST', // define the type of HTTP verb we want to use (POST for our form)
              url     : 'atomic-core/partial-mngr/create.php', // the url where we want to POST
              data    : formData, // our data object
              dataType  : 'json', // what type of data do we expect back from the server
              encode    : true
            })
              // using the done promise callback
              .done(function(data) {
                // log data to the console so we can see
                console.log(data); 
                // here we will handle errors and validation messages
                if ( ! data.success) {
                  // handle errors for name ---------------

                  
                  
                  if (data.errors.exists) {
                    $('.ad_errorBox__message').html("");
                    $('.ad_actionDrawer').prepend('<div class="ad_errorBox"><p class="ad_errorBox__message"><i class="fa fa-times ad_js-errorBox__close"></i> ' + data.errors.exists + '</p></div>').find('.ad_errorBox').hide().fadeIn(200); 
                  }
                  
                  
                  if (data.errors.name) {
                    $('.ad_errorBox__message').html("");
                    $('.ad_actionDrawer').prepend('<div class="ad_errorBox"><p class="ad_errorBox__message"><i class="fa fa-times ad_js-errorBox__close"></i> ' + data.errors.name + '</p></div>').find('.ad_errorBox').hide().fadeIn(200); 
                  }
                  
                  
                } else {
                  
                  //redirect here
                   window.location = 'atomic-core/'+reDirect+'.php';
                  // usually after form submission, you'll want to redirect
                }
              })
              // using the fail promise callback
              .fail(function(data) {
                // show any errors
                // best to remove for production
                console.log(data);
              });
            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();
          });










          $('#form-rename-file').submit(function(event) {
            reDirect = $('input[name=compDir]').val();
             // remove the error text
            // get the form data
            // there are many ways to get this data using jQuery (you can use the class or id also)
            var formData = {
              'compDir'       : $('input[name=compDir]').val(),
              'oldName'       : $('input[name=oldName]').val(),
              'renameFileName'  : $('input[name=renameFileName]').val()
            };
            // process the form
            $.ajax({
              type    : 'POST', // define the type of HTTP verb we want to use (POST for our form)
              url     : 'atomic-core/partial-mngr/file-rename.php', // the url where we want to POST
              data    : formData, // our data object
              dataType  : 'json', // what type of data do we expect back from the server
              encode    : true
            })
              // using the done promise callback
              .done(function(data) {
                // log data to the console so we can see
                console.log(data); 
                // here we will handle errors and validation messages
                if ( ! data.success) {
                  // handle errors for name ---------------

                  
                  
                  if (data.errors.exists) {
                    $('.ad_errorBox__message').html("");
                    $('.ad_actionDrawer').prepend('<div class="ad_errorBox"><p class="ad_errorBox__message"><i class="fa fa-times ad_js-errorBox__close"></i> ' + data.errors.exists + '</p></div>').find('.ad_errorBox').hide().fadeIn(200); 
                  }
                  
                  
                  if (data.errors.name) {
                    $('.ad_errorBox__message').html("");
                    $('.ad_actionDrawer').prepend('<div class="ad_errorBox"><p class="ad_errorBox__message"><i class="fa fa-times ad_js-errorBox__close"></i> ' + data.errors.name + '</p></div>').find('.ad_errorBox').hide().fadeIn(200); 
                  }
                  
                  
                } else {
                  
                  //redirect here
                   window.location = 'atomic-core/'+reDirect+'.php';
                  // usually after form submission, you'll want to redirect
                }
              })
              // using the fail promise callback
              .fail(function(data) {
                // show any errors
                // best to remove for production
                console.log(data);
              });
            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();
          });





          











            //check what is the current category and remove from select
          dirVal = $('#form-file-move input[name=compDir]').val();

          $("#newDir option[value="+dirVal+"]").remove();


          $('#form-file-move').submit(function(event) {
            reDirect = $('#newDir').val();
             // remove the error text
            // get the form data
            // there are many ways to get this data using jQuery (you can use the class or id also)
            var formData = {
              'compDir'       : $('input[name=compDir]').val(),
              'newDir'       : $('#newDir').val(),
              'fileMoveName'  : $('input[name=fileMoveName]').val()
            };
            // process the form
            $.ajax({
              type    : 'POST', // define the type of HTTP verb we want to use (POST for our form)
              url     : 'atomic-core/partial-mngr/file-move.php', // the url where we want to POST
              data    : formData, // our data object
              dataType  : 'json', // what type of data do we expect back from the server
              encode    : true
            })
              // using the done promise callback
              .done(function(data) {
                // log data to the console so we can see
                console.log(data); 
                // here we will handle errors and validation messages
                if ( ! data.success) {
                  // handle errors for name --------------- 
                  
                  if (data.errors.exists) {
                    $('.ad_errorBox__message').html("");
                    $('.ad_actionDrawer').prepend('<div class="ad_errorBox"><p class="ad_errorBox__message"><i class="fa fa-times ad_js-errorBox__close"></i> ' + data.errors.exists + '</p></div>').find('.ad_errorBox').hide().fadeIn(200); 
                  }
                  
                  
                  if (data.errors.name) {
                    $('.ad_errorBox__message').html("");
                    $('.ad_actionDrawer').prepend('<div class="ad_errorBox"><p class="ad_errorBox__message"><i class="fa fa-times ad_js-errorBox__close"></i> ' + data.errors.name + '</p></div>').find('.ad_errorBox').hide().fadeIn(200); 
                  }
                  
                  
                } else {
                  

                
                  //redirect here
                  window.location = 'atomic-core/'+reDirect+'.php';
                  // usually after form submission, you'll want to redirect
                }
              })
              // using the fail promise callback
              .fail(function(data) {
                // show any errors
                // best to remove for production
                console.log(data);
              });
            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();
          });




          $('#form-delete-file').submit(function(event) {
            reDirect = $('input[name=compDir]').val();
             // remove the error text
            // get the form data
            // there are many ways to get this data using jQuery (you can use the class or id also)
            var formData = {
              'compDir'       : $('input[name=compDir]').val(),
              'deleteFileName'  : $('input[name=deleteFileName]').val()
            };
            // process the form
            $.ajax({
              type    : 'POST', // define the type of HTTP verb we want to use (POST for our form)
              url     : 'atomic-core/partial-mngr/delete.php', // the url where we want to POST
              data    : formData, // our data object
              dataType  : 'json', // what type of data do we expect back from the server
              encode    : true
            })
              // using the done promise callback
              .done(function(data) {
                // log data to the console so we can see
                console.log(data); 
                // here we will handle errors and validation messages
                if ( ! data.success) {
                  // handle errors for name --------------- 
                  
                  if (data.errors.exists) {
                    $('.ad_errorBox__message').html("");
                    $('.ad_actionDrawer').prepend('<div class="ad_errorBox"><p class="ad_errorBox__message"><i class="fa fa-times ad_js-errorBox__close"></i> ' + data.errors.exists + '</p></div>').find('.ad_errorBox').hide().fadeIn(200); 
                  }
                  
                  
                  if (data.errors.name) {
                    $('.ad_errorBox__message').html("");
                    $('.ad_actionDrawer').prepend('<div class="ad_errorBox"><p class="ad_errorBox__message"><i class="fa fa-times ad_js-errorBox__close"></i> ' + data.errors.name + '</p></div>').find('.ad_errorBox').hide().fadeIn(200); 
                  }
                  
                  
                } else {
                  

                  //alert(reDirect);
                  //redirect here
                  window.location = 'atomic-core/'+reDirect+'.php';
                  // usually after form submission, you'll want to redirect
                }
              })
              // using the fail promise callback
              .fail(function(data) {
                // show any errors
                // best to remove for production
                console.log(data);
              });
            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();
          });








    
    
    
    
    
    
     
      
      
      
      },
      error: function() {
         //alert('did not worked!');
      }
   });
});