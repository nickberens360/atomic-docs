$.templates({
    mediaLibTmpl: {
        markup:'<div class="selectGrid selectGrid-5 selectGrid-lib">' +

        '{^{for mediaItems tmpl="mediaItemTmpl" /}}' +

        '</div>'
    },

    mediaItemTmpl: {
        markup:
        '<div class="selectGrid__item">' +
        '<div class="iconBlock">' +
        '<i class="closeBtn closeBtn-alt js-removeMediaItem fa fa-times"></i>' +
        ' <img data-link="src{:url}" />' +
        ' <p class="iconBlock__caption">{^{:title}}</p>' +
        ' </div>' +
        ' </div>'
    }

});

$( document ).ready(function() {
    var data={
        mediaItems:[
            {id:1,url:"http://placehold.it/350x150",title:"Image 1"},
            {id:2,url:"http://placehold.it/100x100",title:"Image 2"},
            {id:3,url:"http://placehold.it/100x200",title:"Image 3"}
        ]
    };
    $.templates.mediaLibTmpl.link($("#mediaLib"),data);
});


$('#mediaLib')
//Handlers
    .on('removeMediaItem', '.selectGrid__item',function(){
        $(this).remove();
    })

    //events
    .on('click','.js-removeMediaItem',function(){
        $(this).trigger('removeMediaItem');
    });