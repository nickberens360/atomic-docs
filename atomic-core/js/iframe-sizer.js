/*
$( document ).ready(function() {
    $('.partial-viewport').on('load', function() {


        var frameHeight = this.contentWindow.document.body.offsetHeight;

        console.log(frameHeight);

        $(this).css('height', frameHeight);

    });
});*/

function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
}

