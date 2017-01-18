$(document).ready(function(){
    $(".form-create-jsfile").on("change", "input:checkbox", function(){

        $(this).closest(".form-create-jsfile").submit();

    });
});
