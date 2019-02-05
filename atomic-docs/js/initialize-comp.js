function initializeEditor(compId, hasJs) {

    var editormarkup = ace.edit('atomic-editor-markup-' + compId);
    editormarkup.getSession().setUseWorker(false);
    editormarkup.getSession().setMode("ace/mode/html");
    editormarkup.setOptions({
        maxLines: Infinity
    });
    editormarkup.setHighlightActiveLine(false);
    editormarkup.setShowPrintMargin(false);
    editormarkup.getSession().setUseWrapMode(true);
    editormarkup.getSession().setTabSize(2);


    editormarkup.getSession().on('change', function () {
        var editormarkupval = editormarkup.getSession().getValue();
        $("#atomic-copy-target-markup-" + compId).val(editormarkupval);
    });


    var editorstyles = ace.edit('atomic-editor-styles-' + compId);
    editorstyles.getSession().setUseWorker(false);
    editorstyles.getSession().setMode("ace/mode/scss");
    editorstyles.setOptions({
        maxLines: Infinity
    });
    editorstyles.setHighlightActiveLine(false);
    editorstyles.setShowPrintMargin(false);
    editorstyles.getSession().setTabSize(2);


    //Copy and paste stuff
    editorstyles.getSession().on('change', function () {
        var editorstylesval = editorstyles.getSession().getValue();

        $("#atomic-copy-target-styles-" + compId).val(editorstylesval);
    });


    if (hasJs === 1) {
        var editorjs = ace.edit('atomic-editor-js-' + compId);

        editorjs.getSession().setUseWorker(false);
        editorjs.getSession().setMode("ace/mode/javascript");
        editorjs.setOptions({
            maxLines: Infinity
        });
        editorjs.setHighlightActiveLine(false);
        editorjs.setShowPrintMargin(false);
        editorjs.getSession().setTabSize(2);


        //Copy and paste stuff
        editorjs.getSession().on('change', function () {
            var editorjsval = editorjs.getSession().getValue();
            $("#atomic-copy-target-js-" + compId).val(editorjsval);
        });
    }


}


function initializeIframes(el) {


    var dataSrc = el.data('src');
    var dataClass = el.data('class');

    var $frame = $('<iframe src="' + dataSrc + '" class="' + dataClass + '"></iframe>');

    $(el).replaceWith($frame);


}



function initializeColorPicker(el) {
    el.spectrum({
        allowEmpty: true,
        preferredFormat: "hex",
        showInput: true,
        change: function (color) {
            $(this).closest('form').trigger('submit');
        }
    });
}


function initializeResizeHandle(el) {
    el.resizable({
        handleSelector: "> .win-size-grip",

        onDrag: function (e, $obj, newWidth, newHeight, opt) {

            var compWidthVal = $obj.css('width');
            var compHeightVal = $obj.css('height');

            $obj.closest('.atomic-compWrap').find('.js-atomic-compWidth-val').val(compWidthVal);
            $obj.closest('.atomic-compWrap').find('.js-atomic-compHeight-val').val(compHeightVal);

        }

    });
}


function initializeWidthButtons(el) {
    el.click(function (e) {
        e.preventDefault();
        var compWidth = $(this).data("atomicwidth");

        $(this).closest('.atomic-compWrap').find('.atomic-component').css('width', compWidth);

        $(this).closest('.atomic-compWrap').find('.js-atomic-compWidth-val').val(compWidth);

    });
}

function initializeDimensionInputs(elWidth, elHeight) {

    elWidth.bind("enterKey", function (e) {
        var compWidthVal = elWidth.val();
        elWidth.closest('.atomic-compWrap').find('.js-atomic-component').width(compWidthVal);
    });

    elWidth.keyup(function (e) {
        if (e.keyCode === 13) {
            $(this).trigger("enterKey");
        }
    });

    elHeight.bind("enterKey", function (e) {

        var compHeightVal = $(this).val();
        elHeight.closest('.atomic-compWrap').find('.js-atomic-component').height(compHeightVal);

    });

    elHeight.keyup(function (e) {
        if (e.keyCode === 13) {
            $(this).trigger("enterKey");
        }
    });

}


function initializeTabs(el) {

    $('.atomic-markup-copyBtn').addClass('atomic-copyBtn-active');


    el.click(function () {

        var $parent = $(this).parent();

        var tab_id = $(this).attr('data-tab');


        $parent.find('li').removeClass('atomic-tabs__current');
        $parent.parent().find('.atomic-tabs__content').removeClass('atomic-tabs__current');


        $(this).addClass('atomic-tabs__current');
        $parent.parent().find("#" + tab_id).addClass('atomic-tabs__current');


        if (tab_id === 'atomic-markup-tab') {
            $parent.find('.atomic-copyBtn').removeClass('atomic-copyBtn-active');
            $parent.find('.atomic-markup-copyBtn').addClass('atomic-copyBtn-active');
        } else if (tab_id === 'atomic-styles-tab') {
            $parent.find('.atomic-copyBtn').removeClass('atomic-copyBtn-active');
            $parent.find('.atomic-styles-copyBtn').addClass('atomic-copyBtn-active');
        } else if (tab_id === 'atomic-js-tab') {
            $parent.find('.atomic-copyBtn').removeClass('atomic-copyBtn-active');
            $parent.find('.atomic-js-copyBtn').addClass('atomic-copyBtn-active');
        }


    });

}


function initializeSummerNote(el) {

    el.summernote({
        height: 80
    });

}


function resizeIframe(el) {
    var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
    var eventer = window[eventMethod];
    var messageEvent = eventMethod === "attachEvent" ? "onmessage" : "message";

    // Listen to message from child window
    eventer(messageEvent, function (e) {

        var thisEl = '.' + e.data.element;
        $(thisEl).height(e.data.elementHeight);

        el.addClass('atomic-compWrap-active');

    }, false);
}


function initializeJsCheck(el) {

    el.change(function() {
        if(this.checked) {
            $(this).closest('form').trigger('submit');
            return;
        }
    });
}