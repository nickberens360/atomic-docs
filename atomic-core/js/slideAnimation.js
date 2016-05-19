function actionsWidth() {
    $side = $('.atoms-side');
    $body = $('body');
    $action = $('.ad_js-actionDrawer');
    sideWidth = $($side).outerWidth();
    bodyWidth = $('body').outerWidth();
    $action.css('width', bodyWidth - sideWidth - 1);
}

actionsWidth();
$(window).resize(function () {
    actionsWidth();
});


var actionOpen = [
    {elements: $(".ad_js-actionDrawer"), properties: {right: "auto"}, options: {duration: 300}},

];

var actionClose = [
    {elements: $(".ad_js-actionDrawer"), properties: {right: "-100%"}, options: {duration: 300}},
];


$(".ad_js-actionOpen").on('click', function (event) {
    event.preventDefault();
    $.Velocity.RunSequence(actionOpen);
});

$(".ad_js-actionClose").on('click', function (event) {
    event.preventDefault();
    $.Velocity.RunSequence(actionClose);
});


$('body').on('click', '.ad_js-actionOpen', function (events) {
    $('.ad_errorBox').remove();
});

$('body').on('click', '.ad_js-errorBox__close', function (events) {
    $('.ad_errorBox').fadeOut(200);
});