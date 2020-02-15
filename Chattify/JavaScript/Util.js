function scrollBottom(){
    setTimeout(function(){
        $('html, body').scrollTop($(document).height());
    }, 100);
}

function openNav() {
    $("#sidenav").width(200);
    $("#main").css("margin-left", "210px");
    $("#sidenavsymbol").removeClass('fa-angle-right').addClass('fa-angle-left');
}

function closeNav() {
    $("#sidenav").width(0);
    $("#main").css("margin-left", "10px");
    $("#sidenavsymbol").removeClass('fa-angle-left').addClass('fa-angle-right');
}

function updateSize(){
    if($(window).width() < 800){
        $("#welcomesign").css("margin-left", "30px");
        if(sidenavopen == false){
            closeNav();
        }
        $("#togglesidenav").show();
    } else {
        $("#welcomesign").css("margin-left", "5px");
        openNav();
        $("#togglesidenav").hide();
    }
}

function changegroup(gid){
    changeView(0);
    currentGroup = gid;
    loadMessages(currentGroup);
    scrollBottom();
}

function changeView(view){
    switch(view) {
        case 0:
            //messages view
            $("#messageview").show();
            $("#creategroupview").hide();
            break;
        case 1:
            //create new group view
            $("#messageview").hide();
            $("#creategroupview").show();
            break;
    }
}
