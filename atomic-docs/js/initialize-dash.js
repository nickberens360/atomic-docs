

function initializeGlobalDim(){

    var $pageBar = $('.atomic-pageBar');
    var $dashCntrl = $pageBar.find('.js-atomic-dashControl');
    var $widthVal = $pageBar.find('.js-atomic-compWidth-val');
    var $heightVal = $pageBar.find('.js-atomic-compHeight-val');
    var $comp = $('.js-atomic-component');

    $dashCntrl.click(function (e) {
        e.preventDefault();
        var compWidth = $(this).data("atomicwidth");
        $comp.css('width', compWidth);
        $widthVal.val(compWidth);
        console.log('Testing');
    });


    $widthVal.bind("enterKey", function (e) {
        var compWidthVal = $(this).val();
        $comp.css('width', compWidthVal);
    });

    $widthVal.keyup(function (e) {
        if (e.keyCode === 13) {
            $(this).trigger("enterKey");
        }
    });


    $heightVal.bind("enterKey", function (e) {

        var compHeightVal = $(this).val();
        $comp.css('height', compHeightVal);

    });

    $heightVal.keyup(function (e) {
        if (e.keyCode === 13) {
            $(this).trigger("enterKey");
        }
    });
}









