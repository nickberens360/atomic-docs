$( document ).ready(function() {
    $('.partial-viewport').on('load', function() {
        //this.style.height = this.contentWindow.document.body.offsetHeight;


        var frameHeight = this.contentWindow.document.body.offsetHeight;

        console.log(frameHeight);

        $(this).css('height', frameHeight);

    });
});