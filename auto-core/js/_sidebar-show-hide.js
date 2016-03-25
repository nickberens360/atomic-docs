function showSideBar(){
   $(".auto-side").velocity({
        translateX: "0",
    }, {
        duration: 200
    });
    $(".auto-main").velocity({
        paddingLeft: "282px",
    }, {
        duration: 200
    });
}
function hideSideBar(){
    $(".auto-side").velocity({
        translateX: "-100%",
    }, {
        duration: 200
    });
    $(".auto-main").velocity({
        paddingLeft: "40px",
    }, {
        duration: 200
    });
}


$(".js-showSide").on('click', function(event) {
  event.preventDefault();
  showSideBar();
});

$(".js-hideSide").on('click', function(event) {
  event.preventDefault();
  hideSideBar();
});




